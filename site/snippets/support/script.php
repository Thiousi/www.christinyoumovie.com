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
    
  });
  // Open / Close accordion .content-2
  $('.trigger-2').click(function(e) {
    // Grab current anchor value
    var currentAttrValue = $(this).attr('href');

    var paymentOption = $(this).attr('data-option');

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

  
  // <!-- Form submission handler to GoogleDocs -->

  
  $('.trigger').click(function(a) {  
    // Variable to hold request
    var request;
    var id = $(this).attr('data-id');
    // Bind to the submit event of our form
    
      // Open / Close accordion .content-2
      $('.trigger-2').click(function() {

        var paymentOption = $(this).attr('data-option');
        
        $('#postfinance-form-' + id + ', #banktransfer-form-' + id + ', #paypal-form-' + id).validetta({
          showErrorMessages : false,
          realTime: true,
          display : 'inline',
          onValid : function( event ) {
            //event.preventDefault(); // Will prevent the submission of the form
            $('input').removeClass('erroneous');
            // Multiplay amount with 100
            
            if (paymentOption == 'postfinance') {
              // Some mods for Postfinance
              document.getElementById('pf-amount-' + id).value = document.getElementById('pf-amountfr-' + id).value * 100;
              
              // Create SHA-1 Hash
              var sha1hash = [
                { type: 'ACCEPTURL', value: document.getElementById('pf-accepturl-' + id).value },
                { type: 'AMOUNT', value: document.getElementById('pf-amount-' + id).value },
                { type: 'CANCELURL', value: document.getElementById('pf-cancelurl-' + id).value },
                { type: 'CURRENCY', value: document.getElementById('pf-currency-' + id).value },
                { type: 'DECLINEURL', value: document.getElementById('pf-declineurl-' + id).value },
                { type: 'EMAIL', value: document.getElementById('pf-email-' + id).value },
                { type: 'HOMEURL', value: document.getElementById('pf-homeurl-' + id).value },
                { type: 'LANGUAGE', value: document.getElementById('pf-language-' + id).value },
                { type: 'OPERATION', value: document.getElementById('pf-operation-' + id).value },
                { type: 'ORDERID', value: document.getElementById('pf-orderid-' + id).value },
                { type: 'PSPID', value: document.getElementById('pf-pspid-' + id).value },
              ].map(function(elem) {
                return elem.type + '=' + elem.value + '<?php echo $page->children()->find('info')->shainsg()->html() ?>';
              }).join('');
              var hash = CryptoJS.SHA1(sha1hash);
              var a1 = hash.toString(CryptoJS.enc.Hex).toUpperCase();
              document.getElementById('pf-shasign-' + id).value = a1;
              
            } else if ( paymentOption =='paypal' ) {
              // Copy Values to other fields, specifed for Paypal
              document.getElementById('pp-amountpp-' + id).value = document.getElementById('pp-amountfr-' + id).value + '.00';
              document.getElementById('pp-currency-code-' + id).value = document.getElementById('pp-currency-' + id).value;
              var fullname = document.getElementById('pp-name-' + id).value;
              document.getElementById('pp-firstname-' +id).value = fullname.split(' ').slice(0, -1).join(' ');
              document.getElementById('pp-lastname-' +id).value = fullname.split(' ').slice(-1).join(' ');
              document.getElementById('pp-address1-' + id).value = document.getElementById('pp-address-' + id).value;
              document.getElementById('pp-citypp-' + id).value = document.getElementById('pp-city-' + id).value;
              document.getElementById('pp-zippp-' + id).value = document.getElementById('pp-zip-' + id).value;
              document.getElementById('pp-phonepp-' + id).value = document.getElementById('pp-phone-' + id).value;
              document.getElementById('pp-emailpp-' + id).value = document.getElementById('pp-email-' + id).value;
            } else if ( paymentOption =='banktransfer' ) {
              document.getElementById('bt-amount-' + id).value = document.getElementById('bt-amountfr-' + id).value;
            }
            // Abort any pending request
            if (request) {
                request.abort();
            }
            var formData = $(this.form).serialize();
            // <!-- Form submission handler to GoogleDocs -->
            request = $.ajax({
                url: "https://script.google.com/macros/s/AKfycbxE39oyjWcqzm0acZOWWqY0cAuAgXFSl0RNNPL3zFnk2eREe_Ym/exec",
                type: "post",
                data: $(this.form).serialize(),
//                contentType: "application/json; charset=utf-8",
//                dataType: "json",
            });
            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // Log a message to the console
                console.log("Hooray, it worked!");
            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });
            console.log(paymentOption);
//            if (paymentOption == 'banktranser') {
//              request2 =  $.ajax({
//                url: '<?php echo $page->children()->find('sent')->url()?>',
//                type: 'POST',
//                data: $(this.from).serialize(),
//              })
//            }
            window.setTimeout(function(){location.reload()},2000)
          },
          onError : function( event ){
            event.preventDefault(); // Will prevent the submission of the form
            $('input').removeClass('erroneous');
            var invalidFields = this.getInvalidFields();
            $.each(invalidFields, function(k,v) {
              $(invalidFields[k].field).addClass('erroneous');
            });

          }

        });
    
      });
    });
}

</script>