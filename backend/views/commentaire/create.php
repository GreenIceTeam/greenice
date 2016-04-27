<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Commentaire */

$this->title = Yii::t('app', 'Create Commentaire');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Commentaires'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commentaire-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
