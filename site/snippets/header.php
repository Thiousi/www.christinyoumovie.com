<!DOCTYPE html>
<html lang="<?php echo $site->language()->code() ?>">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@<?php echo $site->twitter()->html() ?>" />
  <meta name="twitter:title" content="<?php echo $site->title()->html() ?>" />
  <meta name="twitter:description" content="<?php echo $site->twittertext()->html() ?>" />
  <meta name="twitter:image" content="<?php
    if($image = $site->image('twitter.jpg')):
      echo $image->url();
    else:
      echo $site->image()->url();
    endif;
  ?>" />
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <meta property ="og:title" content="<?php echo $page->title()->html() ?>">
  <meta property ="og:site_name" content="<?php echo $site->title()->html() ?>">
  <meta property ="og:url" content="<?php echo url($page->slug()) ?>">
  <meta property ="og:description" content="<?php echo $site->facebooktext()->html() ?>">
  <meta property ="og:image" content="<?php
    if($image = $site->image('facebook.jpg')):
      echo $image->url();
    else:
      echo $site->image()->url();
    endif;
  ?>">
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo url('assets/favicon/apple-touch-icon-57x57.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url('assets/favicon/apple-touch-icon-114x114.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url('assets/favicon/apple-touch-icon-72x72.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url('assets/favicon/apple-touch-icon-144x144.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo url('assets/favicon/apple-touch-icon-60x60.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo url('assets/favicon/apple-touch-icon-120x120.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo url('assets/favicon/apple-touch-icon-76x76.png') ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo url('assets/favicon/apple-touch-icon-152x152.png') ?>" />

  <?php echo css('assets/css/app.min.css') ?>

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
