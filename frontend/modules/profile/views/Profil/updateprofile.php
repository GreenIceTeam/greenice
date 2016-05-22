<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use  yii\helpers\ArrayHelper;
use common\models\Domaine;
use common\models\SousDomaine;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */


$this->registerCss('.field-profileform-domaineetude{display: none}');
$this->registerCss('.field-profileform-domaineactivite{display: none}');
$this->registerCss('.field-profileform-sousdomaine{display: none}');

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', 'Update {modelClass} ', [
    'modelClass' => 'Profile',
]);

$this->params['breadcrumbs'][] = ['label' =>'profil', 'url' => ['view']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

?>
<div class="user-update">

                <h2><?= Html::encode($this->title) ?></h2>
                
    <div class="col-lg-8">

                <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options'=>['enctype'=>'multipart/form-data']]); ?>

                                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'prenom')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'photo')->fileInput() ?>

                                <?= $form->field($model, 'ville')->textInput(['maxlength' => true]) ?>

                                
         <?= $form->field($model, 'statutSocial')->label('Vous êtes:')->radioList(['etudiant'=>'etudiant', 'travailleur'=>'travailleur'], 
                                                                                        ['item'=>function($index, $label, $name, $checked, $value){     
                                                                                                               $res = '<label class="modal-info">'
                                                                                                                       . '<input type="radio" name="'.$name.'" value="'.$value.'" id="statut'.$index.'">'
                                                                                                                       .'<span>'.ucwords($label).'</span></label>';
                                                                                        return $res;
                                                                                        }])
                    ?>
                <?= $form->field($model, 'domaineEtude')->label('domaine d\'étude', ['id'=>'labEtud'] ) 
                                                                                      ->dropDownList(
                                                                                      ArrayHelper::merge([''=>'Choisir une option'], ArrayHelper::map(Domaine::find()->where(['type'=>['etude', 'mixte']])->all(), 'id_domaine', 'nom'))
                                                                                              , ['onchange'=>  '$.post("index.php?r=member/member/lists&idDomaine=" + $(this).val(),'
                                                                                                  .'function (data){ 
                                                                                                                $("#profileform-sousdomaine").html(data); 
                                                                                                                $(".field-profileform-sousdomaine").css({"display" : "block"});
                                                                                                      })'
                                                                                             ]);
                                                                                     ?>
            
            <?= $form->field($model, 'domaineActivite')->label('domaine d\'activité', ['id'=>'labAct'] )
                                                                                   ->dropDownList(
                                                                                       ArrayHelper::merge([''=>'Choisir une option'], ArrayHelper::map(Domaine::find()->where(['type'=>['travail', 'mixte']])->all(), 'id_domaine', 'nom'))
                                                                                            , ['onchange'=>  '$.post("index.php?r=member/member/lists&idDomaine=" + $(this).val(),'
                                                                                                  .'function (data){ 
                                                                                                                $("#profileform-sousdomaine").html(data); 
                                                                                                                $(".field-profileform-sousdomaine").css({"display" : "block"});
                                                                                                      })'
                                                                                             ]);
                                                                                         ?>
            
            <?= $form->field($model, 'sousDomaine')->label('sous domaine', ['id'=>'labSousDom'])
                                                                               ->dropDownList(
                                                                                        ArrayHelper::map(SousDomaine::find()->where(['id_domaine'=>$model->domaineEtude])->all(), 'id_sous_dom', 'nom')   );
                                                                                          ?>

        
        
        
        
        

                    <div class="form-group">
                        <?= Html::submitButton('Modifier', ['class' => 'btn btn-success' ]) ?>
                        <a class="btn btn-success" href="/greenice/frontend/web/index.php?r=profile/profil/view">Annuler</a>
                    </div>

                <?php ActiveForm::end(); ?>

    </div>
                
</div>
 

<?php 
$this->registerJsFile('js/jquery.min.js');

$this->registerJsFile('js/memberSignup.js'
                //            , ['depends'=>'frontend\assets\AppAsset']
        );


 



