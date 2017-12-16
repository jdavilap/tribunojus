<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\admin\models\User;
use backend\modules\admin\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

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
                <?= $form->field($model, 'item_name')->dropDownList(ArrayHelper::map(AuthItem::find()->all(),'name','name'),[
                    'prompt'=>'Seleccione la regla ...',
                    'class'=>'select2',
                    'style'=> 'whith: 100%',
                ]) ?>
            </section>
            <section class="col col-10">
                <?= $form->field($model,'user_id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),[
                    'prompt'=>'Seleccione el usuario ...',
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
