<!--  style="background-position: bottom center; background-size: cover;<?php if ($page->fullscreen()->isTrue() || $page->isHomePage()): ?>background: transparent !important;<?php else: ?><?php snippet('header-style') ?><?php endif ?>" -->


<section class="action">
  <div href="#" class="button btn-big share-button">
    <span class="text"><?php echo $site->spreadtitle()->html() ?></span>
    <span class="hover-icons">
      <a href="#" title="<?php echo l::get('share-on-facebook') ?>" onclick="window.open(
        'https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(url("home")) ?>', 
        'facebook-share-dialog', 
        'width=626,height=436'); 
      return false;"><i class="fa fa-facebook"></i></a>
      <a href="https://twitter.com/intent/tweet?text=<?php
 echo $site->twittertext() ?><?php 
  if($site->twitter()->isNotEmpty()) {
    echo '&via=' . $site->twitter();
  } 
         ?>&url=<?php echo urlencode(url('home')) ?>"  title="<?php echo l::get('share-on-twitter') ?>" target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="mailto:<?php echo l::get('share-on-email-body') ?>"  title="<?php echo l::get('share-on-email') ?>"><i class="fa fa-envelope"></i></a>
    </span>
  </div>
</section>
