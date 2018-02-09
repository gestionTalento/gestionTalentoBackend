<?php

namespace app\controllers;

use Yii;
use app\models\Rperfilredsocial;
use app\models\PerfilRedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfilRedController implements the CRUD actions for Rperfilredsocial model.
 */
class PerfilRedController extends Controller
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
     * Lists all Rperfilredsocial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerfilRedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rperfilredsocial model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rperfilredsocial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rperfilredsocial();

        if ($model->load(Yii::$app->request->post() )) {
          // var_dump($model);die();
            $model->file = UploadedFile::getInstances($model, 'rfoto');
            $model->file2 = UploadedFile::getInstances($model, 'rportada');
            ini_set('memory_limit', '512M');
            $num = rand(5, 600);
            $num2 = rand(5,600);
             if (empty($model->file)) {
                    $model->rfoto = 'nada.png';
                } else {
                    foreach ($model->file as $file) {
                        ini_set('memory_limit', '512M');
                        $file->saveAs('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension);
                        Image::thumbnail('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, 200, 187)
                                ->save('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, ['quality' => 100]);

                        ini_set('memory_limit', '512M');

                        $ruta = 'img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 120, 120)
                                ->save('img/perfil/t/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);
                        $model->rfoto = $model->rutColaborador . $file->baseName . $num . "." . $file->extension;
                        
                    }
                }
                if (empty($model->file2)) {
                    $model->rportada = 'ricardo2.jpg';
                } else {
                    foreach ($model->file2 as $file2) {
                        ini_set('memory_limit', '512M');
                        $file2->saveAs('img/portada/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension);
                        Image::thumbnail('img/portada/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension, 200, 187)
                                ->save('img/portada/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension, ['quality' => 100]);

                        ini_set('memory_limit', '512M');

                        $ruta = 'img/portada/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension;
                        Image::thumbnail($ruta, 120, 120)
                                ->save('img/portada/t/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension, ['quality' => 50]);
                        $model->rportada = $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension;
                        
                    }
                }
                $model->save(false);
                return $this->render('view',[
                        'model' =>  $model,]);
                 
          
                 }
                     
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rperfilredsocial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idperfilRed]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rperfilredsocial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rperfilredsocial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rperfilredsocial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Rperfilredsocial::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
