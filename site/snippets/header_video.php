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
  <meta property ="og:description" content="<?php
  if($page->ogdescription()->isNotEmpty()):
    echo $page->ogdescription()->html();
  else:
    echo $site->description()->html();
  endif;
  ?>">
  <meta property ="og:image" content="<?php 
    if($page->hasImages()) {
      if($page->images()->sortBy('sort', 'asc')) { 
        echo $page->images()->sortBy('sort', 'asc')->first()->url(); 
      } else { 
        $page->images()->first()->url(); 
        } 
    }
  ?>">

  <?php echo css('assets/css/app.css') ?>
  
  <?php echo css('assets/css/uniform.css') ?>


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
        <a href="<?php echo url('home') ?>" title="Home"><img src="<?php echo url('assets/images/Logo_Siloam.svg') ?>" alt="<?php echo $site->title()->html() ?>" /></a>
      </div>
   
<section id="banner">
  <div id="js-parallax-window" class="parallax-window">
    <div class="parallax-static-content inner">
      <h1><?php echo $page->pagetitle()->html() ?></h1>
    </div>
    <?php if($page->isHomePage()): ?>  
    <div id="js-parallax-background" class="parallax-background fullscreen-video">
      <video muted autoplay poster="<?php echo url('assets/videos/bg.png') ?>" id="bgvideo">
        <source src="<?php echo url('assets/videos/bg.webm') ?>" type="video/webm">
        <source src="<?php echo url('assets/videos/bg.mp4') ?>" type="video/mp4">
      </video>
      <script>
        var video = document.getElementsByTagName('video')[0];
        video.onended = function(e) {
          $('#bgvideo').addClass('finish');
          $('.parallax-static-content').addClass('finish');
        };
      </script>
      <div class="bgmobile" <?php if ($page->fullscreen()->isTrue() || $page->isHomePage()): ?>style="background-position: center center; background-size: cover;<?php snippet('header-style') ?>"<?php endif ?>></div>  
    </div>
    <?php else: ?> 
    <div id="js-parallax-background" class="parallax-background" <?php if ($page->fullscreen()->isTrue() || $page->isHomePage()): ?><?php else: ?> style="background-position: center center; background-size: cover;<?php snippet('header-style') ?>"<?php endif ?>></div>
    <?php endif ?> 
  </div>
  <?php if($page->isHomePage() || $page->fullscreen()->isTrue() ): ?>
  <a href="#start" class="start-scroll"><img class="arrow arrow-down" src="<?php echo url('assets/images/arrow-down.svg'); ?>" /></a>
  <?php endif ?>  
</section>
<div id="start"></div>