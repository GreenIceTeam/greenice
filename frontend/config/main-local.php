<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation

            'cookieValidationKey' => 'lpHjVMJou2gkSvmn7n4x5aIwm0_crxXm',
        ],
   
            'session'=>[
                                                    'name'=>'FRONTENDID4',
                                                    'savePath'=>__DIR__.'/../tmp',
            ],

            'user'=>[
                                                    'identityClass'=>'common\models\User',
                                                    'enableAutoLogin'=>true,
                                                    'identityCookie'=>[
                                                                                    'name'=>'_frontendUser',
                                                                                      'path'=>'/greenice/frontend/web'
                                                    ]		
            ]

      ],

'defaultRoute'=>'member/member/index'
                 
    
    
    ];
=======
            'cookieValidationKey' => 'XdOGMxgNwquMYkhELsACOxkKCZ2jg-_9',
        ],
    ],
];
>>>>>>> 3b0f45070d25577b1cc18608d14a1526d41677f3

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
