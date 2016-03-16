<?php

namespace backend\controllers;

use Yii;
use common\models\AppartenirCercle;
use common\models\AppartenirCercleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppartenirCercleController implements the CRUD actions for AppartenirCercle model.
 */
class AppartenirCercleController extends Controller
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
     * Lists all AppartenirCercle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppartenirCercleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppartenirCercle model.
     * @param integer $id_user
     * @param integer $id_cercle
     * @return mixed
     */
    public function actionView($id_user, $id_cercle)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user, $id_cercle),
        ]);
    }

    /**
     * Creates a new AppartenirCercle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AppartenirCercle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_cercle' => $model->id_cercle]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AppartenirCercle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_user
     * @param integer $id_cercle
     * @return mixed
     */
    public function actionUpdate($id_user, $id_cercle)
    {
        $model = $this->findModel($id_user, $id_cercle);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_cercle' => $model->id_cercle]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AppartenirCercle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_user
     * @param integer $id_cercle
     * @return mixed
     */
    public function actionDelete($id_user, $id_cercle)
    {
        $this->findModel($id_user, $id_cercle)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AppartenirCercle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param integer $id_cercle
     * @return AppartenirCercle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $id_cercle)
    {
        if (($model = AppartenirCercle::findOne(['id_user' => $id_user, 'id_cercle' => $id_cercle])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
