<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index container box">

    <br>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Категория статьи', ['article-category/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'category_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->categoryTitle;
                }
            ], 
            'title',
            'title_ru',
            'title_en',
            //'meta_title',
            //'meta_title_ru',
            //'meta_title_en',
            //'meta_description',
            //'meta_description_ru',
            //'meta_description_en',
            //'description:ntext',
            //'description_ru:ntext',
            //'description_en:ntext',
            //'filename',
            //'created_date',
            //'status',
            //'view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
