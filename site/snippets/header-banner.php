<section id="banner">
  <div id="js-parallax-window" class="parallax-window">
    <?php if($page->isHomePage()): ?>
    <div class="parallax-content inner">
      <h1 data-parallax="title"><?php echo $page->pagetitle()->html() ?></h1>
      <p data-parallax="tagline"><?php echo $page->pagetagline()->html() ?></p>
    </div>
    <?php else: ?>
      <?php if($page->pagetitle()->isNotEmpty()) {
        echo '<h1 class="hidden">'. $page->pagetitle()->html() .'</h1>';
      } ?>
    <?php endif ?>
    <div data-parallax="background" id="js-parallax-background" class="<?php if($page->isHomePage() || $page->fullscreen()->isTrue() ) { echo ''; } else { echo 'fixed-height ';} ?>parallax-background" style="background-position: center center; background-size: cover; background-image: url('<?php if ($page->backgroundimage()->isNotEmpty()): ?><?php echo $page->backgroundimage()->toFile()->url() ?><?php else: ?><?php echo $site->image('background.jpg')->url() ?><?php endif; ?>');"></div>
  </div>
  <?php if($page->isHomePage() || $page->fullscreen()->isTrue() ): ?>
  <a href="#start" class="start-scroll" data-parallax="start-arrow"><img class="arrow arrow-down" src="<?php echo url('assets/images/arrow-down.svg'); ?>" /></a>
  <?php endif ?>
</section>
<div id="start"></div>
