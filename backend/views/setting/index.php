<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index container box">

    <br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'title_ru',
            'title_en',
            'addres',
            //'addres_ru',
            //'addres_en',
            //'copyright',
            //'copyright_ru',
            //'mail',
            //'facebook',
            //'instagram',
            //'telegram',
            //'youtube',
            //'description:ntext',
            //'description_ru:ntext',
            //'description_en:ntext',
            //'logo',
            //'logo_bottom',
            //'favicon',
            //'open_graph_photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
