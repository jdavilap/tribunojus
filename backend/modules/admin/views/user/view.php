<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\User */

$this->title ='USUARIO: ' .$model->username;
$this->params['breadcrumbs'][] = ['label' => 'USUARIO', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="well">
            <!-- row -->
            <div class="row">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p>

                        <?= Html::a('<i class="fa fa-minus"></i> ELIMINAR', ['delete','id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar este usuario ?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false">
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
                            <!-- widget content -->
                            <div class="widget-body no-padding">

                                <?= DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                        'id',
                                        'username',
                                        'first_name',
                                        'last_name',
                                        'dni',
                                        'domicilio',
                                        'auth_key',
                                        'password_hash',
                                        //'password_reset_token',
                                        'email:email',
                                        //'status',
                                        'created_at:datetime',
                                        //'updated_at',
                                    ],
                                ]) ?>
                            </div>
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
