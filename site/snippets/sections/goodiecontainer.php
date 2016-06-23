<section class="accordion zebra<?php e($section->bgcolor()->isTrue(),' bg-gray') ?>" id="accordion" data-accordion>
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
  <div id="donation-box-<?php echo $id ?>" class="content zebra-child">
    <div class="inner payment-options">
      <h3><?php echo l::get('payment-options-title') ?></h3>
      <div class="btn-group">
        <div class="btn-container">
          <a href="#postfinance-<?php echo $id ?>" class="button-nohover trigger-2 postfinance" data-option="postfinance"><img src="<?php echo url('assets/images/payment/postfinance.svg'); ?>" alt="PostFinance"></a>
        </div>
        <?php if($page->children()->find('info')->showpaypal()->bool()): ?>
        <div class="btn-container">
          <a href="#paypal-<?php echo $id ?>" class="trigger-2 paypal-btn" data-option="paypal">
            <fieldset>
              <legend><img class="paypal-logo" src="<?php echo url('assets/images/payment/paypal_logo.svg'); ?>" alt="Paypal"></legend>
              <button name="submit" class="button paypal">
                <img class="visa" src="<?php echo url('assets/images/payment/cc-logos.svg'); ?>" alt="CreditCards">
              </button>
            </fieldset>
          </a>
        </div>
        <?php endif ?>
        <?php if($page->children()->find('info')->showbanktransfer()->bool()): ?>
        <div class="btn-container">
          <a href="#transfer-<?php echo $id ?>" class="button-nohover trigger-2 banktransfer" data-option="banktransfer"><?php echo l::get('payment-options-bank') ?></a>
        </div>
        <?php endif ?>
      </div>
    </div>
    <div id="postfinance-<?php echo $id ?>" class="content-2 zebra-child pf">
      <div class="inner e-payment">
        <?php if($page->children()->find('info')->showpostfinance()->bool()): ?>
        <h3><?php echo $page->children()->find('info')->titlepostfinance()->html() ?></h3>
        <div class="infotext"><?php echo $page->children()->find('info')->infopostfinance()->kt() ?></div>
        <div class="form">
          <form id="postfinance-form-<?php echo $id ?>" method="post" action="https://e-payment.postfinance.ch/ncol/prod/orderstandard.asp" class="postform" name="pfformcustom" target="_blank" novalidate>
            <?php $paymentoption = 'pf'; snippet('support/form', array('id' => $id, 'item' => $item, 'payment' => $paymentoption )) ?>

            <input id="pf-pspid-<?php echo $id ?>" type="hidden" name="PSPID" value="<?php echo $page->children()->find('info')->pspid()->html() ?>">
            <input id="pf-language-<?php echo $id ?>" type="hidden" name="LANGUAGE" value="<?php echo $site->language()->locale() ?>">
            <input id="pf-operation-<?php echo $id ?>" type="hidden" name="OPERATION" value="SAL">
            <input name="Zahlungsart" type="hidden" value="PostFinance">
            <input id="pf-homeurl-<?php echo $id ?>" type="hidden" name="HOMEURL" value="<?php echo $page->url() ?>">
            <input id="pf-accepturl-<?php echo $id ?>" type="hidden" name="ACCEPTURL" value="<?php echo $page->children()->find('thankyou')->url()?>">
            <input id="pf-declineurl-<?php echo $id ?>" type="hidden" name="DECLINEURL" value="<?php echo $page->children()->find('error')->url()?>">
            <input id="pf-cancelurl-<?php echo $id ?>" type="hidden" name="CANCELURL" value="<?php echo $page->children()->find('error')->url()?>">

            <input id="pf-shasign-<?php echo $id ?>" type="hidden" name="SHASIGN" value="">
            <button class="button submit pf-trigger-<?php echo $id ?>" type="submit" name="submit"><span><?php echo l::get('payment-options-next') ?></span> <img class="send-arrow" src="<?php echo url('assets/images/send.svg') ?>" alt="<?php echo l::get('payment-options-next') ?>" /></button>

          </form>
        </div>
        <?php else: ?>
        <h3>Coming Soon</h3>
        <?php endif ?>
      </div>
    </div>
    <?php if($page->children()->find('info')->showpaypal()->bool()): ?>
    <div id="paypal-<?php echo $id ?>" class="content-2 zebra-child pp">
      <div class="inner paypal">
       <h3><?php echo $page->children()->find('info')->titlepaypal()->html() ?></h3>
        <div class="infotext"><?php echo $page->children()->find('info')->infopaypal()->kt() ?></div>
        <div class="form">
          <form id="paypal-form-<?php echo $id ?>" class="paypalform" name="ppformcustom" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" novalidate>
            <?php $paymentoption = 'pp'; snippet('support/form', array('id' => $id, 'item' => $item, 'payment' => $paymentoption )) ?>

            <input name="Zahlungsart" type="hidden" value="PayPal">
            <input type="hidden" name="business" value="mail@siloam.ch">
            <input type="hidden" name="cmd" value="_donations">
            <input type="hidden" name="item_name" value="Christ in You Movie">
            <?php if(!empty($item['customamount'])): ?>
            <input type="hidden" name="item_number" value="<?php echo l::get('payment-options-customamount') ?>">
            <?php endif ?>
            <input id="pp-currency-code-<?php echo $id ?>" type="hidden" name="currency_code" value="">
            <input id="pp-amountpp-<?php echo $id ?>" type="hidden" name="amount" value="">
            <input id="pp-firstname-<?php echo $id ?>" type="hidden" name="first_name" value="">
            <input id="pp-lastname-<?php echo $id ?>" type="hidden" name="last_name" value="">
            <input id="pp-address1-<?php echo $id ?>" type="hidden" name="address1" value="">
            <input id="pp-citypp-<?php echo $id ?>" type="hidden" name="city" value="">
            <input id="pp-zippp-<?php echo $id ?>" type="hidden" name="zip" value="">
            <input id="pp-emailpp-<?php echo $id ?>" type="hidden" name="email" value="">
            <input id="pp-phonepp-<?php echo $id ?>" type="hidden" name="night_phone_a" value="">
            <input id="pp-lc-<?php echo $id ?>" type="hidden" name="lc" value="CH">
            <input TYPE="hidden" NAME="return" value="<?php echo $page->children()->find('thankyou')->url()?>">
            <input type="hidden" name="cancel_return" value="<?php echo $page->children()->find('error')->url()?>">

            <button class="button submit pf-trigger-<?php echo $id ?>" type="submit" name="submit"><span><?php echo l::get('payment-options-next') ?></span> <img class="send-arrow" src="<?php echo url('assets/images/send.svg') ?>" alt="<?php echo l::get('payment-options-next') ?>" /></button>
            <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1" style="display:none;">

          </form>
        </div>
      </div>
    </div>
    <?php endif ?>
    <?php if($page->children()->find('info')->showbanktransfer()->bool()): ?>
    <div id="transfer-<?php echo $id ?>" class="content-2 zebra-child bt">
      <div class="inner bank-transfer">
        <h3><?php echo $page->children()->find('info')->titlebanktransfer()->html() ?></h3>
        <div class="infotext"><?php echo $page->children()->find('info')->infobanktransfer()->kt() ?></div>
        <div class="form">
          <form id="banktransfer-form-<?php echo $id ?>" class="bankform" action="<?php echo $page->children()->find('sent')->url()?>" target="_blank" method="post">
            <?php $paymentoption = 'bt'; snippet('support/form', array('id' => $id, 'item' => $item, 'payment' => $paymentoption )) ?>
            <input name="Zahlungsart" type="hidden" value="<?php echo l::get('payment-options-bank') ?>">
            <button class="button submit bt-trigger-<?php echo $id ?>" type="submit" name="submit"><span><?php echo l::get('payment-options-next') ?></span> <img class="send-arrow" src="<?php echo url('assets/images/send.svg') ?>" alt="<?php echo l::get('payment-options-next') ?>" /></button>
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
  <?php snippet('support/script') ?>
</section>
