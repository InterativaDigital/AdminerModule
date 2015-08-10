# AdminerModule for YII 1.1

Module to manage database using Adminer (http://www.adminer.org/)

## Usage 

Add the following to your Yii configuration file:

    'modules'=>array(
        'adminer'=>array(
            'class' => 'application.modules.adminer.AdminerModule',
            'users' => array('admin'),
            'roles' => array('Administrator'),
            'ips'   => array('127.0.0.1','::1'),
        ), 
    ),
