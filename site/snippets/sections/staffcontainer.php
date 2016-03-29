<section class="about">
  <div class="inner">
    <h2><?php echo $section->title()->html() ?></h2>
    <?php echo $section->text()->kt() ?>
    
    <?php setlocale(LC_ALL, 'en_US.UTF8');
      function toAscii($str, $replace=array(), $delimiter='-') {
      if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
      }

      $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
      $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
      $clean = strtolower(trim($clean, '-'));
      $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

      return $clean;

    } ?> 
    
    <div class="members">
      <?php $users = $page->Staff(); ?>
      <?php foreach($users->toStructure() as $user): ?>
      <div class="member tab <?php echo toAscii($user->name()) ?>">
          <div class="image">
          <?php if($user->image->isNotEmpty()): ?>
            <img src="<?php echo thumb($user->image()->toFile(), array('width' => 640, 'height' => 480, 'crop' => true ))->url(); ?>" alt="<?php echo $user->name() ?>">
          <?php endif ?>
          </div>
          <div class="name">
              <h3><?php echo $user->name() ?></h3>
          </div>			
          <div class="role"><p><?php echo $user->role() ?></p></div>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</section>