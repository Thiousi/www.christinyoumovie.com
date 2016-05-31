// set Viewport height for older devices
$(window).on("resize", function(){
    var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
    $(".fullscreen #banner").css({ "height": h });
}).resize();

$(document).ready(function () {

  // Parallax Section height
  $('div[data-type="background"]').each(function(){
      var $bgobj = $(this); // assigning the object

      $(window).scroll(function() {
          var yPos = -($window.scrollTop() / $bgobj.data('speed'));
          // Put together our final background position
          var coords = '50% '+ yPos + 'px';

          // Move the background
          $bgobj.css({ backgroundPosition: coords });
      });
  });

  // $(window).Scrollax();

  $(function(){
    $(".bg-image").each(function(){
        var height = $(this).find('.inner').outerHeight();
        $(this).find('.parallax-section').css({'min-height': height+'px'});
        // console.log(height);
    });
    //console.log(totalHeight);
});

  //Parallax Scrolling
  var ypos,parallaxItem1,parallaxItem2,parallaxItem3,parallaxItem4;
  function parallax() {
    var bannerHeight = $('#banner').outerHeight();
    ypos = window.pageYOffset;
    parallaxItem1 = document.querySelector('[data-parallax="background"]');
    if(parallaxItem1 != null) {
      parallaxItem1.style.top = ypos * .35 + 'px';
    }
    parallaxItem2 = document.querySelector('[data-parallax="title"]');
    if(parallaxItem2 != null) {
      parallaxItem2.style.top = ypos * -.8 + 'px';
    }
    parallaxItem3 = document.querySelector('[data-parallax="tagline"]');
    if(parallaxItem3 != null) {
      parallaxItem3.style.top = ypos * -.4 + 'px';
    }
    parallaxItem4 = document.querySelector('[data-parallax="button"]');
    if(parallaxItem4 != null) {
      parallaxItem4.style.top = ypos * .3 + 'px';
    }
    parallaxItem5 = document.querySelector('[data-parallax="start-arrow"]');
    if(parallaxItem5 != null) {
      var arrowOpacity = (bannerHeight - (ypos*2)+200) / (bannerHeight)
      if (arrowOpacity > 1) {
        parallaxItem5.style.opacity = 1 ;
      }
      if (arrowOpacity < 1 && arrowOpacity > 0) {
        parallaxItem5.style.opacity = arrowOpacity ;
      }
      if (arrowOpacity < 0) {
        parallaxItem5.style.opacity = 0 ;
      }
    }
  }
  window.addEventListener('scroll',parallax);
  // Parallax Sections
  // $('.parallax-section').scrolly({
  //   bgParallax: true
  // });

  // Viewportchecker
  $('.start').addClass('zero').viewportChecker({
    classToRemove: 'zero',
    offset: 100
  });
  // Navigation
  $('#menu-button').fastClick(function (e) {
    $('#menu-button').toggleClass('bt-menu-open');
    $('.push-container').toggleClass('nav-open');
    $('#off-nav').toggleClass('nav-open');
    e.preventDefault();
  });
  $('.overlay').fastClick(function (e) {
    $('#menu-button').removeClass('bt-menu-open');
    $('.push-container').removeClass('nav-open');
    $('#off-nav').removeClass('nav-open');
    e.preventDefault();
  });

  // Remove border on #menu-button, if #banner is out of viewport and make #totop Button visible

  $('#banner').viewportChecker({
    offset: 50,
    repeat: true,
    callbackFunction: function (elem, action) {
      if(action == 'add'){
        $('#menu-button').addClass('no-border');
        $('#totop').addClass('hidden');
      }else{
        $('#menu-button').removeClass('no-border');
        $('#totop').removeClass('hidden');
      }
    }
  });

  // Show / Hide "ToTop"-Button
  $('footer').viewportChecker({
//    classToAdd: 'test',
    offset: 0,
    repeat: true,
    callbackFunction: function (elem, action) {
      if(action == 'add'){
        $('#totop').addClass('bottom');
      }else{
        $('#totop').removeClass('bottom');
      }
    }
  });

  // "ToTop"-Button
  $('#totop').click(function () {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    },'slow');
  });



  $('.start-scroll').click(function () {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: $('#start').offset().top
    });
  });

  var feed = new Instafeed({
    get: 'user',
//    tagName: 'dievierpunkte',
    userId: 2209505137,
    accessToken: '2209505137.467ede5.9be4ea637f6f424fb778532900d53ff6',
//    clientId: '16445d9a5cdd4e9680ba05b7cf7f5739',
    template: '<div class="insta-item"><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></div>',
    limit: '10',
    resolution: 'standard_resolution',
    after: function() {
      $('#instafeed').slick({
        dots: false,
        arrows: false,
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 1,
        infinite: true,
        mobileFirst: true,
        prevArrow: '<a class="slick-prev">Previous</a>',
        nextArrow: '<a class="slick-next">Next</a>',
        responsive: [
        {
          breakpoint: 639,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: false,
            arrows: true
          }
        },
        {
          breakpoint: 959,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            centerMode: false,
            arrows: true
          }
        },
//        {
//          breakpoint: 1919,
//          settings: {
//            slidesToShow: 6,
//            slidesToScroll: 1,
//            centerMode: false,
//            arrows: true
//          }
//        }
        ]

      });
    }
  });
  feed.run();



  $('.quotes-slider').slick({
    autoplay: false,
    dots: true,
    arrows: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    mobileFirst: true,
    prevArrow: '<a class="slick-prev">Previous</a>',
    nextArrow: '<a class="slick-next">Next</a>',
    responsive: [
      {
        breakpoint: 639,
        settings: {
          autoplay: true,
          autoplaySpeed: 10000,
          dots: true,
          infinite: true,
          speed: 300,
          slidesToShow: 1,
          adaptiveHeight: false,
          arrows: true
        }
    }
  ]
  });

  $('.rewards-slider').slick({
    dots: true,
    arrows: false,
    slidesToShow: 1,
    infinite: true,
    adaptiveHeight: true,
    mobileFirst: true,
    prevArrow: '<a class="slick-prev">Previous</a>',
    nextArrow: '<a class="slick-next">Next</a>',
    responsive: [{
      breakpoint: 639,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        arrows: true
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        adaptiveHeight: true,
        arrows: true
      }
    },
    {
      breakpoint: 1180,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        adaptiveHeight: true,
        arrows: true
      }
    }]

  });

  // Ajax für mailchimp Anmeldung
  $(function () {
    var $mcform = $('#mc-subscribe-form');
    $('#mc-subscribe').on('click', function(event) {
      if(event) event.preventDefault();
      register($mcform);
    });
  });

  function register($mcform) {
    $.ajax({
      type: $mcform.attr('method'),
      url: $mcform.attr('action'),
      data: $mcform.serialize(),
      cache       : false,
      dataType    : 'json',
      contentType: "application/json; charset=utf-8",
      error       : function(err) { $('#mc-notification').html('<div class="flash-error"><span>Could not connect to server. Please try again later.<span></div>'); },
      success     : function(data) {

        if (data.result != "success") {
          var message = data.msg.substring(0);
          $('#mc-notification').html('<div class="flash-alert">'+message+'</div>');
        }

        else {
          var message = data.msg;
          $('#mc-notification').html('<div class="flash-success">'+message+'</div>');
        }
      }
    });
  };

  var timelineBlocks = $('.cd-timeline-block'),
    offset = 0.8;

  //hide timeline blocks which are outside the viewport
  hideBlocks(timelineBlocks, offset);

  //on scolling, show/animate timeline blocks when enter the viewport
  $(window).on('scroll', function () {
    (!window.requestAnimationFrame) ? setTimeout(function () {
      showBlocks(timelineBlocks, offset);
    }, 100): window.requestAnimationFrame(function () {
      showBlocks(timelineBlocks, offset);
    });
  });

  function hideBlocks(blocks, offset) {
    blocks.each(function () {
      ($(this).offset().top > $(window).scrollTop() + $(window).height() * offset) && $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
    });
  }

  function showBlocks(blocks, offset) {
    blocks.each(function () {
      ($(this).offset().top <= $(window).scrollTop() + $(window).height() * offset && $(this).find('.cd-timeline-img').hasClass('is-hidden')) && $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
    });
  }

  // Hovereffekt für Touchdevice

  $('.touchevents .tab').fastClick(function (e) {
    if($(this).hasClass('hover_on')) {
      $(this).removeClass('hover_on');
    } else {
      $('.tab').removeClass('hover_on');
      $(this).addClass('hover_on');
    }
    e.preventDefault();
  });

  $('.focus-parent').focus(
    function(){
        $(this).parent('div').addClass('focus');
    }).blur(
    function(){
        $(this).parent('div').removeClass('focus');
    });

    // Modal
      $("#modal-1").on("change", function() {
        if ($(this).is(":checked")) {
          $("body").addClass("modal-open");
          // Get src of iframe and add autoplay=1
          var iframesrc = document.getElementById("autoplayopen").src;
          document.getElementById("autoplayopen").src = iframesrc + '&autoplay=1';

        } else {
          $("body").removeClass("modal-open");
          $('#autoplayopen')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
          // document.getElementById("autoplayopen").stopVideo();
        }
      });

      $(".modal-fade-screen, .modal-close").on("click", function() {
        $(".modal-state:checked").prop("checked", false).change();
      });

      $(".modal-inner").on("click", function(e) {
        e.stopPropagation();
      });
});
