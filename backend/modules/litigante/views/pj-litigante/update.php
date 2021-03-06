<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjLitigante */

$this->title = 'Actualizar Litigante: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Litigante', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id, 'username' => $model->username]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="pj-litigante-update">
    <!-- START ROW -->
    <div class="row">
        <!-- NEW COL START -->
        <article class="col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-blueDark">
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
                    <span class="widget-icon"> <i class="fa fa-user"></i> </span>

                    <h2><?= Html::encode($this->title) ?></h2>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <?php $form = ActiveForm::begin([
                            'options' => [
                                'class' => 'smart-form',
                                'id' => 'abogado-form',
                                'novalidate' => 'novalidate'
                            ]
                        ]); ?>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input">
                                        <?= $form->field($model_sign,'first_name')->textInput() ?>
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input">
                                        <?= $form->field($model_sign,'last_name')->textInput() ?>
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input">
                                        <?= $form->field($model_sign,'dni')->textInput() ?>
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input">
                                        <?= $form->field($model_sign,'domicilio')->textInput() ?>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input">
                                        <?= $form->field($model_sign,'username')->textInput() ?>
                                    </label>
                                </section>

                                <section class="col col-6">
                                    <label class="input">
                                        <?= $form->field($model_sign,'email')->textInput() ?>
                                    </label>
                                </section>

                                <section class="col col-6">
                                    <label class="input">
                                        <?= $form->field($model_sign,'password_hash')->passwordInput([
                                            'disabled'=>'disabled'
                                        ]) ?>
                                    </label>
                                </section>
                            </div>
                        </fieldset>

                        <footer>
                            <?= Html::submitButton('<i class="fa fa-edit"></i> Actualizar ', ['class' => 'btn btn-info', 'name' => 'signup-button']) ?>
                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                <i class="fa fa-times"></i> Cancelar
                            </button>
                        </footer>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->
        </article>
        <!-- END COL -->
    </div>
    <!-- END ROW -->
</div>
