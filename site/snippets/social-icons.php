<?php if($site->facebook()->isNotEmpty()) : ?>
  <a href="http://www.facebook.com/<?php echo $site->facebook()->html() ?>" target="_blank"><i class="fa fa-facebook"></i></a>
<?php endif ?>
<?php if($site->instagram()->isNotEmpty()) : ?>
  <a href="http://instagram.com/<?php echo $site->instagram()->html() ?>" target="_blank"><i class="fa fa-instagram"></i></a>
<?php endif ?>
<?php if($site->twitter()->isNotEmpty()) : ?>
  <a href="http://twitter.com/<?php echo $site->twitter()->html() ?>" target="_blank"><i class="fa fa-twitter"></i></a>
<?php endif ?>
<?php if($site->youtube()->isNotEmpty()) : ?>
  <a href="http://www.youtube.com/c/<?php echo $site->youtube()->html() ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
<?php endif ?>
<?php if($site->vimeo()->isNotEmpty()) : ?>
  <a href="http://vimeo.com/<?php echo $site->vimeo()->html() ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
<?php endif ?>