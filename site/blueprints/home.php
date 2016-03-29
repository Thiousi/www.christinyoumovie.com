<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: false
files: true
  sortable: true
fields:
  title:
    label: Navigationstitel
    type:  text
  pagetitle:
    label: Seitentitel
    type:  text
  pagetagline:
    label: Tagline
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
  linebuilder:
    type: line        
  builder:
    label: Inhalte
    type: builder
    fieldsets:
      bodytext:
        label: Nur Text
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
      quotescontainer:
        label: Zitatesammlung
        entry: >
          Zeige eine Sammlung der untenstehenden Zitate an.
        fields:
          quote:
            label: Zitate
            type: checkbox
            text: Zeige eine Sammlung der Zitate an.
            default: 1
  lineitems:
    type: line            
                
  quotes:
    label: Zitate
    type: builder
    fieldsets:
      quote:
        label: Zitat
        entry: >
          <div style="float:right;">Bild: {{image}}</div><i>"{{text}}"</i><br />{{citation}}
        fields:
          text:
            label: Zitat
            type: textarea
          citation:
            label: Autor
            type: text
          image:
            label: Bild
            type: select
            options: images      
    
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
    