<?php
$app->get('/', 'App\Action\HomeAction:dispatch')
    ->setName('homepage');