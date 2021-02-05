<?php

namespace backend\controllers;

use Yii;
use common\models\ArticleCategory;
use common\models\ArticleCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 */
class ArticleCategoryController extends Controller
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
     * Lists all ArticleCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleCategory model.
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
     * Creates a new ArticleCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        date_default_timezone_set("Asia/Tashkent");

        $model = new ArticleCategory();

        if ($model->load(Yii::$app->request->post())) {

                $model->picture = UploadedFile::getInstance($model, 'picture');

            if($model->picture){

                $model->filename = (microtime(true) * 10000).".". $model->picture->extension;
                $model->picture->saveAS("uploads/article-category/". $model->filename);
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
     * Updates an existing ArticleCategory model.
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
                
                $rasmModel = ArticleCategory::findOne($id);
                unlink("uploads/article-category/".$rasmModel->filename);
                
                $model->filename = (microtime(true) * 10000).".". $picture->extension;
                
                $picture->saveAS("uploads/article-category/". $model->filename);
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
     * Deletes an existing ArticleCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = ArticleCategory::findOne($id);

        $this->findModel($id)->delete();

        if(file_exists("uploads/article-category/".$model->filename)){
            unlink("uploads/article-category/".$model->filename);
        }

        \Yii::$app->getSession()->setFlash('danger', "Удалено!");

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
