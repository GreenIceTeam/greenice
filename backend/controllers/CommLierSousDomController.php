<?php

namespace backend\controllers;

use Yii;
use common\models\CommLierSousDom;
use common\models\CommLierSousDomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CommLierSousDomController implements the CRUD actions for CommLierSousDom model.
 */
class CommLierSousDomController extends Controller
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
     * Lists all CommLierSousDom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommLierSousDomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CommLierSousDom model.
     * @param integer $id_sous_dom
     * @param integer $id_comm
     * @return mixed
     */
    public function actionView($id_sous_dom, $id_comm)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_sous_dom, $id_comm),
        ]);
    }

    /**
     * Creates a new CommLierSousDom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CommLierSousDom();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_sous_dom' => $model->id_sous_dom, 'id_comm' => $model->id_comm]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CommLierSousDom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_sous_dom
     * @param integer $id_comm
     * @return mixed
     */
    public function actionUpdate($id_sous_dom, $id_comm)
    {
        $model = $this->findModel($id_sous_dom, $id_comm);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_sous_dom' => $model->id_sous_dom, 'id_comm' => $model->id_comm]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CommLierSousDom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_sous_dom
     * @param integer $id_comm
     * @return mixed
     */
    public function actionDelete($id_sous_dom, $id_comm)
    {
        $this->findModel($id_sous_dom, $id_comm)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CommLierSousDom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_sous_dom
     * @param integer $id_comm
     * @return CommLierSousDom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_sous_dom, $id_comm)
    {
        if (($model = CommLierSousDom::findOne(['id_sous_dom' => $id_sous_dom, 'id_comm' => $id_comm])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
