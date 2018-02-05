<?php

namespace app\controllers;

use Yii;
use app\models\Ramigos;
use app\models\RActividadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AmigosController implements the CRUD actions for Ramigos model.
 */
class AmigosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ramigos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RActividadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ramigos model.
     * @param integer $rIdAmigos
     * @param integer $rut1
     * @param integer $rut2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rIdAmigos, $rut1, $rut2)
    {
        return $this->render('view', [
            'model' => $this->findModel($rIdAmigos, $rut1, $rut2),
        ]);
    }

    /**
     * Creates a new Ramigos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ramigos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rIdAmigos' => $model->rIdAmigos, 'rut1' => $model->rut1, 'rut2' => $model->rut2]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ramigos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $rIdAmigos
     * @param integer $rut1
     * @param integer $rut2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rIdAmigos, $rut1, $rut2)
    {
        $model = $this->findModel($rIdAmigos, $rut1, $rut2);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rIdAmigos' => $model->rIdAmigos, 'rut1' => $model->rut1, 'rut2' => $model->rut2]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ramigos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $rIdAmigos
     * @param integer $rut1
     * @param integer $rut2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rIdAmigos, $rut1, $rut2)
    {
        $this->findModel($rIdAmigos, $rut1, $rut2)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ramigos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $rIdAmigos
     * @param integer $rut1
     * @param integer $rut2
     * @return Ramigos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rIdAmigos, $rut1, $rut2)
    {
        if (($model = Ramigos::findOne(['rIdAmigos' => $rIdAmigos, 'rut1' => $rut1, 'rut2' => $rut2])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
