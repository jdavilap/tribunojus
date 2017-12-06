<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjExpedienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-expediente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'n_expendiente') ?>

    <?= $form->field($model, 'juez') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?= $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'materia') ?>

    <?php // echo $form->field($model, 'etapa_procesal') ?>

    <?php // echo $form->field($model, 'ubicacion') ?>

    <?php // echo $form->field($model, 'sumilla') ?>

    <?php // echo $form->field($model, 'distrito_judicial') ?>

    <?php // echo $form->field($model, 'proceso') ?>

    <?php // echo $form->field($model, 'especialidad') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'fecha_conclusion') ?>

    <?php // echo $form->field($model, 'motivo_conclusion') ?>

    <?php // echo $form->field($model, 'id_cliente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
