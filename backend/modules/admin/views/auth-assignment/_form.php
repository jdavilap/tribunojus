<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\admin\models\User;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'item_name')->dropDownList(ArrayHelper::map(\backend\modules\admin\models\AuthItem::find()->all(),'name','name'),[
            'prompt'=>'Seleccionar una regla ...',
            //'class'=>'input-sm'
    ])?>

    <?= $form->field($model,'user_id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),[
        'prompt'=>'Seleccionar un usuario ...',
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check-circle"></i> Aceptar' : '<i class="fa fa-edit"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
