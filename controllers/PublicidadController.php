<?php

namespace app\controllers;

use Yii;
use app\models\Rpublicidad;
use app\models\RpublicidadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\imagine\Image;
/**
 * PublicidadController implements the CRUD actions for Rpublicidad model.
 */
class PublicidadController extends Controller
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
     * Lists all Rpublicidad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RpublicidadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rpublicidad model.
     * @param integer $ridPublicidad
     * @param integer $rutEmpresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ridPublicidad, $rutEmpresa)
    {
        return $this->render('view', [
            'model' => $this->findModel($ridPublicidad, $rutEmpresa),
        ]);
    }

    /**
     * Creates a new Rpublicidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rpublicidad();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->file = UploadedFile::getInstances($model, 'rfoto');
            ini_set('memory_limit', '512M');
            $num = rand(5, 600);
            foreach ($model->file as $file) {
                        ini_set('memory_limit', '512M');
                        $file->saveAs('img/publicidad/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension);
                        Image::thumbnail('img/publicidad/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension, 200, 187)
                                ->save('img/publicidad/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension, ['quality' => 100]);

                        ini_set('memory_limit', '512M');

                        $ruta = 'img/publicidad/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 120, 120)
                                ->save('img/publicidad/t/' . $model->ridPublicidad . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);
                        $model->rfoto = $model->ridPublicidad . $file->baseName . $num . "." . $file->extension;
                       
                    }
            $model->save(false);
            return $this->redirect(['view', 'ridPublicidad' => $model->ridPublicidad, 'rutEmpresa' => $model->rutEmpresa]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rpublicidad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ridPublicidad
     * @param integer $rutEmpresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ridPublicidad, $rutEmpresa)
    {
        $model = $this->findModel($ridPublicidad, $rutEmpresa);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ridPublicidad' => $model->ridPublicidad, 'rutEmpresa' => $model->rutEmpresa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rpublicidad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ridPublicidad
     * @param integer $rutEmpresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ridPublicidad, $rutEmpresa)
    {
        $this->findModel($ridPublicidad, $rutEmpresa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rpublicidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ridPublicidad
     * @param integer $rutEmpresa
     * @return Rpublicidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ridPublicidad, $rutEmpresa)
    {
        if (($model = Rpublicidad::findOne(['ridPublicidad' => $ridPublicidad, 'rutEmpresa' => $rutEmpresa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
