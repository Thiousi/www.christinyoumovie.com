<?php if(!empty($item['customamount'])): ?>
<input type="tel" id="<?php echo $payment ?>-amountfr-<?php echo $id ?>" name="AMOUNTFR" value="" placeholder="<?php echo l::get('payment-options-amountchf') ?>" data-validetta="required,number">
<input type="hidden" id="<?php echo $payment ?>-amount-<?php echo $id ?>" name="AMOUNT" value="">
<input id="<?php echo $payment ?>-orderid-<?php echo $id ?>" type="hidden" name="ORDERID" value="<?php
                                            $orderID2 = 'XX-' . date('YmdHis') . '_' . rand(10000,99999);
                                            echo $orderID2;
                                           ?>">
<?php else: ?>
<input id="<?php echo $payment ?>-amountfr-<?php echo $id ?>" type="hidden" name="AMOUNTFR" value="<?php echo $item['amount'] ?>">    
<input id="<?php echo $payment ?>-amount-<?php echo $id ?>" type="hidden" name="AMOUNT" value="">    
<input id="<?php echo $payment ?>-orderid-<?php echo $id ?>" type="hidden" name="ORDERID" value="<?php
                                $orderID = $item['amount'] . '-' . date('YmdHis') . '_' . rand(10000,99999);
                                echo $orderID;
                               ?>">
<?php endif ?>
<input id="<?php echo $payment ?>-name-<?php echo $id ?>" type="text" name="Name" placeholder="<?php echo l::get('names') ?> *" data-validetta="required" />

<input id="<?php echo $payment ?>-address-<?php echo $id ?>" type="text" name="Adresse" placeholder="<?php echo l::get('street') ?> *" data-validetta="required" />
<div class="grid-container">
  <input id="<?php echo $payment ?>-zip-<?php echo $id ?>" class="plz" type="text" name="PLZ" placeholder="<?php echo l::get('zip') ?> *" data-validetta="required" />
  <input id="<?php echo $payment ?>-city-<?php echo $id ?>" class="ort" type="text" name="Ort" placeholder="<?php echo l::get('city') ?> *" data-validetta="required" />
</div>
<input id="<?php echo $payment ?>-country-<?php echo $id ?>" type="text" name="Land" placeholder="<?php echo l::get('country') ?> *" data-validetta="required" />
<input id="<?php echo $payment ?>-email-<?php echo $id ?>" type="email" name="EMAIL" placeholder="<?php echo l::get('email') ?> *" data-validetta="required,email" />
<input id="<?php echo $payment ?>-phone-<?php echo $id ?>" type="tel" name="Telefon" placeholder="<?php echo l::get('phone') ?>"/>
<input id="<?php echo $payment ?>-currency-<?php echo $id ?>" type="hidden" name="CURRENCY" value="<?php echo $page->children()->find('info')->currency()->html() ?>">
<input name="Sprache" type="hidden" value="<?php echo $site->language()->code() ?>">
<input name="Geschenk" type="hidden" value="<?php echo $item['description'] ?>">
<input TYPE="hidden" name="charset" value="utf-8">