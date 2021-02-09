<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use kartik\switchinput\SwitchInput;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\PortfolioCategory */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(<<<JS
$('input#portfoliocategory-title').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#portfoliocategory-url').val(NewText);    
});
$('input#portfoliocategory-title_ru').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#portfoliocategory-url_ru').val(NewText);    
});
$('input#portfoliocategory-title_en').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#portfoliocategory-url_en').val(NewText);    
})
JS
    , 3)
?>

<div class="portfolio-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">узбекиский</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">русский</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">английский</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description')->textarea(['rows' => '6']) ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'url_ru')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_title_ru')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description_ru')->textarea(['rows' => '6']) ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'url_en')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_title_en')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description_en')->textarea(['rows' => '6']) ?>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
    </div>
    
    <?php if(empty($model->filename)):?>
    <?= $form->field($model, 'picture')->widget(FileInput::classname(), 
        [
            'options' => ['accept' => 'image/*'],
        ]); 
        echo Html::error($model, 'picture', ['class' => 'error']);
    ?>
    <?php else:?>
        <?= $form->field($model, 'picture')->widget(FileInput::classname(), 
        [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'initialPreview'=>[
                    "/backend/web/uploads/portfolio-category/". $model->filename,
                ],
                'showRemove' => false,
                'initialPreviewAsData'=>true,
                'initialCaption'=> $model->filename,
                'initialPreviewConfig' => [
                    ['caption' => 'Moon.jpg', 'size' => '973727'],
                ],
                'overwriteInitial'=>false,
                'maxFileSize'=>2800
            ]
        ]); 
        echo Html::error($model, 'picture', ['class' => 'error']);
    ?>
    <?php endif?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
