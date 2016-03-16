<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RecevoirPubl */

$this->title = $model->id_user;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recevoir Publs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recevoir-publ-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_user' => $model->id_user, 'id_publ' => $model->id_publ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_user' => $model->id_user, 'id_publ' => $model->id_publ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_user',
            'id_publ',
            'affiche',
        ],
    ]) ?>

</div>
