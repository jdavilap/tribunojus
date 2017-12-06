<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjEscrito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-escrito-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'escrito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notificacion')->checkbox() ?>

    <?= $form->field($model, 'id_expediente')->textInput() ?>

    <?= $form->field($model, 'id_sub_expediente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
