<?php if($section->bgimage()->isNotEmpty()): ?>
  <section class="zebra <?php echo $page->slug() ?> text<?php e($section->bgimage()->isNotEmpty(),' bg-image') ?>"<?php e($section->bgimage()->isNotEmpty(),' data-scrollax-parent="true"') ?>>
    <?php $sectionId = 'parallax-' . rand(10000,99999) ?>
    <?php if($section->bgheight()->isNotEmpty()): ?>
    <style>
      #<?php echo $sectionId ?> {
        height:<?php echo round($section->bgheight()->int()/3) ?>px;
      }
      @media only screen and (min-width: 40em) {
        #<?php echo $sectionId ?> {
          height:<?php echo $section->bgheight()->int() ?>px;
        }
      }
    </style>
    <?php endif; ?>
    <div data-type="background" data-speed="-10" data-scrollax="properties: { translateY: '50%' }" class="parallax-section" id="<?php echo $sectionId ?>" style="background-image:url('<?php echo $section->bgimage()->toFile()->url() ?>');">
    </div>
    <div class="outer">
      <div class="inner">
        <?php if(!$section->hidetitle()->bool()): ?><h2><?php echo $section->title()->html() ?></h2><?php endif ?>
        <?php echo $section->text()->kt() ?>
      </div>
    </div>
  </section>
<?php else: ?>
  <section class="zebra <?php echo $page->slug() ?> text<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>">
    <div class="inner">
      <?php if(!$section->hidetitle()->bool()): ?><h2><?php echo $section->title()->html() ?></h2><?php endif ?>
      <?php echo $section->text()->kt() ?>
    </div>
  </section>
<?php endif;?>
