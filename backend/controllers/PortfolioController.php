<?php

namespace backend\controllers;

use Yii;
use common\models\Portfolio;
use common\models\PortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
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
     * Lists all Portfolio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortfolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Portfolio model.
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
     * Creates a new Portfolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        date_default_timezone_set("Asia/Tashkent");

        $model = new Portfolio();

        if ($model->load(Yii::$app->request->post())) {

                $model->picture = UploadedFile::getInstance($model, 'picture');

            if($model->picture){

                $model->filename = (microtime(true) * 10000).".". $model->picture->extension;
                $model->picture->saveAS("uploads/portfolio/". $model->filename);
                $model->created_date = time();

                if($model->save(false))
                {
                    \Yii::$app->getSession()->setFlash('success', "Портфолио была успешно добавлена!");
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
     * Updates an existing Portfolio model.
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
                
                $rasmModel = Portfolio::findOne($id);
                unlink("uploads/portfolio/".$rasmModel->filename);
                
                $model->filename = (microtime(true) * 10000).".". $picture->extension;
                
                $picture->saveAS("uploads/portfolio/". $model->filename);
            }  
            $model->created_date = time();
            $model->save(false);

            \Yii::$app->getSession()->setFlash('success', "Портфолио была успешно изменена!");
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Portfolio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Portfolio::findOne($id);

        $this->findModel($id)->delete();

        if(file_exists("uploads/portfolio/".$model->filename)){
            unlink("uploads/portfolio/".$model->filename);
        }

        \Yii::$app->getSession()->setFlash('danger', "Удалено!");

        return $this->redirect(['index']);
    }

    /**
     * Finds the Portfolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
