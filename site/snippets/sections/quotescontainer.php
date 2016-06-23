<section class="quotes zebra<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>">
  <div class="inner">
    <div class="quotes-slider">
      <?php foreach($page->quotes()->toStructure() as $section): ?>
        <?php snippet('sections/'.$section->_fieldset(), array('section' => $section)) ?>
      <?php endforeach ?>
    </div>
  </div>
</section>
