<?php

namespace backend\models;

use Yii;
use common\models\AimerComment;
use common\models\AimerCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AimerCommentController implements the CRUD actions for AimerComment model.
 */
class AimerCommentController extends Controller
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
     * Lists all AimerComment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AimerCommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AimerComment model.
     * @param integer $id_user
     * @param integer $id_comment
     * @return mixed
     */
    public function actionView($id_user, $id_comment)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user, $id_comment),
        ]);
    }

    /**
     * Creates a new AimerComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AimerComment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_comment' => $model->id_comment]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AimerComment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_user
     * @param integer $id_comment
     * @return mixed
     */
    public function actionUpdate($id_user, $id_comment)
    {
        $model = $this->findModel($id_user, $id_comment);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_comment' => $model->id_comment]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AimerComment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_user
     * @param integer $id_comment
     * @return mixed
     */
    public function actionDelete($id_user, $id_comment)
    {
        $this->findModel($id_user, $id_comment)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AimerComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param integer $id_comment
     * @return AimerComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $id_comment)
    {
        if (($model = AimerComment::findOne(['id_user' => $id_user, 'id_comment' => $id_comment])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
