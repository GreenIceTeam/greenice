<?php

namespace backend\controllers;

use Yii;
use common\models\RecevoirMess;
use common\models\RecevoirMessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RecevoirMessController implements the CRUD actions for RecevoirMess model.
 */
class RecevoirMessController extends Controller
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
     * Lists all RecevoirMess models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecevoirMessSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecevoirMess model.
     * @param integer $id_dest
     * @param integer $id_mess
     * @return mixed
     */
    public function actionView($id_dest, $id_mess)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_dest, $id_mess),
        ]);
    }

    /**
     * Creates a new RecevoirMess model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RecevoirMess();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_dest' => $model->id_dest, 'id_mess' => $model->id_mess]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RecevoirMess model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_dest
     * @param integer $id_mess
     * @return mixed
     */
    public function actionUpdate($id_dest, $id_mess)
    {
        $model = $this->findModel($id_dest, $id_mess);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_dest' => $model->id_dest, 'id_mess' => $model->id_mess]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RecevoirMess model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_dest
     * @param integer $id_mess
     * @return mixed
     */
    public function actionDelete($id_dest, $id_mess)
    {
        $this->findModel($id_dest, $id_mess)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RecevoirMess model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_dest
     * @param integer $id_mess
     * @return RecevoirMess the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_dest, $id_mess)
    {
        if (($model = RecevoirMess::findOne(['id_dest' => $id_dest, 'id_mess' => $id_mess])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
