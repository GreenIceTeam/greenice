<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FichierAssocMess */

$this->title = Yii::t('app', 'Create Fichier Assoc Mess');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fichier Assoc Messes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fichier-assoc-mess-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
