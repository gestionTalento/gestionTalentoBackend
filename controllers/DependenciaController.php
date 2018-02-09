<?php

namespace app\controllers;

use Yii;
use app\models\Dependencia;
use app\models\DependenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DependenciaController implements the CRUD actions for Dependencia model.
 */
class DependenciaController extends Controller
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
     * Lists all Dependencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DependenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dependencia model.
     * @param integer $idDependencias
     * @param integer $rutColaborador1
     * @param integer $rutColaborador2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idDependencias, $rutColaborador1, $rutColaborador2)
    {
        return $this->render('view', [
            'model' => $this->findModel($idDependencias, $rutColaborador1, $rutColaborador2),
        ]);
    }

    /**
     * Creates a new Dependencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dependencia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idDependencias' => $model->idDependencias, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dependencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idDependencias
     * @param integer $rutColaborador1
     * @param integer $rutColaborador2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idDependencias, $rutColaborador1, $rutColaborador2)
    {
        $model = $this->findModel($idDependencias, $rutColaborador1, $rutColaborador2);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idDependencias' => $model->idDependencias, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dependencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idDependencias
     * @param integer $rutColaborador1
     * @param integer $rutColaborador2
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idDependencias, $rutColaborador1, $rutColaborador2)
    {
        $this->findModel($idDependencias, $rutColaborador1, $rutColaborador2)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dependencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idDependencias
     * @param integer $rutColaborador1
     * @param integer $rutColaborador2
     * @return Dependencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idDependencias, $rutColaborador1, $rutColaborador2)
    {
        if (($model = Dependencia::findOne(['idDependencias' => $idDependencias, 'rutColaborador1' => $rutColaborador1, 'rutColaborador2' => $rutColaborador2])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
