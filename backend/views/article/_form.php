<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use common\models\ArticleCategory;
use mihaildev\ckeditor\CKEditor;
use kartik\switchinput\SwitchInput;
use kartik\select2\Select2;
use mihaildev\elfinder\ElFinder;
/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
$category = ArticleCategory::find()->all();
foreach ($category as $c) {
    $data[$c->id] = $c->title;
}
$this->registerJs(<<<JS
$('input#article-title').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#article-url').val(NewText);    
});
$('input#article-title_ru').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#article-url_ru').val(NewText);    
});
$('input#article-title_en').keyup(function(){
        var Text = $(this).val();
        NewText = makeSlug(Text);
    $('input#article-url_en').val(NewText);    
})
JS
    , 3)
?>

<div class="article-form">

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
                            "/backend/web/uploads/article/". $model->filename,
                        ],
                        'showRemove' => false,
                        'initialPreviewAsData'=>true,
                        'initialCaption'=> $model->filename,
                        'overwriteInitial'=>false,
                        'maxFileSize'=>2800
                    ]
                ]); 
                echo Html::error($model, 'picture', ['class' => 'error']);
            ?>
        <?php endif;?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                    'data' => $data,
                    'language' => 'de',
                    'options' => ['placeholder' => 'Select a category ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>
            <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
                'type' => SwitchInput::CHECKBOX
                ]);
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
