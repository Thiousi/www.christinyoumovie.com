<?php if($section->bgimage()->isNotEmpty()): ?>
  <section class="<?php echo $page->slug() ?> text<?php e($section->bgimage()->isNotEmpty(),' bg-image') ?>">
    <div data-parallax="background" id="js-parallax-section" class="section-background">
      <img src="<?php echo $section->bgimage()->toFile()->url() ?>" alt="">
    </div>
    <div class="outer">    
      <div class="inner">
        <?php if(!$section->hidetitle()->bool()): ?><h2><?php echo $section->title()->html() ?></h2><?php endif ?>
        <?php echo $section->text()->kt() ?>

      </div>
  </div>
  </section>
<?php else: ?>
  <section class="<?php echo $page->slug() ?> text<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>>
    <div class="inner">
      <?php if(!$section->hidetitle()->bool()): ?><h2><?php echo $section->title()->html() ?></h2><?php endif ?>
        <?php echo $section->text()->kt() ?>
      </div>
    </section>
<?php endif;?>
