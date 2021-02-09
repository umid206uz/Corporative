<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Portfolios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-index container box">

    <br>

    <p>
        <?= Html::a(Yii::t('app', 'Create Portfolio'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
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
                    return $model->category->title;
                }
            ], 
            'title',
            'title_ru',
            'title_en',
            //'url:url',
            //'url_ru:url',
            //'url_en:url',
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

    <?php Pjax::end(); ?>

</div>
