<?php if($page->socialall()->bool()): ?>
 <section class="text social<?php e($page->bgcolor()->isTrue(),' bg-gray') ?>">
  <div class="inner">
    <?php if($page->socialtextline()->bool()): ?>
    <div class="social-text">
      <h2><?php echo $site->socialtitle()->html() ?></h2>
      <p class="lead"><?php echo $site->socialtext()->html() ?></p>
    </div>
    <?php endif ?>

    <?php if($page->socialicons()->bool()): ?>
      <div class="social-icons">
        <?php snippet('social-icons') ?>
      </div>
    <?php endif ?>

    <?php if($page->instafeed()->bool()): ?>
      <div id="instafeed" class="insta-feed"> </div>
    <?php endif ?>
    <div style="clear:both;"></div>
    <?php if($page->mailchimp()->bool()): ?>
       <?php snippet('mailchimp') ?>
    <?php endif ?>
  </div>
</section>
<?php endif ?>
