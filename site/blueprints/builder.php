<?php if(!defined('KIRBY')) exit ?>

title: Builder
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
  builder:
    label: Inhalte
    type: builder
    fieldsets:
      bodytext:
        label: Body Text
        entry: >
          <h1>{{title}}</h1><p>{{text}}</p>
        fields:
          title:
            label: Titel
            type: text
          text:
            label: Text
            type: textarea
      linkedImage:
        label: Linked Image
        entry: >
          <img src="{{_fileUrl}}{{image}}" height=120px/></br>
          {{url}}
        fields:
          image:
            label: Category
            type: select
            options: images
          url:
            label: Link Url
            type: text
      quote:
        label: Quote
        entry: >
          <i>"{{text}}"</i></br>
          {{citation}}
        fields:
          text:
            label: Quote Text
            type: textarea
          citation:
            label: Citation
            type: text
  zitate:
    label: Zitate
    type: builder
    fieldsets:
      quote:
        label: Quote
        entry: >
          <i>"{{text}}"</i></br>
          {{citation}}
        fields:
          text:
            label: Quote Text
            type: textarea
          citation:
            label: Citation
            type: text