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
<section class="supportstatus ch zebra<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>">
 <div class="inner test">
   <?php echo str_replace('{%}', '<span class="meter-percentage"><strong>' . round($precent) . '%</strong></span>', $section->text()->kirbytext()) ?>
   <div class="progress-bar-indication">
     <span class="meter start zero" style="width: <?php echo round($precent) ?>%">
     <p id="counter" class="counter<?php if($precent < 25) { echo ' outside';} else { echo ' inside';} ?><?php if($precent < 45) { echo ' outside-m';} ?>"<?php if($precent < 45 ) { echo ' style="left:'.round($precent).'%"'; } ?>>CHF <?php echo number_format(str_replace(' ' , '', $amount), 0, '.', '\'') ?>.–</p>
     </span>
     <div class="amountrange">
       <div class="amountstart"><?php echo $section->amountstart()->html() ?></div>
       <div class="amountend"><?php echo $section->amountend()->html() ?></div>
     </div>
   </div>
 </div>
</section>
<?php endif; ?>
