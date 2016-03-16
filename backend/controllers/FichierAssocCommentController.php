<?php

namespace backend\controllers;

use Yii;
use common\models\FichierAssocComment;
use common\models\FichierAssocCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FichierAssocCommentController implements the CRUD actions for FichierAssocComment model.
 */
class FichierAssocCommentController extends Controller
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
     * Lists all FichierAssocComment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FichierAssocCommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FichierAssocComment model.
     * @param integer $id_fichier
     * @param integer $id_comment
     * @return mixed
     */
    public function actionView($id_fichier, $id_comment)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_fichier, $id_comment),
        ]);
    }

    /**
     * Creates a new FichierAssocComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FichierAssocComment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fichier' => $model->id_fichier, 'id_comment' => $model->id_comment]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FichierAssocComment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_fichier
     * @param integer $id_comment
     * @return mixed
     */
    public function actionUpdate($id_fichier, $id_comment)
    {
        $model = $this->findModel($id_fichier, $id_comment);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fichier' => $model->id_fichier, 'id_comment' => $model->id_comment]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FichierAssocComment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_fichier
     * @param integer $id_comment
     * @return mixed
     */
    public function actionDelete($id_fichier, $id_comment)
    {
        $this->findModel($id_fichier, $id_comment)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FichierAssocComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_fichier
     * @param integer $id_comment
     * @return FichierAssocComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_fichier, $id_comment)
    {
        if (($model = FichierAssocComment::findOne(['id_fichier' => $id_fichier, 'id_comment' => $id_comment])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
