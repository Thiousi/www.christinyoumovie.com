<?php if($page->backgroundvideo()->isEmpty()): ?>
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
    <div data-parallax="background" id="js-parallax-background" class="<?php if($page->isHomePage() || $page->fullscreen()->isTrue() ) { echo ''; } else { echo 'fixed-height ';} ?>parallax-background" style="background-position: center center; background-size: cover; background-image: url('<?php if ($page->backgroundimage()->isNotEmpty()): ?><?php echo $site->image($page->backgroundimage())->url() ?><?php else: ?><?php echo $site->image('background.jpg')->url() ?><?php endif; ?>');"></div>
  </div>
  <?php if($page->isHomePage() || $page->fullscreen()->isTrue() ): ?>
  <a href="#start" class="start-scroll" data-parallax="start-arrow"><img class="arrow arrow-down" src="<?php echo url('assets/images/arrow-down.svg'); ?>" /></a>
  <?php endif ?>
</section>
<?php else: ?>
  <section id="banner" class="video-bg">
    <div id="js-parallax-window" class="parallax-window">
      <?php if($page->isHomePage()): ?>
      <div class="parallax-content inner">
        <?php if($page->pagetitle()->isNotEmpty()) {
          echo '<h1 data-parallax="title" class="hidden">'. $page->pagetitle()->html() .'</h1>';
        } ?>
        <?php if($page->pagetagline()->isNotEmpty()) {
          echo '<p data-parallax="tagline" class="hidden">'. $page->pagetagline()->html() .'</p>';
        } ?>
        <?php if($page->trailertext()->isNotEmpty()): ?>
        <div data-parallax="button" class="modal delay">
          <label for="modal-1">
            <div class="modal-trigger button"><?php echo $page->trailertext()->html() ?></div>
          </label>

        </div>
      <?php endif; ?>
      </div>
      <?php else: ?>
        <?php if($page->pagetitle()->isNotEmpty()) {
          echo '<h1 class="hidden">'. $page->pagetitle()->html() .'</h1>';
        } ?>
      <?php endif ?>
      <div data-parallax="background" id="js-parallax-background" class="<?php if($page->isHomePage() || $page->fullscreen()->isTrue() ) { echo ''; } else { echo 'fixed-height ';} ?>parallax-background" style="background-position: center center; background-size: cover; background-image: url('<?php if ($page->backgroundimage()->isNotEmpty()): ?> <?php echo $site->image($page->backgroundimage())->url() ?> <?php else: ?><?php echo $site->image('background.jpg')->url() ?><?php endif; ?>');">
        <video muted autoplay loop poster="<?php echo $site->image($page->backgroundimage())->url() ?>" id="bgvideo">
          <source src="<?php echo $page->bgvidwebm()->toFile()->url() ?>" type="video/webm">
          <source src="<?php echo $page->bgvidmp4()->toFile()->url() ?>" type="video/mp4">
        </video>
      </div>

    </div>
    <?php if($page->isHomePage() || $page->fullscreen()->isTrue() ): ?>
    <a href="#start" class="start-scroll" data-parallax="start-arrow"><img class="arrow arrow-down" src="<?php echo url('assets/images/arrow-down.svg'); ?>" /></a>
    <?php endif ?>
  </section>
  <div class="modal">
    <input class="modal-state" id="modal-1" type="checkbox" />
    <div class="modal-fade-screen">
      <div class="modal-inner">
        <div class="modal-close" for="modal-1"></div>
        <figure class="video">
          <iframe id="autoplayopen" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $page->trailerlink()->html() ?>?rel=0&controls=1&showinfo=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
        </figure>
      </div>
    </div>
  </div>
<?php endif; ?>
<div id="start"></div>
