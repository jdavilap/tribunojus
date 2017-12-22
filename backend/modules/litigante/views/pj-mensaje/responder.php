<?php
/**
 * Created by PhpStorm.
 * User: J&D
 * Date: 21/12/2017
 * Time: 8:48
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use backend\modules\admin\models\PjAbogado;
use backend\modules\litigante\models\PjLitigante;


/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjMensaje */

$this->title = 'Responder Mensaje';
$this->params['breadcrumbs'][] = ['label' => 'Listado de Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pj-mensaje-responder">
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
                    <span class="widget-icon"> <i class="fa fa-envelope"></i> </span>

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
                                        <?= $form->field($model, 'asunto')->textInput(
                                            [
                                                'maxlength' => true,
                                                'value'=> 'Re: '.$model->asunto
                                            ]) ?>
                                    </label>
                                </section>
                                <section class="col col-10">
                                    <label class="textarea">
                                        <?= $form->field($model, 'contenido')->textarea([
                                            'rows'=> 10,
                                            'value'=> ''
                                        ])?>
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <footer>
                            <div class="form-group">
                                <?= Html::submitButton('<i class="fa fa-reply"></i> Responder', ['class' => 'btn btn-primary']) ?>
                                <button type="button" class="btn btn-default" onclick="window.history.back();">
                                    <i class="fa fa-times"></i> Cancelar
                                </button>
                            </div>
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