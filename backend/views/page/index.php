<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index container box">

    <br>

    <p>
        <?= Html::a(Yii::t('app', 'Создать меню'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'title_ru',
            'url:url',
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
            //'status',
            //'index',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
