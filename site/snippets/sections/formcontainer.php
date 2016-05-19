<section class="contact form<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>">
  <div class="inner">
    <h2><?php echo $section->title()->html() ?></h2>
    <?php echo $section->text()->kt() ?>

      <div class="contact-form">
        <form id="contact-form" method="post">
             <input type="text" name="name" id="name" placeholder="<?php echo l::get('names') ?> *" required/>
             <input type="email" name="_from" id="email" placeholder="<?php echo l::get('email') ?> *" required/>

             <input type="tel" name="phone" id="phone" placeholder="<?php echo l::get('phone') ?>"/>

             <textarea name="message" id="message" placeholder="<?php echo l::get('message') ?> *" rows="7"></textarea>


            <label class="uniform__potty" for="website">
                Please leave this field blank
            </label>
            <input type="text" name="website" id="website" class="uniform__potty" />

            <input type="hidden" name="_submit" value="<?php echo uniform('contact-form')->token() ?>">
            <div class="form-submit">
              <div class="switch">
                <label class="label-switch">
                  <input type="checkbox" name="_receive_copy" id="receive-copy"/>
                  <div class="checkbox"></div>
                </label>
                <p><?php echo l::get('copy') ?></p>
              </div>
              <button id="contact-form-submit" type="submit" class="button submit"><?php echo l::get('submit') ?> <img class="send-arrow" src="<?php echo url('assets/images/send.svg') ?>" alt="<?php echo l::get('submit') ?>" /></button>
            </div>

        </form>
<script type="text/javascript">
window.onload = function () {
    $('#contact-form-submit').click(function (e) {
        var contactform = $('#contact-form');
        e.preventDefault();
        $.post(
            '<?php echo $page->children()->find('send')->url()?>',
            contactform.serialize()
        )
        .then(function (response) {
            var feedback = $('#contact-form-feedback');
            feedback.removeClass('flash-success flash-error').text(response.message);
            contactform.children('input, textarea').removeClass('erroneous');
            if (response.success) {
//                feedback.addClass('flash-success');
                $('input, textarea').prop('value', '');
//                $('#contact-form-submit').prop('disabled', 'disabled');
                $('.feedback-form').remove('error');
                $('.feedback-form').slideDown(300).addClass('success');
                $('html, body').animate({
                  scrollTop: $('.feedback-form').offset().top - ( $(window).height() - $('.feedback-form').height() - 200 )
                }, 1000);
            } else {
//                feedback.addClass('flash-error');
                $('.feedback-form').slideDown(300).addClass('error');
                for (var i = response.errors.length - 1; i >= 0; i--) {
                    contactform.children('[name="' + response.errors[i] + '"]').addClass('erroneous');
                };
                $('html, body').animate({
                  scrollTop: $('.feedback-form').offset().top - ( $(window).height() - $('.feedback-form').height() - 120 )
                }, 1000);
            }
        });
    });
};
</script>

      </div>
  </div>
  <div class="feedback-form" style="display:none;">
    <div class="inner">
      <p id="contact-form-feedback"></p>
    </div>
  </div>
</section>
