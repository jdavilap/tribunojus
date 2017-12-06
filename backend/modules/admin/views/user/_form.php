<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-check-circle"></i> Aceptar ', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
