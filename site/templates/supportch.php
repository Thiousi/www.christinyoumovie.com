<?php snippet('header') ?>

<?php foreach($page->builder()->toStructure() as $section): ?>
  <?php snippet( snippet('sections/' . $section->_fieldset(), array('section' => $section)) ) ?>
<?php endforeach ?>


<?php snippet('footer') ?>