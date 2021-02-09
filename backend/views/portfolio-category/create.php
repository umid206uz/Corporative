<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PortfolioCategory */

$this->title = Yii::t('app', 'Create Portfolio Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portfolio Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-category-create container box">

    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
