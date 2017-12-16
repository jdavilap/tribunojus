<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\litigante\models\PjExpediente;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjSubExpediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-sub-expediente-form">

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
                <?= $form->field($model, 'id_expediente')->dropDownList(ArrayHelper::map(PjExpediente::find()->all(),'id','n_expendiente'),[
                    'class'=>'select2',
                    'style'=> 'whith: 100%',
                    'prompt'=> 'SELECCIONE UN EXPEDIENTE...',
                    'id'=> 'subexpediente',
                ]) ?>
            </section>
            <section class="col col-10">
                <label class="input">
                    <?= $form->field($model, 'sub_expediente')->textInput(['maxlength' => true]) ?>
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

    <?php ActiveForm::end() ?>

</div>
