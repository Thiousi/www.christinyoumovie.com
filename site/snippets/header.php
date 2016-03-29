<!DOCTYPE html>
<html lang="<?php echo $site->language()->code() ?>">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <meta property ="og:title" content="<?php echo $page->title()->html() ?>">
  <meta property ="og:site_name" content="<?php echo $site->title()->html() ?>">
  <meta property ="og:url" content="<?php echo url($page->slug()) ?>">
  <meta property ="og:description" content="<?php echo $site->facebooktext()->html() ?>">
  <meta property ="og:image" content="<?php 
    if($page->hasImages()) {
      if($page->images()->sortBy('sort', 'asc')) { 
        echo $page->images()->sortBy('sort', 'asc')->first()->url(); 
      } else { 
        $page->images()->first()->url(); 
        } 
    }
  ?>">
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo url('assets/favicon/apple-touch-icon-57x57.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url('assets/favicon/apple-touch-icon-114x114.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url('assets/favicon/apple-touch-icon-72x72.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url('assets/favicon/apple-touch-icon-144x144.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo url('assets/favicon/apple-touch-icon-60x60.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo url('assets/favicon/apple-touch-icon-120x120.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo url('assets/favicon/apple-touch-icon-76x76.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo url('assets/favicon/apple-touch-icon-152x152.png') ?>" />

  <?php echo css('assets/css/app.css') ?>

  <?php echo js('assets/js/modernizr.touch.min.js') ?>
  
  <script src="https://use.typekit.net/ohe1tps.js"></script> 
  <script>try{Typekit.load({ async: true}); }catch(e){}</script>   
  <script type="text/javascript" async src="//platform.twitter.com/widgets.js"></script>
  <?php snippet('google-analytics') ?>
  
</head>

<body class="home is-loading">
<?php if($page->isHomePage()): ?>

<?php else: ?>

<?php endif ?>  

  <?php snippet('menu') ?>

  <div class="push-container">
    <div class="overlay"></div>
    <div id="page-wrapper"<?php if($page->isHomePage() || $page->fullscreen()->bool()): ?> class="fullscreen"<?php endif ?> >
      <div class="logo">
        <a href="<?php echo $site->language()->url() ?>" title="Home"><img src="<?php echo url('assets/images/Logo_Siloam.svg') ?>" alt="<?php echo $site->title()->html() ?>" /></a>
      </div>
   
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