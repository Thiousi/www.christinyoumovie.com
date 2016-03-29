<?php if(!defined('KIRBY')) exit ?>

title: Contact
pages: true
files: true
  sortable: true
fields:
  title:
    label: Navigationstitel
    type:  text
  pagetitle:
    label: Seitentitel
    type:  text
  backgroundimage:
    label: Hintergrundbild
    type: selector
    mode: single
    size:  1
    filter: background
    autoselect: first
    types:
        - image
    width: 3/4    
  fullscreen:
    label: &nbsp;
    type: checkbox
    text: Fullscreen
    width: 1/4          
  linebuilder:
    type: line      
  builder:
    label: Inhalte
    type: builder
    fieldsets:
      bodytext:
        label: Text
        entry: >
          <h1>{{title}}</h1><p>{{text}}</p>
        fields:
          title:
            label: Titel
            type: text
            width: 3/4
          hidetitle:
            label: &nbsp;
            type: checkbox
            text: Verstecken
            width: 1/4  
          text:
            label: Text
            type: textarea
      formcontainer:
        label: Kontaktformular
        entry: >
          <h1>{{title}}</h1><p>{{text}}<br /><br />Zeige das Kontaktformular an: {{contactform}}</p>
        fields:
          title:
            label: Titel
            type: text
          text:
            label: Text
            type: textarea
          contactform:
            label: Kontaktformular
            type: checkbox
            text: Zeige das Kontaktformular an.
            default: 1       
    
  socialline:
    type: line    
  socialall:
    label: Social Media Bereich
    type: checkbox
    text: Zeige alles an.
    default: 1
  socialtextline:
    label: Text
    type: checkbox
    text: Zeige den Textabschnitt an.
    default: 1
    width: 1/4  
  socialicons:
    label: Icons
    type: checkbox
    text: Zeige Social Media Icons.
    default: 1
    width: 1/4
  instafeed:
    label: Instagram Feed
    type: checkbox
    text: Zeige die Bilder von Instagram an.
    default: 1
    width: 1/4
  mailchimp:
    label: Newsletter
    type: checkbox
    text: Zeige die Newsletter-Anmeldung an.
    default: 1
    width: 1/4  
     
  line2:
    type: line       
  actionbuttons:
    label: Action-Buttons
    text: Zeige den Share-Button an.
    type: checkbox
    default: 1 
 