<?php

return [

    'driver'=> env('MAIL_DRIVER','smtp'),
    'host'=> env('MAIL_HOST','mail.caliope.com.co'),
    'port'=> env('MAIL_PORT', 465),
    'from'=> [
        'address'=> env('MAIL_FROM_ADDRESS', 'contacto@caliope.com.co'),
        'name'=> env('MAIL_FROM_NAME',' caliope'),
    ],
    'encryption'=> env('MAIL_ENCRYPTION','ssl'),
    'username'=> env('MAIL_USERNAME'),
    'password'=> env('MAIL_PASSWORD'),
    'sendmail'=> '/usr/sbin/sendmail -bs',
    'markdown'=> [
        'theme'=> 'default',
        'paths'=> [
            resource_path('views/vendor/mail'),
        ],
    ],
    'log_channel'=> env('MAIL_LOG_CHANNEL'),

];
