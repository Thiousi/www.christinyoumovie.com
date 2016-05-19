<section class="<?php echo $page->slug() ?> text<?php e($section->bgcolor()->isTrue(),' bg-gray') ?><?php e($section->bgimage()->isNotEmpty(),' bg-image') ?>" <?php if($section->bgimage()->isNotEmpty()): ?> style="background-image:url(<?php echo $section->bgimage()->toFile()->url() ?>);"<?php endif;?>>
  <div class="inner">
    <?php if(!$section->hidetitle()->bool()): ?><h2><?php echo $section->title()->html() ?></h2><?php endif ?>
    <?php echo $section->text()->kt() ?>
  </div>
</section>
