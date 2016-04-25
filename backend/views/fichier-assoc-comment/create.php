<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FichierAssocComment */

$this->title = Yii::t('app', 'Create Fichier Assoc Comment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fichier Assoc Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fichier-assoc-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
