<?php

return function($site, $pages, $page) {
  
   $form = uniform(get('_id'), array(
         'required' => array(
           'name' => '',
           '_from' => 'email',
           'street' => '',
           'zip' => '',
           'city' => '',
           'country' => '',
         ),
         'actions'  => array(
            array(
              '_action' => 'email',
              'to'      => (string) $page->toemail(),
              'sender'  => 'noreply@siloam.ch',
              'subject' => 'Kontaktformular - siloam.ch',
              'snippet' => 'uniform/uniform-donation'
            ),
            array(
               '_action' => 'log',
               'file'    => 'log/donation-form.log'
            )
         )
      )
                                   
  );
  return compact("form");
  
  
};