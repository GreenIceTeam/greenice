<?php

namespace backend\controllers;

use Yii;
use common\models\FichierAssocPubl;
use common\models\FichierAssocPublSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * FichierAssocPublController implements the CRUD actions for FichierAssocPubl model.
 */
class FichierAssocPublController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','view','update','delete'],
                'rules' => [
                    
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all FichierAssocPubl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FichierAssocPublSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FichierAssocPubl model.
     * @param integer $id_fichier
     * @param integer $id_publ
     * @return mixed
     */
    public function actionView($id_fichier, $id_publ)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_fichier, $id_publ),
        ]);
    }

    /**
     * Creates a new FichierAssocPubl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FichierAssocPubl();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fichier' => $model->id_fichier, 'id_publ' => $model->id_publ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FichierAssocPubl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_fichier
     * @param integer $id_publ
     * @return mixed
     */
    public function actionUpdate($id_fichier, $id_publ)
    {
        $model = $this->findModel($id_fichier, $id_publ);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fichier' => $model->id_fichier, 'id_publ' => $model->id_publ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FichierAssocPubl model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_fichier
     * @param integer $id_publ
     * @return mixed
     */
    public function actionDelete($id_fichier, $id_publ)
    {
        $this->findModel($id_fichier, $id_publ)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FichierAssocPubl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_fichier
     * @param integer $id_publ
     * @return FichierAssocPubl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_fichier, $id_publ)
    {
        if (($model = FichierAssocPubl::findOne(['id_fichier' => $id_fichier, 'id_publ' => $id_publ])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
