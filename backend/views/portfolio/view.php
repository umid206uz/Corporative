<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Portfolio */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portfolios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="portfolio-view container box">

    <br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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
                    return $model->category->title;
                }
            ], 
            'title',
            'title_ru',
            'title_en',
            'url:url',
            'url_ru:url',
            'url_en:url',
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
            'created_date',
            'status',
            'view',
        ],
    ]) ?>

</div>
