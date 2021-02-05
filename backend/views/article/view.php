<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view container box">

    <br>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалитъ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'meta_title',
            'meta_title_ru',
            'meta_title_en',
            'meta_description',
            'meta_description_ru',
            'meta_description_en',
            'description:ntext',
            'description_ru:ntext',
            'description_en:ntext',
            'filename',
            [
                'attribute' => 'created_date',
                'format' => 'html',
                'value' => function ($model) {
                    return date("Y-m-d H:i:s", $model->created_date);
                }
            ], 
            'status',
            'view',
        ],
    ]) ?>

</div>
