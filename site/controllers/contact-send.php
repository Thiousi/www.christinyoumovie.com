<?php

return function($site, $pages, $page) {

    $form = uniform(
        'contact-form',
        array(
            'required' => array(
                'name'      => '',
                'message'   => '',
                '_from'     => 'email'
            ),
            'actions' => array(
                array(
                    '_action' => 'email',
                    'to'      => 'mail@siloam.ch',
                    'sender'  => 'noreply@siloam.ch',
                    'subject' => $site->title()->html() . ' - Message from the contact form',
                    'snippet' => 'uniform/uniform-contact'
                )
            )
        )
    );

    return compact('form');
};