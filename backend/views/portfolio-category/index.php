<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PortfolioCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Portfolio Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-category-index container box">

    <br>

    <p>
        <?= Html::a(Yii::t('app', 'Create Portfolio Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'title_ru',
            'title_en',
            'url:url',
            //'url_ru:url',
            //'url_en:url',
            //'meta_title',
            //'meta_title_ru',
            //'meta_title_en',
            //'meta_description',
            //'meta_description_ru',
            //'meta_description_en',
            //'filename',
            //'created_date',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
