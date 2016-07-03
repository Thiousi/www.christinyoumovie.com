<?php if(!$section->hide()->isTrue()): ?>

<?php

$csv = 'https://docs.google.com/spreadsheets/d/17envI202Lf5asAf0vbM1WTD76yekLBqMkNmN32D11yY/pub?gid=891382214&single=true&output=csv';

$cp = curl_init();
curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cp, CURLOPT_URL, $csv);
curl_setopt($cp, CURLOPT_TIMEOUT, 60);
$csvData = curl_exec($cp);
curl_close($cp);

// Verarbeitung der CSV-Daten
$data = array();
if (!empty($csvData)) {
  $fieldNames = array();
  $tmpData = str_getcsv($csvData, "\n");
  foreach($tmpData as $idx => $row) {
    // Die erste Zeile enthaelt die Feldnamen der Werte
    if ($idx == 0) {
      $fieldNames = str_getcsv($row, ',');
    } else {
      $row = str_getcsv($row, ',');
      // Sofern Daten fuer die Zeile vorhanden, diese uebernehmen
      if (!empty($row)) {
        $tmp = array();
        foreach ($fieldNames as $fIdx => $fName) {
          $tmp[$fName] = $row[$fIdx];
        }
        if (!empty($tmp)) {
          $data[] = $tmp;
        }
      }
    }
  }
}

$amount = $data[0][Stand];
$total = $data[0][Ziel];
$precent = 100 * $amount / $total;

?>
<script type="text/javascript" language="javascript">
   window.addEventListener('load', function (){
    $.getJSON("https://api.indiegogo.com/1/campaigns/1769207.json?api_token=a3a779b95c1f3c4e6ae3c031ac2da1a864969516007b1b5ecd1799caeeb86b9f", function(gogodata) {
      var totalAmount = numberWithCommas(gogodata.response.goal+ <?php echo $total ?>);
      var raisedAmount = numberWithCommas(gogodata.response.collected_funds + <?php echo $amount ?>);
      var contributors = numberWithCommas(gogodata.response.contributions_count);
      var percentage = Math.round(100 * (gogodata.response.collected_funds+ <?php echo $amount ?>) / (gogodata.response.goal+ <?php echo $total ?>));

      document.getElementById('counter').innerHTML = 'CHF '+ raisedAmount+'.-';
      document.getElementById('percentbar').style.width = percentage + '%';
      document.getElementById('percenttext').innerHTML = '<strong>' + percentage + '%</strong>';
      document.getElementById('amountend').innerHTML = 'CHF '+ totalAmount+'.-';
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
<section class="supportstatus ch zebra<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>">
 <div class="inner test">
   <?php echo str_replace('{%}', '<span id="percenttext" class="meter-percentage"></span>', $section->text()->kirbytext()) ?>
   <div class="progress-bar-indication">
     <span id="percentbar" class="meter start zero">
     <p id="counter" class="counter"></p>
     </span>
     <div class="amountrange">
       <div id="amountstart" class="amountstart">CHF 0.-</div>
       <div id="amountend" class="amountend"></div>
     </div>
   </div>
 </div>
</section>
<?php endif; ?>
