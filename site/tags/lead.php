<?php
kirbytext::$tags['lead'] = array(
  'html' => function($tag) {
    $lead = kirbytext($tag->attr('lead'));
    return preg_replace('/(.*)<\/p>/', '$1', preg_replace('/<p>(.*)/', '$1', '<p class="lead">' . $lead . '</p>'));
  }
);