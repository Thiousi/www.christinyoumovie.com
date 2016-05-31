<script type="text/javascript" language="javascript">
   window.onload = function () {
     var totalAmount = 75000;
     var raisedAmount = 60076;
     var contributors = 25;
     var percentage = Math.round(100 * raisedAmount / totalAmount);
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
    // $.getJSON("https://api.indiegogo.com/1/campaigns/[YOUR CAMPAIGN ID].json?api_token=[YOUR API TOKEN]", function(gogodata) {
    //   var $totalAmount = numberWithCommas(gogodata.response.goal);
    //   var $raisedAmount = numberWithCommas(gogodata.response.collected_funds);
    //   var $contributors = numberWithCommas(gogodata.response.contributions_count);
    //
    //   $("#igg-funds").prepend('<h2>$' + numberWithCommas(gogodata.response.collected_funds) + '<br> out of <br>$' + numberWithCommas(gogodata.response.goal) + '</h2>');
    //   $("#igg-contributions").prepend('<h2>' + numberWithCommas(gogodata.response.contributions_count) + '</h2>');
    // });
  };

  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
</script>
 <section class="supportstatus<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>">
  <div class="inner test">
    <?php echo str_replace('{%}', '<span id="percenttext" class="meter-percentage"></span>', $section->text()->kirbytext()) ?>
    <div class="progress-bar-indication">
      <span id="percentbar" class="meter start zero">
      <p id="counter" class="counter"></p>
      </span>
      <div class="amountrange">
        <div id="amountstart" class="amountstart"><?php echo $section->amountstart()->html() ?></div>
        <div id="amountend" class="amountend"></div>
      </div>
    </div>
  </div>
</section>
