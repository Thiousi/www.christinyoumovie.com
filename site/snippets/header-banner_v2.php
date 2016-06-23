<section id="banner" <?php e($page->backgroundvideo()->isEmpty(), 'class="video-bg"')?>>
  <div id="js-parallax-window" class="parallax-window">
    <?php if($page->isHomePage()): ?>
    <div class="parallax-content inner">
      <h1 data-parallax="title"><?php echo $page->pagetitle()->html() ?></h1>
      <p data-parallax="tagline"><?php echo $page->pagetagline()->html() ?></p>
      <div data-parallax="button" class="modal delay">
        <?php if($page->trailertext()->isNotEmpty()): ?>
        <label for="modal-1">
          <div class="modal-trigger button"><img src="<?php echo url('assets/images/icon-play.svg')?>" alt="Support Icon"><?php echo $page->trailertext()->html() ?></div>
        </label>
        <?php endif; ?>
        <?php if($page->supporttext()->isNotEmpty()): ?>
        <a href="<?php echo $page->supportlink()->url() ?>" class="button" target="_blank"><img src="<?php echo url('assets/images/icon-dollar.svg')?>" alt="Support Icon"> <?php echo $page->supporttext()->html() ?></a>
        <?php endif; ?>
        <div style="clear:both;"></div>
      </div>
    </div>
    <?php else: ?>
      <?php if($page->pagetitle()->isNotEmpty()) {
        echo '<h1 class="hidden">'. $page->pagetitle()->html() .'</h1>';
      } ?>
    <?php endif ?>
    <?php if($page->backgroundvideo()->isEmpty()): ?>
    <div data-parallax="background" id="js-parallax-background" class="<?php if($page->isHomePage() || $page->fullscreen()->isTrue() ) { echo ''; } else { echo 'fixed-height ';} ?>parallax-background" style="background-position: center center; background-size: cover; background-image: url('<?php if ($page->backgroundimage()->isNotEmpty()): ?> <?php echo $site->image($page->backgroundimage())->url() ?> <?php else: ?><?php echo $site->image('background.jpg')->url() ?><?php endif; ?>');"></div>
    <?php else: ?>
    <div data-parallax="background" id="js-parallax-background" class="<?php if($page->isHomePage() || $page->fullscreen()->isTrue() ) { echo ''; } else { echo 'fixed-height ';} ?>parallax-background" style="background-position: center center; background-size: cover; background-image: url('<?php if ($page->backgroundimage()->isNotEmpty()): ?> <?php echo $site->image($page->backgroundimage())->url() ?> <?php else: ?><?php echo $site->image('background.jpg')->url() ?><?php endif; ?>');">
      <video muted autoplay loop poster="<?php if ($page->backgroundimage()->isNotEmpty()): ?> <?php echo $site->image($page->backgroundimage())->url() ?> <?php else: ?><?php echo $site->image('background.jpg')->url() ?><?php endif; ?>" id="bgvideo">
        <?php if($page->bgvidwebm()->isNotEmpty()): ?>
        <source src="<?php echo $page->bgvidwebm()->toFile()->url() ?>" type="video/webm">
        <?php endif;?>
        <?php if($page->bgvidmp4()->isNotEmpty()): ?>
        <source src="<?php echo $page->bgvidmp4()->toFile()->url() ?>" type="video/mp4">
        <?php endif;?>
      </video>
      <div class="video-overlay"></div>
    </div>
    <?php endif ?>
  </div>
  <?php if($page->isHomePage() || $page->fullscreen()->isTrue() ): ?>
  <a href="#start" class="start-scroll" data-parallax="start-arrow"><img class="arrow arrow-down" src="<?php echo url('assets/images/arrow-down.svg'); ?>" /></a>
  <?php endif ?>
</section>

<?php if($page->trailertext()->isNotEmpty()): ?>
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
