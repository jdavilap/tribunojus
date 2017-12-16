<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\litigante\models\PjAnexo */

$this->title = 'Anexo: '.$model->anexo;
$this->params['breadcrumbs'][] = ['label' => 'Anexos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pj-anexo-view">
    <!-- START ROW -->
    <div class="row">
        <!-- NEW COL START -->
        <article class="col-sm-12 col-md-12 col-lg-12">
            <p>
                <?= Html::a('<i class="fa fa-edit"></i> Actualizar', ['update', 'id'=> $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-minus"></i> Eliminar', ['delete', 'id'=> $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => '¿Esta seguro que desea eliminar este anexo ?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
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
                    <span class="widget-icon"> <i class="fa fa-paperclip"></i> </span>

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
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'anexo',
                                'fecha',
                                'notificacion:boolean',
                                'id_escrito',
                            ],
                        ]) ?>
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
