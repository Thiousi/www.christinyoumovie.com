<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: default
fields:
  title:
    label: Title
    type:  text
  author:
    label: Author
    type:  text
  description:
    label: Description
    type:  textarea
  keywords:
    label: Keywords
    type:  tags
  copyright:
    label: Copyright
    type:  text
  line:
    type: line
    label: Social Media
  socialtitle:
    label: Titel
    type: text
  socialtext:
    label: Text
    type: textarea
  facebook:
    label: Facebook
    type: text
    placeholder: Benutzername
    width: 1/3
  instagram:
    label: Instagram
    type: text
    width: 1/3
    placeholder: Benutzername
  twitter:
    label: Twitter
    type: text
    width: 1/3
    placeholder: Benutzername
  youtube:
    label: Youtube
    type: text
    width: 1/3
    placeholder: Benutzername
  vimeo:
    label: vimeo
    type: text
    width: 1/3
    placeholder: Benutzername
  actionline:
    label: Action Buttons
    type: line
  spreadtitle:
    label: Titel des Share-Buttons
    type: text    
  twittertext:
    label: Text für Tweet (Share on twitter)
    type: text
  facebooktext:
    label: Text für Facebook (Share on Facebook)
    type: textarea