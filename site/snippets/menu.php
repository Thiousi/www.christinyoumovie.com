<div id="menu-button" class="nav-button">
  <a id="trigger-overlay" class="bt-menu-trigger"><span>Menu</span></a>
</div>

<nav class="off-nav" id="off-nav" role="navigation">
  <div class="nav-inner"> 
    <div class="menu">
      <ul>
        <?php foreach($pages->visible() as $p): ?>
          <li><a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a></li>
        <?php endforeach ?>
      </ul>
      <div class="lang-nav">
       <?php $count = 1; foreach($site->languages() as $language): ?>
        <a <?php e($site->language() == $language, ' class="active"') ?> href="<?php echo $page->url($language->code()) ?>"><?php echo html($language->code()) ?></a><?php e($site->languages()->count() - $count != 0, ' | ') ?>
        <?php $count++; endforeach ?>
      </div>
    </div>
    <div class="social-icons-nav">
      <?php snippet('social-icons') ?>
    </div>
  </div>
</nav>