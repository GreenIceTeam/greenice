<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\modules\member\controllers',
	'modules' => [
        'member' => [
            'class' => 'frontend\modules\member\Member',
        ],
		'profile' => [
            'class' => 'frontend\modules\profile\Profile',
        ],
		'publication' => [
            'class' => 'frontend\modules\publication\Publication',
        ],
		'communaute' => [
            'class' => 'frontend\modules\communaute\Communaute',
        ],
		'message' => [
            'class' => 'frontend\modules\message\Message',
        ],
		'cercle' => [
            'class' => 'frontend\modules\cercle\Cercle',
        ],
		  'discussion' => [
            'class' => 'frontend\modules\discussion\Discussion',
        ],
		'critique_membre' => [
            'class' => 'frontend\modules\critique_membre\CritiqueMembre',
        ],
    ],

    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'member/member/error',
        ],
    ],
    'params' => $params,
];
