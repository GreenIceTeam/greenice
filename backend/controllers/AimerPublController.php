<?php

namespace backend\controllers;

use Yii;
use common\models\AimerPubl;
use common\models\AimerPublSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AimerPublController implements the CRUD actions for AimerPubl model.
 */
class AimerPublController extends Controller
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
     * Lists all AimerPubl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AimerPublSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AimerPubl model.
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
     * Creates a new AimerPubl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AimerPubl();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_publ' => $model->id_publ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AimerPubl model.
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
     * Deletes an existing AimerPubl model.
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
     * Finds the AimerPubl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param integer $id_publ
     * @return AimerPubl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $id_publ)
    {
        if (($model = AimerPubl::findOne(['id_user' => $id_user, 'id_publ' => $id_publ])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
