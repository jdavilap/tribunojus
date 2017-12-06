<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\PjAbogado */

$this->title = 'ACTUALIZAR: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'ABOGADOS', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id, 'username' => $model->username]];
$this->params['breadcrumbs'][] = 'ACTUALIZAR';
?>
<div class="pj-abogado-update">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="well">
            <!-- row -->
            <div class="row">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0"
                         data-widget-editbutton="false">
                        <!-- widget options:
                            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                            data-widget-colorbutton="false"
                            data-widget-editbutton="false"
                            data-widget-togglebutton="false"
                            data-widget-deletebutton="false"
                            data-widget-fullscreenbutton="false"
                            data-widget-custombutton="false"
                            data-widget-collapsed="true"
                            data-widget-sortable="false"

                        -->
                        <header>
                            <span class="widget-icon"> <i class="fa fa-cogs"></i> </span>

                            <h2><?= Html::encode($this->title) ?></h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <?php $form = ActiveForm::begin(); ?>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model_sign, 'first_name')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model_sign, 'last_name')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model_sign, 'dni')->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <?= $form->field($model_sign, 'domicilio')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model_sign, 'password_hash')->passwordInput(['maxlength' => true,'disabled'=> 'disabled']) ?>

                                <?= $form->field($model_sign, 'email')->textInput(['maxlength' => true]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('<i class="fa fa-check-circle"></i> Aceptar ', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                                </div>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                        <!-- end widget div -->
                    </div>
                    <!-- end widget -->

                </article>
                <!-- WIDGET END -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
