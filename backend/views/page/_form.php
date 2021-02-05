<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(<<<JS
$('input#page-title').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#page-url').val(NewText);    
});
$('input#page-title_ru').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#page-url_ru').val(NewText);    
});
$('input#page-title_en').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#page-url_en').val(NewText);    
})
JS
    , 3)
?>

<div class="page-form">

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
                    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
                            'preset' => 'full',
                            'inline' => false,
                            'path' => 'some/sub/path'
                        ])
                    ,]) 
                    ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'url_ru')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_title_ru')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description_ru')->textarea(['rows' => '6']) ?>
                    <?= $form->field($model, 'description_ru')->widget(CKEditor::className(), [
                            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
                            'preset' => 'full',
                            'inline' => false,
                            'path' => 'some/sub/path'
                        ])
                    ,]) 
                    ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'url_en')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_title_en')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description_en')->textarea(['rows' => '6']) ?>
                    <?= $form->field($model, 'description_en')->widget(CKEditor::className(), [
                            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
                            'preset' => 'full',
                            'inline' => false,
                            'path' => 'some/sub/path'
                        ])
                    ,]) 
                    ?>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'index')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX
            ]);
        ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX
            ]);
        ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
