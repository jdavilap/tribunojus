<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjAnexo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-anexo-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'class' => 'smart-form',
            //'id' => 'expediente-form',
            //'novalidate' => 'novalidate',
            //'enableClientValidation' => false
        ]
    ]); ?>
    <fieldset>
        <div class="row">
            <section class="col col-10">
                <label class="fileInput">
                    <?= $form->field($model, 'file')->fileInput() ?>
                </label>
            </section>
            <section class="col col-10">
                <label class="textarea">
                    <?= $form->field($model, 'observacion')->textarea() ?>
                </label>
            </section>
        </div>

    </fieldset>
    <footer>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check"></i> Guardar' : '<i class="fa fa-edit"></i>Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <button type="button" class="btn btn-default" onclick="window.history.back();">
           <i class="fa fa-times"></i> Cancelar
        </button>
    </footer>
    <?php ActiveForm::end() ?>
</div>
