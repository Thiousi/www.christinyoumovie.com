<?php snippet('socialmedia') ?>
      <footer>
        <div class="inner">
          <div class="copyright">
            <?php echo $site->copyright()->kirbytext() ?>
          </div>
        </div>
      </footer>
      <a id="totop" class="totop hidden" href="#"><div class="arrow-up"><span>To top</span></div></a>
    </div><!-- #page-wrapper -->
</div><!-- .push-container -->


  <?php echo js('assets/js/jquery-2.1.4.min.js') ?>
  <?php echo js('assets/js/scrollax.min.js') ?>
  <?php echo js('assets/js/validetta.min.js') ?>
  <?php echo js('assets/js/jquery.viewportchecker.js') ?>
  <?php echo js('assets/js/google.fastbutton.js') ?>
  <?php echo js('assets/js/jquery.inview.js') ?>
  <?php echo js('assets/js/instafeed.min.js') ?>
  <?php echo js('assets/js/slick.min.js') ?>
  <?php echo js('assets/js/script.min.js') ?>

<?php if($page->actionbuttons()->bool()) : ?>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5762bd511c2fc4b9"></script>
<?php endif ?>
</body>
</html>
