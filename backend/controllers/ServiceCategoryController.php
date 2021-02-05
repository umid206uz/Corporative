<?php

namespace backend\controllers;

use Yii;
use common\models\ServiceCategory;
use common\models\ServiceCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ServiceCategoryController implements the CRUD actions for ServiceCategory model.
 */
class ServiceCategoryController extends Controller
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
     * Lists all ServiceCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceCategory model.
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
     * Creates a new ServiceCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        date_default_timezone_set("Asia/Tashkent");

        $model = new ServiceCategory();

        if ($model->load(Yii::$app->request->post())) {

                $model->picture = UploadedFile::getInstance($model, 'picture');

            if($model->picture){

                $model->filename = (microtime(true) * 10000).".". $model->picture->extension;
                $model->picture->saveAS("uploads/service-category/". $model->filename);
                $model->created_date = time();

                if($model->save(false))
                {
                    \Yii::$app->getSession()->setFlash('success', "Категория была успешно добавлена!");
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                \Yii::$app->getSession()->setFlash('danger', "Пожалуйста, загрузите картинку!");

                $model->addError('picture', "Пожалуйста, загрузите картинку!");

                return $this->render('create', ['model' => $model]);
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing ServiceCategory model.
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

            $picture = UploadedFile::getInstance($model, 'picture');

            if($picture){
                
                $rasmModel = ServiceCategory::findOne($id);
                unlink("uploads/service-category/".$rasmModel->filename);
                
                $model->filename = (microtime(true) * 10000).".". $picture->extension;
                
                $picture->saveAS("uploads/service-category/". $model->filename);
            }  
            $model->created_date = time();
            $model->save(false);

            \Yii::$app->getSession()->setFlash('success', "Категория была успешно изменена!");
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServiceCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = ServiceCategory::findOne($id);

        $this->findModel($id)->delete();

        if(file_exists("uploads/service-category/".$model->filename)){
            unlink("uploads/service-category/".$model->filename);
        }

        \Yii::$app->getSession()->setFlash('danger', "Удалено!");

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiceCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
