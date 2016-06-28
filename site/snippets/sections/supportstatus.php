<?php if(!$section->hide()->isTrue()): ?>
<script type="text/javascript" language="javascript">
   window.addEventListener('load', function (){
    $.getJSON("https://api.indiegogo.com/1/campaigns/1769207.json?api_token=a3a779b95c1f3c4e6ae3c031ac2da1a864969516007b1b5ecd1799caeeb86b9f", function(gogodata) {
      var totalAmount = numberWithCommas(gogodata.response.goal);
      var raisedAmount = numberWithCommas(gogodata.response.collected_funds);
      var contributors = numberWithCommas(gogodata.response.contributions_count);
      var percentage = Math.round(100 * gogodata.response.collected_funds / gogodata.response.goal);

      document.getElementById('counter').innerHTML = '$ '+ raisedAmount;
      document.getElementById('percentbar').style.width = percentage + '%';
      document.getElementById('percenttext').innerHTML = '<strong>' + percentage + '%</strong>';
      document.getElementById('amountend').innerHTML = '$ '+ totalAmount;
      if(percentage < 25) {
        $('#counter').addClass('outside');
      } else {
        $('#counter').addClass('inside');
      };
      if(percentage < 45) {
        $('#counter').addClass('outside-m');
        document.getElementById('counter').style.left = percentage + '%';
      };
      // Viewportchecker
      $('.start').viewportChecker({
        classToRemove: 'zero',
        offset: 100
      });
    });
  });
  function numberWithCommas(x) {
    <?php if($site->language()->code() == 'en'): ?>
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    <?php else: ?>
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "'");
    <?php endif; ?>
  }
</script>

 <section class="supportstatus zebra<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>">
  <div class="inner test">
    <?php echo str_replace('{%}', '<span id="percenttext" class="meter-percentage"></span>', $section->text()->kirbytext()) ?>
    <div class="progress-bar-indication">
      <span id="percentbar" class="meter start zero">
      <p id="counter" class="counter"></p>
      </span>
      <div class="amountrange">
        <div id="amountstart" class="amountstart">$ 0</div>
        <div id="amountend" class="amountend"></div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
