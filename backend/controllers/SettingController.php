<?php

namespace backend\controllers;

use Yii;
use common\models\Setting;
use common\models\SettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SettingController implements the CRUD actions for Setting model.
 */
class SettingController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Setting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Setting model.
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
     * Creates a new Setting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Setting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Setting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        date_default_timezone_set("Asia/Tashkent");
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {

            $logo1 = UploadedFile::getInstance($model, 'logo1');
            $logo_bottom1 = UploadedFile::getInstance($model, 'logo_bottom1');
            $favicon1 = UploadedFile::getInstance($model, 'favicon1');
            $open_graph_photo1 = UploadedFile::getInstance($model, 'open_graph_photo1');

            if($logo1){
                
                $rasmModel = Setting::findOne($id);
                unlink("uploads/".$rasmModel->logo);
                
                $model->logo = (microtime(true) * 10000).".". $logo1->extension;
                
                $logo1->saveAS("uploads/". $model->logo);
            }  
            if($logo_bottom1){
                
                $rasmModel = Setting::findOne($id);
                unlink("uploads/".$rasmModel->logo_bottom);
                
                $model->logo_bottom = (microtime(true) * 10000).".". $logo_bottom1->extension;
                
                $logo_bottom1->saveAS("uploads/". $model->logo_bottom);
            } 
            if($favicon1){
                
                $rasmModel = Setting::findOne($id);
                unlink("uploads/".$rasmModel->favicon);
                
                $model->favicon = (microtime(true) * 10000).".". $favicon1->extension;
                
                $favicon1->saveAS("uploads/". $model->favicon);
            } 
            if($open_graph_photo1){
                
                $rasmModel = Setting::findOne($id);
                unlink("uploads/".$rasmModel->open_graph_photo);
                
                $model->open_graph_photo = (microtime(true) * 10000).".". $open_graph_photo1->extension;
                
                $open_graph_photo1->saveAS("uploads/". $model->open_graph_photo);
            } 
            $model->save(false);

            \Yii::$app->getSession()->setFlash('success', "успешно изменена!");
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Setting model.
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
     * Finds the Setting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Setting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
