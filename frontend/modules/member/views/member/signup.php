<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\modules\member\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\models\Domaine;
use common\models\SousDomaine;
use yii\bootstrap\ActiveForm;
//use kartik\date\DatePicker;
use yii\jui\DatePicker;

//$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
$this->registerCss('.field-signupform-domaineetude{display: none}');
$this->registerCss('.field-signupform-domaineactivite{display: none}');
$this->registerCss('.field-signupform-sousdomaine{display: none}');
//$this->registerCssFile('css/login.css');
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>Please fill out the following fields to signup:</p>-->
    <div class="container">
        
<div class="row">
                <?php
                $form = ActiveForm::begin(['options' => ['id' => 'form-signup', 'class' => 'col-lg-12'],
                            'fieldConfig' => ['inputOptions' => ['class' => 'form-control']]]);
                ?>
        
        <div class="row">
            <div id="bloc1" class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-offset-1 col-sm-5">
                <div class="row">
                    <legend id="leg1"><center>Etape 1</center></legend>
                </div>
                <div class="row">
                    <?= $form->field($model, 'nom')->textInput()->label('Nom') ?>
                    <?= $form->field($model, 'prenom')->textInput() ?>
                    <?php /*                     * ' Né(e) le'.DatePicker::widget([
                      'language' => 'fr',
                      'model' => $model,
                      'attribute' => 'dateNaiss',
                      'value'=>'',
                      'clientOptions' => [
                      'dateFormat' => 'yy-mm-dd']
                      ])
                     */ ?>
                    <?=
                    $form->field($model, 'sexe')->dropDownList(
                            ['H' => 'Homme', 'F' => 'Femme']
                    )
                    ?>
                    <div class="row">
                        <legend id="leg2"><center>Etape 2</center></legend>
                    </div>

                </div>

                <div class="row">
                    <?= $a = $form->field($model, 'email')->textInput()->label('email') ?>
                    <?= $form->field($model, 'username')->label('nom d\'utilisateur') ?>
                    <?= $form->field($model, 'password')->passwordInput()->label('mot de passe') ?>
                    <?= $form->field($model, 'password_repeat')->passwordInput()->label('Retapez votre mot de passe') ?>
                </div>
            </div>
            
            <div id="bloc2" class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-offset-1 col-sm-5">
                <div class="row">
                    <legend id="leg3"><center>Etape 3</center></legend>
                </div>
                    <?=
                    $form->field($model, 'statutSocial')->label('Vous êtes:',['id'=>'labelIsole'])->radioList(['etudiant' => 'etudiant', 'travailleur' => 'travailleur'], ['item' => function($index, $label, $name, $checked, $value) {
                            $res = '<label class="modal-info">'
                                    . '<input type="radio" name="' . $name . '" value="' . $value . '" id="statut' . $index . '">'
                                    . '<span>' . ucwords($label) . '</span></label>';
                            return $res;
                        }]);
                    ?>
                    <?=
                            $form->field($model, 'domaineEtude')->label('domaine d\'étude', ['id' => 'labEtud'])
                            ->dropDownList(
                                    ArrayHelper::merge(['' => 'Choisir une option'], ArrayHelper::map(Domaine::find()->where(['type' => ['etude', 'mixte']])->all(), 'id_domaine', 'nom'))
                                    , ['onchange' => '$.post("index.php?r=member/member/lists&idDomaine=" + $(this).val(),'
                                . 'function (data){ 
                                                                                                                $("#signupform-sousdomaine").html(data); 
                                                                                                                $(".field-signupform-sousdomaine").css({"display" : "block"});
                                                                                                      })'
                    ]);
                    ?>
                    <?=
                            $form->field($model, 'domaineActivite')->label('domaine d\'activité', ['id' => 'labAct'])
                            ->dropDownList(
                                    ArrayHelper::merge(['' => 'Choisir une option'], ArrayHelper::map(Domaine::find()->where(['type' => ['travail', 'mixte']])->all(), 'id_domaine', 'nom'))
                                    , ['onchange' => '$.post("index.php?r=member/member/lists&idDomaine=" + $(this).val(),'
                                . 'function (data){ 
                                                                                                                $("#signupform-sousdomaine").html(data); 
                                                                                                                $(".field-signupform-sousdomaine").css({"display" : "block"});
                                                                                                      })'
                    ]);
                    ?>
                    <?=
                            $form->field($model, 'sousDomaine')->label('sous domaine', ['id' => 'labSousDom'])
                            ->dropDownList(
                                    ArrayHelper::map(SousDomaine::find()->where(['id_domaine' => $model->domaineEtude])->all(), 'id_sous_dom', 'nom'));
                    ?>
                    <?= $form->field($model, 'ville')->textInput() ?>
            </div>
            <?php // Html::submitButton('Annuler', ['id' => 'stop', 'class' => 'btn btn-success pull-right', 'name' => 'signup-button']) ?>
            <?= Html::submitButton('Envoyer le formulaire', ['id' => 'envoie', 'class' => 'btn btn-success pull-right', 'name' => 'signup-button']) ?>  
            
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>



<?php
$this->registerJsFile('js/jquery.min.js');

$this->registerJsFile('js/memberSignup.js');

$this->registerJsFile('js/formulaires.js');
