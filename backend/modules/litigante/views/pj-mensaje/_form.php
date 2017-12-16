<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\admin\models\PjAbogado;
use backend\modules\admin\models\User;
use backend\modules\litigante\models\PjLitigante;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjMensaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pj-mensaje-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'smart-form',
        ]
    ]); ?>

    <fieldset>
        <div class="row">
            <?php if(PjAbogado::findOne(['username'=> Yii::$app->user->identity->username])): ?>
            <section class="col col-10">
                <label class="input">
                    <?= $form->field($model, 'id_litigante')->dropDownList(ArrayHelper::map(PjLitigante::find()->where(['id_abogado'=> PjAbogado::findOne(['username'=> Yii::$app->user->identity->username])->id])->all(),'id','username'),[
                        'class'=> 'select2',
                    ]) ?>
                </label>
            </section>
            <?php endif; ?>
            <section class="col col-10">
                <label class="input">
                    <?= $form->field($model, 'asunto')->textInput(['maxlength' => true]) ?>
                </label>
            </section>
            <section class="col col-10">
                <label class="textarea">
                    <?= $form->field($model, 'contenido')->textarea([
                        'rows'=> 10
                    ])?>
                </label>
            </section>
        </div>
    </fieldset>
    <footer>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-send"></i> Enviar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            <button type="button" class="btn btn-default" onclick="window.history.back();">
                <i class="fa fa-times"></i> Cancelar
            </button>
        </div>
    </footer>
    <?php ActiveForm::end(); ?>

</div>
