<section class="timeline<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>">
  <div class="inner">
    <h2><?php echo $section->title()->html() ?></h2>
    <?php echo $section->text()->kt() ?>
    <div id="cd-timeline">
      <?php foreach($page->timelineelement()->toStructure() as $section): ?>
        <?php snippet('sections/'.$section->_fieldset(), array('section' => $section)) ?>
      <?php endforeach ?>
    </div>
  </div>
</section>
