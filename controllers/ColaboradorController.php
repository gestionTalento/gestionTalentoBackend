<?php

namespace app\controllers;

use Yii;
use app\models\Colaborador;
use app\models\Restadisticas;
use app\models\ColaboradorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Rperfilredsocial;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\imagine\Image;

/**
 * ColaboradorController implements the CRUD actions for Colaborador model.
 */
class ColaboradorController extends Controller
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
     * Lists all Colaborador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColaboradorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Colaborador model.
     * @param integer $rutColaborador
     * @param integer $idSucursal
     * @param integer $idArea
     * @param integer $idCargo
     * @param integer $idRol
     * @param integer $idGerencia
     * @param integer $idperfil
     * @param integer $idperfilRed
     * @param integer $idestadisticas
     * @param integer $idestado
     * @param integer $idCC
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)
    {
        return $this->render('view', [
            'model' => $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC),
        ]);
    }

    /**
     * Creates a new Colaborador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       

        $model = new Colaborador();
        $perfil = new Rperfilredsocial();
        
        if ($perfil->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post()) ) {
          // var_dump($model);die();
            $perfil->file = UploadedFile::getInstances($perfil, 'rfoto');
            $perfil->file2 = UploadedFile::getInstances($perfil, 'rportada');
            ini_set('memory_limit', '512M');
            $num = rand(5, 600);
            $num2 = rand(5,600);
             if (empty($perfil->file)) {
                    $perfil->rfoto = 'nada.png';
                } else {
                    foreach ($perfil->file as $file) {
                        ini_set('memory_limit', '512M');
                        $file->saveAs('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension);
                        Image::thumbnail('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, 200, 187)
                                ->save('img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, ['quality' => 100]);

                        ini_set('memory_limit', '512M');

                        $ruta = 'img/perfil/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension;
                        Image::thumbnail($ruta, 120, 120)
                                ->save('img/perfil/t/' . $model->rutColaborador . $file->baseName . $num . "." . $file->extension, ['quality' => 50]);
                        $perfil->rfoto = $model->rutColaborador . $file->baseName . $num . "." . $file->extension;
                        
                    }
                }
                if (empty($perfil->file2)) {
                    $perfil->rportada = 'ricardo2.jpg';
                } else {
                    foreach ($perfil->file2 as $file2) {
                        ini_set('memory_limit', '512M');
                        $file2->saveAs('img/portada/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension);
                        Image::thumbnail('img/portada/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension, 200, 187)
                                ->save('img/portada/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension, ['quality' => 100]);

                        ini_set('memory_limit', '512M');

                        $ruta = 'img/portada/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension;
                        Image::thumbnail($ruta, 120, 120)
                                ->save('img/portada/t/' . $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension, ['quality' => 50]);
                        $perfil->rportada = $model->rutColaborador . $file2->baseName . $num2 . "." . $file2->extension;
                        
                    }
                }
                     
                     $perfil->idperfilRed = $model->idperfilRed;
                     $perfil->save(false);
                     //var_dump($perfil->idperfilRed);die();
                     $model->idperfilRed = $perfil->idperfilRed;
                     
                     $estadisticas = new Restadisticas();
                     $estadisticas->idestadisticas = $model->idestadisticas;
                     $estadisticas->rlikes = 0;
                     $estadisticas->rcomentarios = 0;
                     $estadisticas->rlikesr = 0;
                     $estadisticas->rcomentariosr = 0;
                     
                     $estadisticas->save(false);
                     $model->idestadisticas = $estadisticas->idestadisticas;
                     $model->save(false);
                
                     
                     //var_dump($model);die();
                        
                     return $this->render('view',[
                        'model' =>$model,
                        'perfil' =>  $perfil,]);
                 
          
        }
        

        return $this->render('create', [
            'model' => $model,
            'perfil' =>$perfil,
        ]);
    }

    /**
     * Updates an existing Colaborador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $rutColaborador
     * @param integer $idSucursal
     * @param integer $idArea
     * @param integer $idCargo
     * @param integer $idRol
     * @param integer $idGerencia
     * @param integer $idperfil
     * @param integer $idperfilRed
     * @param integer $idestadisticas
     * @param integer $idestado
     * @param integer $idCC
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)
    {
        $model = $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC);
        $perfil = $this->findPerfil($idperfilRed);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rutColaborador' => $model->rutColaborador, 'idSucursal' => $model->idSucursal, 'idArea' => $model->idArea, 'idCargo' => $model->idCargo, 'idRol' => $model->idRol, 'idGerencia' => $model->idGerencia, 'idperfil' => $model->idperfil, 'idperfilRed' => $perfil->idperfilRed, 'idestadisticas' => $model->idestadisticas, 'idestado' => $model->idestado, 'idCC' => $model->idCC]);
        }

        return $this->render('update', [
            'perfil' =>$perfil,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Colaborador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $rutColaborador
     * @param integer $idSucursal
     * @param integer $idArea
     * @param integer $idCargo
     * @param integer $idRol
     * @param integer $idGerencia
     * @param integer $idperfil
     * @param integer $idperfilRed
     * @param integer $idestadisticas
     * @param integer $idestado
     * @param integer $idCC
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)
    {
        $this->findModel($rutColaborador, $idSucursal, $idArea, $idCargo, $idRol, $idGerencia, $idperfil, $idperfilRed, $idestadisticas, $idestado, $idCC)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Colaborador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $rutColaborador
     * @param integer $idSucursal
     * @param integer $idArea
     * @param integer $idCargo
     * @param integer $idRol
     * @param integer $idGerencia
     * @param integer $idperfil
     * @param integer $idperfilRed
     * @param integer $idestadisticas
     * @param integer $idestado
     * @param integer $idCC
     * @return Colaborador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($rutColaborador)
    {
        if (($model = Colaborador::findOne(['rutColaborador' => $rutColaborador])) !== null){
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findPerfil($id) {
        if (($model = Rperfilredsocial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
