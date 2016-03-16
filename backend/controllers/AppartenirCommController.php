<?php

namespace backend\controllers;

use Yii;
use common\models\AppartenirComm;
use common\models\AppartenirCommSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppartenirCommController implements the CRUD actions for AppartenirComm model.
 */
class AppartenirCommController extends Controller
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
        ];
    }

    /**
     * Lists all AppartenirComm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppartenirCommSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppartenirComm model.
     * @param integer $id_user
     * @param integer $id_comm
     * @return mixed
     */
    public function actionView($id_user, $id_comm)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user, $id_comm),
        ]);
    }

    /**
     * Creates a new AppartenirComm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AppartenirComm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_comm' => $model->id_comm]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AppartenirComm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_user
     * @param integer $id_comm
     * @return mixed
     */
    public function actionUpdate($id_user, $id_comm)
    {
        $model = $this->findModel($id_user, $id_comm);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_comm' => $model->id_comm]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AppartenirComm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_user
     * @param integer $id_comm
     * @return mixed
     */
    public function actionDelete($id_user, $id_comm)
    {
        $this->findModel($id_user, $id_comm)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AppartenirComm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param integer $id_comm
     * @return AppartenirComm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $id_comm)
    {
        if (($model = AppartenirComm::findOne(['id_user' => $id_user, 'id_comm' => $id_comm])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
