<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjExpediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-expediente-form">

    <?php $form = ActiveForm::begin([]); ?>

    <div class="col col-lg-6">
        <?= $form->field($model, 'n_expendiente')->textInput(['maxlength' => true,]) ?>

        <?= $form->field($model, 'juez')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'fecha_inicio')->textInput([
            'class' => 'form-control datepicker',
            'onclick'=>'false'
        ]) ?>

        <?= $form->field($model, 'observacion')->textarea(['maxlength' => true]) ?>

        <?= $form->field($model, 'materia')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'etapa_procesal')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col col-lg-6">

        <?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sumilla')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'distrito_judicial')->dropDownList(['LIMA NORTE','LIMA CENTRO'],[
            'class'=>'select2',
            'style'=> 'whith: 100%',
            'prompt'=> '...'
        ]) ?>

        <?= $form->field($model, 'proceso')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'especialidad')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-check-circle"></i> Aceptar ', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>

