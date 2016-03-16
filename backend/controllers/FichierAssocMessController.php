<?php

namespace backend\controllers;

use Yii;
use common\models\FichierAssocMess;
use common\models\FichierAssocMessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FichierAssocMessController implements the CRUD actions for FichierAssocMess model.
 */
class FichierAssocMessController extends Controller
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
     * Lists all FichierAssocMess models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FichierAssocMessSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FichierAssocMess model.
     * @param integer $id_fichier
     * @param integer $id_mess
     * @return mixed
     */
    public function actionView($id_fichier, $id_mess)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_fichier, $id_mess),
        ]);
    }

    /**
     * Creates a new FichierAssocMess model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FichierAssocMess();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fichier' => $model->id_fichier, 'id_mess' => $model->id_mess]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FichierAssocMess model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_fichier
     * @param integer $id_mess
     * @return mixed
     */
    public function actionUpdate($id_fichier, $id_mess)
    {
        $model = $this->findModel($id_fichier, $id_mess);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fichier' => $model->id_fichier, 'id_mess' => $model->id_mess]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FichierAssocMess model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_fichier
     * @param integer $id_mess
     * @return mixed
     */
    public function actionDelete($id_fichier, $id_mess)
    {
        $this->findModel($id_fichier, $id_mess)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FichierAssocMess model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_fichier
     * @param integer $id_mess
     * @return FichierAssocMess the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_fichier, $id_mess)
    {
        if (($model = FichierAssocMess::findOne(['id_fichier' => $id_fichier, 'id_mess' => $id_mess])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
