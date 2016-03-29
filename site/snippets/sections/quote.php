<div>
  <blockquote>
    <?php if($section->image()->isNotEmpty()) : ?>
      <img src="<?php echo thumb($section->image()->toFile(), array('width' => 400, 'height' => 400, 'crop' => true))->url() ?>" alt="<?php echo $section->citation() ?>">
    <?php else: ?>
        <i class="fa fa-user" style="font-size:150px; line-height:200px;"></i>
    <?php endif ?>
    <div>
      <?php echo $section->text()->kt() ?>
      <cite><strong><?php echo $section->citation() ?></strong></cite>
    </div>
  </blockquote>
</div>