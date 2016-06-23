<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/
@include 'license.php';

// c::set('panel.stylesheet', 'assets/css/custom-panel.css');
/*




---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

//Caching
c::set('cache', false);
//
c::set('cache.ignore', array(
  'support',
  'contact',
  'contact/send',
  'contact/contact-send'
));

// Multilanguage
c::set('date.handler', 'strftime');

c::set('languages', array(
  array(
    'code'    => 'en',
    'name'    => 'English',
    'default' => true,
    'url'     => '/',
    'locale'   => 'en_US',
    //    'locale'  => array(
    //      LC_COLLATE  => 'en_US.utf8',
    //      LC_MONETARY => 'en_US.utf8',
    //      LC_NUMERIC  => 'en_US.utf8',
    //      LC_TIME     => 'en_US.utf8',
    //      LC_MESSAGES => 'en_US.utf8',
    //      LC_CTYPE    => 'en_US.utf8'
    //    ),
  ),
  array(
    'code'    => 'de',
    'name'    => 'Deutsch',
    'url'     => '/de',
    'locale'   => 'de_DE',
//    'locale'  => array(
//      LC_COLLATE  => 'de_DE.utf8',
//      LC_MONETARY => 'de_DE.utf8',
//      LC_NUMERIC  => 'de_DE.utf8',
//      LC_TIME     => 'de_DE.utf8',
//      LC_MESSAGES => 'de_DE.utf8',
//      LC_CTYPE    => 'de_DE.utf8'
//    ),
  ),
));

c::set('language.detect', true);


// Sitemap
c::set('sitemap.exclude', array('error', 'support/info', 'support/thankyou', 'support/sent', 'support/error', 'contact/send'));
c::set('sitemap.important', array('christ-in-you', 'support'));


// Route for Kickstarter
c::set('routes', array(
  array(
    'pattern' => 'indiegogo',
    'action' => function () {
      header::redirect('https://www.indiegogo.com/projects/christ-in-you-the-movie', 301);
    }
  ),
));
