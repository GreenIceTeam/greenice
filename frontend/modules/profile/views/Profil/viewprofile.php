<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'View profile';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['view']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-8">

    <u> <h1><?= Html::encode($this->title) ?></h1></u>
    
    <div class="col-lg-offset-0">
    <?='<img  style="width:35%;height:15em"  src=uploads/'.$photo ?> />
     Modifiez uniquement la photo de profil <a class="btn btn-success" href="/greenice/frontend/web/index.php?r=profile/profil/update-picture">Ici</a>
    
    </div> 
    
    <?php
    $domEtud = $model->domaineEtude;
    $domAct = $model->domaineActivite;
    $domain = ( isset($domEtud) && !empty($domEtud)) ? 'domaineEtude' : 'domaineActivite';
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'statutSocial',
           
            $domain,
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
       <?= Html::a(Yii::t('app', 'Modifier'), ['update'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>

