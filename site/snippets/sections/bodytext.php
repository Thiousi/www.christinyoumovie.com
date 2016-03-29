<section class="<?php echo $page->slug() ?> text">
  <div class="inner">
    <?php if(!$section->hidetitle()->bool()): ?><h2><?php echo $section->title()->html() ?></h2><?php endif ?>
    <?php echo $section->text()->kt() ?>
  </div>
</section>