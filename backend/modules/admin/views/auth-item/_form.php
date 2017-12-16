<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'smart-form',
            'id' => 'item-form',
            'novalidate' => 'novalidate'
        ]
    ]); ?>

    <fieldset>
        <div class="row">
            <section class="col col-10">
                <label class="input">
                    <?= $form->field($model,'name')->input('text') ?>
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-10">
                <label class="input">
                    <?= $form->field($model,'type')->input('text') ?>
                </label>
            </section>
        </div>
        <div class="row">

            <section class="col col-10">
                <label class="textarea">
                    <?= $form->field($model,'description')->textarea() ?>
                </label>
            </section>
        </div>
    </fieldset>

    <footer>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check"></i> Guardar' : '<i class="fa fa-edit"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <button type="button" class="btn btn-default" onclick="window.history.back();">
            <i class="fa fa-times"></i> Cancelar
        </button>
    </footer>

    <?php ActiveForm::end()?>

</div>
