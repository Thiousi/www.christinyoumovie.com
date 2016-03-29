<section class="accordion" id="accordion" data-accordion>
  <div class="inner">
    <h2><?php echo $section->title()->html() ?></h2>
    <?php echo $section->text()->kt() ?>
    <div class="rewards-slider">
      <?php foreach ($page->donations()->yaml() as $id => $item): ?>
        <a href="#donation-box-<?php echo $id ?>" data-id="<?php echo $id ?>" class="donation-box trigger">
          <h3><?php 
  if(!empty($item['customamount'])) {
  echo $item['customamount'];
} else {
  echo 'CHF ' . $item['amount'] . '.–';
}
            ?></h3>
          <p><?php echo kirbytext($item['description']) ?></p>
          <div class="donation-overlay">
            <span><?php echo l::get('donation-overlay') ?></span>
          </div>
        </a>
      <?php endforeach ?>
    </div>
  </div>

  <?php foreach ($page->donations()->yaml() as $id => $item): ?>
  <div id="donation-box-<?php echo $id ?>" class="content">
    <div class="inner payment-options">
      <h3><?php echo l::get('payment-options-title') ?></h3>
      <div class="btn-group">
        <div class="btn-container">
           <?php if(empty($item['customamount'])): ?>
          <form method="post" action="https://e-payment.postfinance.ch/ncol/test/orderstandard.asp" target="_blank" id="pfform-<?php echo $id ?>" name="pfform-<?php echo $id ?>">
            <input type="hidden" name="PSPID" value="<?php echo $page->children()->find('send')->pspid()->html() ?>">
            <input type="hidden" name="ORDERID" value="<?php
                                                        $orderID = $item['amount'] . '-' . date('YmdHis') . '_' . rand(10000,99999);
                                                        echo $orderID;
                                                       ?>">
            <input type="hidden" name="AMOUNT" value="<?php echo $item['amount'] * 100 ?>">
            <input type="hidden" name="CURRENCY" value="<?php echo $page->children()->find('send')->currency()->html() ?>">
            <input type="hidden" name="LANGUAGE" value="<?php echo $site->language()->locale() ?>">
            <input type="hidden" name="HOMEURL" value="<?php echo $page->url() ?>">
            <input type="hidden" name="OPERATION" value="SAL">
            <input type="hidden" name="SHASIGN" value="<?php 
                                                          $sha1key = $page->children()->find('send')->shainsg()->html();
                                                          $sha1hash = 
                                                            'AMOUNT=' . $item['amount'] * 100 . $sha1key . 
                                                            'CURRENCY=' . $page->children()->find("send")->currency()->html() . $sha1key .
                                                            'HOMEURL=' . $page->url() . $sha1key . 
                                                            'LANGUAGE=' . $site->language()->locale() . $sha1key .
                                                            'OPERATION=SAL' . $sha1key .
                                                            'ORDERID=' . $orderID . $sha1key .
                                                            'PSPID=' . $page->children()->find('send')->pspid()->html() . $sha1key ;
                                                         echo strtoupper(sha1($sha1hash))
                                                       ?>">                                                                           
            <button type="submit" name="submit" class="button-nohover postfinance"><img src="<?php echo url('assets/images/payment/postfinance.svg'); ?>" alt="PostFinance"></button>
          </form>
          <?php else: ?>
          <a href="#postfinance" class="button-nohover trigger-2 postfinance"><img src="<?php echo url('assets/images/payment/postfinance.svg'); ?>" alt="PostFinance"></a>
          <?php endif ?>
        </div>
        <div class="btn-container">
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="<?php echo $item['paypal'] ?>">
            <fieldset>
              <legend><img class="paypal-logo" src="<?php echo url('assets/images/payment/paypal_logo.svg'); ?>" alt="Paypal"></legend>
              <button name="submit" class="button paypal">
                <img class="visa" src="<?php echo url('assets/images/payment/cc-logos.svg'); ?>" alt="CreditCards">
              </button>
            </fieldset>
            <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1" style="display:none;">
          </form>
        </div>
        <div class="btn-container">
          <a href="#transfer-<?php echo $id ?>" class="button-nohover trigger-2 banktransfer"><?php echo l::get('payment-options-bank') ?></a>
        </div>
      </div>
    </div>
    <div id="transfer-<?php echo $id ?>" class="content-2 collapse">
      <div class="inner bank-transfer">
       
        <h3><?php echo $page->children()->find('send')->titlebanktransfer()->html() ?></h3>
        <div class="infotext"><?php echo $page->children()->find('send')->infobanktransfer()->kt() ?></div>
        <div class="form">
          <form id="donation-form-<?php echo $id ?>" method="post">
            <div class="hide-after-send">              
              <input type="text" name="name" id="name" placeholder="<?php echo l::get('names') ?> *" required/>

              <input type="text" name="street" placeholder="<?php echo l::get('street') ?> *" required>
              <div class="grid-container">
                <input class="plz" type="text" name="zip" placeholder="<?php echo l::get('zip') ?> *" required>
                <input class="ort" type="text" name="city" placeholder="<?php echo l::get('city') ?> *" required>
              </div>
              <input type="text" name="country" id="country" placeholder="<?php echo l::get('country') ?> *" required/>
              <input type="email" name="_from" id="email" placeholder="<?php echo l::get('email') ?> *" required/>
              <input type="tel" name="telephone" id="phone" placeholder="<?php echo l::get('phone') ?>"/>


              <label class="uniform__potty" for="website">
                  Please leave this field blank
              </label>
              <input type="text" name="website" id="website" class="uniform__potty" />

              <input type="hidden" name="betrag" id="amount" value="<?php echo $item['amount'] ?>" />  
              <input type="hidden" name="infotext" id="infotext" value="<?php echo $item['description'] ?>" />  
              <input type="hidden" name="_receive_copy" id="receive-copy" value="1" />  
              <input type="hidden" name="_submit" value="<?php echo uniform('donation-form-'.$id)->token() ?>">
              <input type="hidden" name="_id" id="_id" value="<?php echo('donation-form-'.$id) ?>">
            </div>

            <div class="hide-after-send">
              <div class="success-message flash-success"><span><?php echo l::get('success-message') ?></span></div>
              <button class="button submit" id="donation-form-submit-<?php echo $id ?>" type="submit"><?php echo l::get('submit') ?> <img class="send-arrow" src="<?php echo url('assets/images/send.svg') ?>" alt="<?php echo l::get('submit') ?>" /></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php if(!empty($item['customamount'])): ?>
    <div id="postfinance" class="content-2 pf">
      <div class="inner">
        <h3><?php echo l::get('payment-options-amount') ?></h3>
        <div class="form">
          <form method="post" action="https://e-payment.postfinance.ch/ncol/test/orderstandard.asp" target="_blank" id="pfform-custom" name="pfformcustom">
            <div class="inline-submit" id="inline-submit-feedback">
              <input type="hidden" name="PSPID" value="<?php echo $page->children()->find('send')->pspid()->html() ?>">
              <input type="hidden" name="ORDERID" value="<?php
                                                          $orderID2 = 'XX-' . date('YmdHis') . '_' . rand(10000,99999);
                                                          echo $orderID2;
                                                         ?>">
              <input type="tel" class="focus-parent" id="customamountfr" name="AMOUNTFR" value="" placeholder="<?php echo l::get('payment-options-amountchf') ?>">
              <input type="hidden" id="customamount" name="AMOUNT" value="">
              <input type="hidden" name="CURRENCY" value="<?php echo $page->children()->find('send')->currency()->html() ?>">
              <input type="hidden" name="LANGUAGE" value="<?php echo $site->language()->locale() ?>">
              <input type="hidden" name="HOMEURL" value="<?php echo $page->url() ?>">
              <input type="hidden" name="OPERATION" value="SAL">
              <input type="hidden" name="SHASIGN" id="shasign" value="">  
              <button class="button submit" type="submit"><span><?php echo l::get('payment-options-pay') ?></span> <img class="send-arrow" src="<?php echo url('assets/images/send.svg') ?>" alt="<?php echo l::get('submit') ?>" /></button>
            </div>
          </form>
        </div>
      </div>
    </div> 
    <?php endif ?>    
  </div>
  <div id="thankyou-<?php echo $id ?>" class="thankyou">
    <div class="inner">
      <p id="feedback-message-<?php echo $id ?>"></p>
    </div>
  </div>   
  <?php endforeach ?>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha1.js"></script>     
<script type="text/javascript">
window.onload = function () {  
  
  //  Accordion
  function close_accordion_section() {
    $('.accordion .trigger').removeClass('active');
    $('.accordion .content').slideUp(300).removeClass('open');
    $('.accordion .trigger-2').removeClass('active');
    $('.accordion .content-2').slideUp(300).removeClass('open');
  }
  function close_accordion_section_2() {
    $('.accordion .trigger-2').removeClass('active');
    $('.accordion .content-2').slideUp(300).removeClass('open');
    $('input, textarea').removeClass('erroneous');
  }
  $('.trigger').click(function(a) {
    var currentAttrValue = $(this).attr('href');
    // Open / close accordion .content
    $('.accordion .content-2').slideUp(300).removeClass('open');
    $('.thankyou').slideUp(300).removeClass('open');
    
    if($(this).is('.active')) {
      close_accordion_section();
      $('.thankyou').slideUp(300).removeClass('open');     
    }else {
      if($('.trigger').hasClass('active')){
        //If any of the .trigger elements hasClass active it opens and scrolls down with a delay
        close_accordion_section();
        // Open up the hidden content panel
        $('.accordion ' + currentAttrValue).delay(300).slideDown(300).addClass('open'); 
        // Add active class to section title
        $(this).addClass('active');
        setTimeout(function (){
          $('html, body').animate({
            scrollTop: $(currentAttrValue).offset().top
          }, 1000);
        }, 300);
      }else{
        close_accordion_section();
        // Open up the hidden content panel
        $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');       
        // Add active class to section title
        $(this).addClass('active');
        $('html, body').animate({
          scrollTop: $(currentAttrValue).offset().top
        }, 1000);
      }
    }
    a.preventDefault();
    
    // Ajax send
    var id = $(this).attr('data-id');

    $('#donation-form-submit-' + id).click(function (e) {
      var form = $('#donation-form-' + id);
//      console.log(form);
      e.preventDefault();
      $.post(
          '<?php echo $page->children()->find('send')->url()?>',
          form.serialize()
      )
      .then(function (response) {
          
//          var feedback = $('#donation-feedback-' + id);
//          feedback.removeClass('flash-success flash-error').text(response.message);
          var feedbackContainer = $('#thankyou-' + id);
          var feedback = $('#feedback-message-' + id);
          feedbackContainer.slideUp(300).removeClass('open');
          feedback.text(response.message);
          $('input, textarea').removeClass('erroneous');
          if (response.success) {
            feedbackContainer.slideDown(300).addClass('success').removeClass('error');
            $('input, textarea').prop('value', '');
            $('#donation-form-' + id + ' .hide-after-send').addClass('email-sent');
//              $('#thankyou').slideDown(300).addClass('open');
            $('html, body').animate({
              scrollTop: $('#thankyou-' + id).offset().top
            }, 1000);
            close_accordion_section();

          } else {
              feedbackContainer.slideDown(300).addClass('error');
              $('html, body').animate({
                scrollTop: $('#thankyou-' + id).offset().top
              }, 1000);
              for (var i = response.errors.length - 1; i >= 0; i--) {
                  $('[name="' + response.errors[i] + '"]').addClass('erroneous');
              };
          }
      });
    });
  });
  
  // Open / Close accordion .content-2
  $('.trigger-2').click(function(e) {
      // Grab current anchor value
      var currentAttrValue = $(this).attr('href');

      if($(this).is('.active')) {
        close_accordion_section_2();
        $('.thankyou').slideUp(300).removeClass('open');
      }else {
        if($('.trigger-2').hasClass('active')){
          //If any of the .trigger elements hasClass active it opens and scrolls down with a delay
          close_accordion_section_2();
          // Open up the hidden content panel
          $('.accordion ' + currentAttrValue).delay(300).slideDown(300).addClass('open'); 
          // Add active class to section title
          $(this).addClass('active');
          setTimeout(function (){
            $('html, body').animate({
              scrollTop: $(currentAttrValue).offset().top
            }, 1000);
          }, 300);
        }else{
          close_accordion_section_2();
          // Open up the hidden content panel
          $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');       
          // Add active class to section title
          $(this).addClass('active');
          $('html, body').animate({
            scrollTop: $(currentAttrValue).offset().top
          }, 1000);
        }
      }

      e.preventDefault();
  });
  function isPositiveInteger(n) {
    return parseFloat(n) === n >>> 0;
  }
  function checkNumbers() {
    var myField = document.getElementById('customamountfr').value;
    var restrictionType = /^\d+$/;
    
    if(myField !== '') {
      if(restrictionType.test(myField)) {
        return true;
      } else {
        console.log('invalid');
        return false;
      }
    } else {
      console.log('empty');
      return false;
    }
  }
  var pfForm = document.getElementById('pfform-custom');
  pfForm.onsubmit = function(e) {
    e.preventDefault();
    
    if (!checkNumbers()) {
      $('#inline-submit-feedback').addClass('erroneous');
      
      return false;
    } else {
      $('#inline-submit-feedback').removeClass('erroneous');
      document.getElementById('customamount').value = document.getElementById('customamountfr').value * 100;
      pfForm.submit();
      
        // Create SHA-1 Hash
      var hashrest = '<?php 
        $sha1key = $page->children()->find('send')->shainsg()->html();
        $sha1hash = 
          'CURRENCY=' . $page->children()->find("send")->currency()->html() . $sha1key .
          'HOMEURL=' . $page->url() . $sha1key . 
          'LANGUAGE=' . $site->language()->locale() . $sha1key .
          'OPERATION=SAL' . $sha1key .
          'ORDERID=' . $orderID2 . $sha1key .
          'PSPID=' . $page->children()->find('send')->pspid()->html() . $sha1key ;
        echo $sha1hash
      ?>';
  
      var stringtohash = 'AMOUNT=' + document.getElementById('customamountfr').value * 100 + '<?php echo $page->children()->find('send')->shainsg()->html() ?>' + hashrest;

      console.log(stringtohash);
      
      var hash = CryptoJS.SHA1(stringtohash);
      var a1 = hash.toString(CryptoJS.enc.Hex).toUpperCase();
      document.getElementById('shasign').value = a1;
      console.log(a1);      

    }
  }
}

</script>
</section>