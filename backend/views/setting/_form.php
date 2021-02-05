<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;
use mihaildev\ckeditor\CKEditor;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-7">
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
                        <?= $form->field($model, 'addres')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'copyright')->textInput(['maxlength' => true]) ?>
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
                        <?= $form->field($model, 'addres_ru')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'copyright_ru')->textInput(['maxlength' => true]) ?>
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
                        <?= $form->field($model, 'addres_en')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'copyright_en')->textInput(['maxlength' => true]) ?>
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
        <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'logo1')->widget(FileInput::classname(), 
                [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'initialPreview'=>[
                            "/backend/web/uploads/". $model->logo,
                        ],
                        'showRemove' => false,
                        'initialPreviewAsData'=>true,
                        'initialCaption'=> $model->logo,
                        'overwriteInitial'=>false,
                        'maxFileSize'=>2800
                    ]
                ]);  ?>

            <?= $form->field($model, 'logo_bottom1')->widget(FileInput::classname(), 
                [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'initialPreview'=>[
                            "/backend/web/uploads/". $model->logo_bottom,
                        ],
                        'showRemove' => false,
                        'initialPreviewAsData'=>true,
                        'initialCaption'=> $model->logo_bottom,
                        'overwriteInitial'=>false,
                        'maxFileSize'=>2800
                    ]
                ]);  ?>

            <?= $form->field($model, 'favicon1')->widget(FileInput::classname(), 
                [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'initialPreview'=>[
                            "/backend/web/uploads/". $model->favicon,
                        ],
                        'showRemove' => false,
                        'initialPreviewAsData'=>true,
                        'initialCaption'=> $model->favicon,
                        'overwriteInitial'=>false,
                        'maxFileSize'=>2800
                    ]
                ]);  ?>

            <?= $form->field($model, 'open_graph_photo1')->widget(FileInput::classname(), 
                [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'initialPreview'=>[
                            "/backend/web/uploads/". $model->open_graph_photo,
                        ],
                        'showRemove' => false,
                        'initialPreviewAsData'=>true,
                        'initialCaption'=> $model->open_graph_photo,
                        'overwriteInitial'=>false,
                        'maxFileSize'=>2800
                    ]
                ]);  ?>
        </div>
    </div>
    

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
