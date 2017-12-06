<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjLitigante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-litigante-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <?= $form->field($model_sign, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model_sign, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model_sign, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model_sign, 'dni')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <?= $form->field($model_sign, 'domicilio')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model_sign, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model_sign, 'email')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
