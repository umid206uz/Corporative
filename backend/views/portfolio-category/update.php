<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PortfolioCategory */

$this->title = Yii::t('app', 'Update Portfolio Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portfolio Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="portfolio-category-update container box">

    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
