<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = Yii::t('app', 'Create Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create container box">

    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
