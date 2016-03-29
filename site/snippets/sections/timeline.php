<div class="cd-timeline-block">
  <div class="cd-timeline-img">
  <?php if($section->icon() == 'kickstarter') : ?>
    <span><img src="<?php echo url('assets/images/icon-kickstarter.svg'); ?>" alt="Kickstarter"></span>
  <?php endif ?>
  <?php if($section->icon() == 'piggybank') : ?>
    <span><img src="<?php echo url('assets/images/icon-pig.svg'); ?>" alt="Piggy Bank"></span>
  <?php endif ?>
  <?php if($section->icon() == 'popcorn') : ?>
    <span><img src="<?php echo url('assets/images/icon-popcorn.svg'); ?>" alt="Popcorn"></span>
  <?php endif ?>
  <?php if($section->icon() == 'delivery') : ?>
    <span><img src="<?php echo url('assets/images/icon-delivery.svg'); ?>" alt="Delivery"></span>
  <?php endif ?>
  </div>
  <!-- cd-timeline-img -->

  <div class="cd-timeline-content">
    <h3><?php echo $section->title()->html() ?></h3>
    <?php echo $section->description()->kirbytext() ?>
  </div>
  <!-- cd-timeline-content -->
</div>