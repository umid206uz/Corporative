<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-view container box">

    <br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'title_ru',
            'title_en',
            'addres',
            'addres_ru',
            'addres_en',
            'copyright',
            'copyright_ru',
            'mail',
            'facebook',
            'instagram',
            'telegram',
            'youtube',
            'description:ntext',
            'description_ru:ntext',
            'description_en:ntext',
            'logo',
            'logo_bottom',
            'favicon',
            'open_graph_photo',
        ],
    ]) ?>

</div>
