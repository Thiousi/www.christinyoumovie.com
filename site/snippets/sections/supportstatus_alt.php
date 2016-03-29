<section class="supportstatus">
  <div class="inner">
    <?php echo str_replace('{%}', '<span class="meter-percentage"><strong>' . round(100 * "$section->money()" / "$section->totalamount()") . '%</strong></span>', $section->text()->kirbytext()) ?>
    <div class="progress-bar-indication">
      <span class="meter start zero" style="width: <?php echo round(100 * "$section->money()" / "$section->totalamount()") ?>%">
      <p id="counter" class="counter" style="<?php if(round(100 * "$section->money()" / "$section->totalamount()") < 13 ) { echo 'position:absolute;color:#888;padding-left:20px;left:'.round(100 * "$section->money()" / "$section->totalamount()").'%'; } ?>"><?php echo number_format(str_replace(' ' , '', $section->money()->html()), 0, '.', '\'') ?></p>
      </span>
    </div>
  </div>
</section>