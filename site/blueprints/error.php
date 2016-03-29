<?php if(!defined('KIRBY')) exit ?>

title: Error
pages: false
files: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
    size:  large

  line2:
    type: line       
  actionbuttons:
    label: Action-Buttons
    text: Zeige den Share-Button an.
    type: checkbox
    default: 1 