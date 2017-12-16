<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\admin\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

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
                <?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(AuthItem::find()->all(),'name','name'),[
                    'prompt'=>'Seleccione la 1ra regla ...',
                    'class'=>'select2',
                    'style'=> 'whith: 100%',
                ]) ?>
            </section>
            <section class="col col-10">
                <?= $form->field($model, 'child')->dropDownList(ArrayHelper::map(AuthItem::find()->all(),'name','name'),[
                    'prompt'=>'Seleccione la 2da regla ...',
                    'class'=>'select2',
                    'style'=> 'whith: 100%',
                ]) ?>
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
