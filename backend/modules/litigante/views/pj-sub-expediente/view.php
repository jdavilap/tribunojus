<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjSubExpediente */

$this->title = 'SUB EXPEDIENTE: '. $model->sub_expediente;
$this->params['breadcrumbs'][] = ['label' => 'SUB EXPEDIENTE', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pj-sub-expediente-view">

    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="well">
            <!-- row -->
            <div class="row">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p>
                        <?= Html::a('<i class="fa fa-edit"></i> ACTUALIZAR', ['update', 'id' => $model->id, 'id_expediente' => $model->id_expediente], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('<i class="fa fa-minus"></i> ELIMINAR', ['delete', 'id' => $model->id, 'id_expediente' => $model->id_expediente], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar este sub expediente?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
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
                            <span class="widget-icon"> <i class="fa fa-folder-open"></i> </span>

                            <h2><?= Html::encode($this->title) ?></h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <?= DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                        //'id',
                                        //'id_expediente',
                                        'sub_expediente',
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
        </div class="well">
    </div>
</div>
