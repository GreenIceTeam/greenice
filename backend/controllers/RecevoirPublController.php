<?php

namespace backend\controllers;

use Yii;
use common\models\RecevoirPubl;
use common\models\RecevoirPublSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RecevoirPublController implements the CRUD actions for RecevoirPubl model.
 */
class RecevoirPublController extends Controller
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
     * Lists all RecevoirPubl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecevoirPublSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecevoirPubl model.
     * @param integer $id_user
     * @param integer $id_publ
     * @return mixed
     */
    public function actionView($id_user, $id_publ)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user, $id_publ),
        ]);
    }

    /**
     * Creates a new RecevoirPubl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RecevoirPubl();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_publ' => $model->id_publ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RecevoirPubl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_user
     * @param integer $id_publ
     * @return mixed
     */
    public function actionUpdate($id_user, $id_publ)
    {
        $model = $this->findModel($id_user, $id_publ);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_publ' => $model->id_publ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RecevoirPubl model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_user
     * @param integer $id_publ
     * @return mixed
     */
    public function actionDelete($id_user, $id_publ)
    {
        $this->findModel($id_user, $id_publ)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RecevoirPubl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param integer $id_publ
     * @return RecevoirPubl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $id_publ)
    {
        if (($model = RecevoirPubl::findOne(['id_user' => $id_user, 'id_publ' => $id_publ])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
