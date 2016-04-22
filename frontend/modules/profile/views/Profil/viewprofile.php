<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'View profile';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['view-profile']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-8">

    <u> <h1><?= Html::encode($this->title) ?></h1></u>
    
    <div class="col-lg-offset-0">
    <?='<img  style="width:35%;height:15em"  src=uploads/'.$photo ?> />
     Modifiez uniquement la photo de profil <a class="btn btn-success" href="/greenice/frontend/web/index.php?r=profile/profil/change">Ici</a>
    
    </div> 
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'statutSocial',
           
            'domaineEtude',
            'sousDomaine',
            'username',
            'nom',
            'prenom',
            'ville',
            'date_naiss',
            'date_insc',
            'email:email',
           
        ],
    ]) ?>

     <p>
       <?= Html::a(Yii::t('app', 'Modifier'), ['update', 'id' =>Yii::$app->getUser()->getId()], ['class' => 'btn btn-primary']) ?>
    </p>

</div>

