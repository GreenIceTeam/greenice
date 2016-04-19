<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'View profile';
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['view-profile']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'id_domaine',
            //'id_sous_dom',
            'username',
            'nom',
            'prenom',
            //'sexe',
            //'role',
            'ville',
            'date_naiss',
            'date_insc',
           // 'auth_key',
           // 'password_hash',
           // 'password_reset_token',
            'email:email',
           // 'last_active_time',
           // 'status',
           // 'created_at',
           // 'updated_at',
        ],
    ]) ?>

     <p>
       <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' =>Yii::$app->getUser()->getId()], ['class' => 'btn btn-primary']) ?>
    </p>

</div>

