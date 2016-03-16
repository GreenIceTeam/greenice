<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FichierAssocPubl */

$this->title = Yii::t('app', 'Create Fichier Assoc Publ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fichier Assoc Publs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fichier-assoc-publ-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
