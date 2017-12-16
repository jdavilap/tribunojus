<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\admin\models\User;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthAssignment */

$this->title = 'ASIGNACIÓN: ' . $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'ASIGNACIONES', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-view">
    <!-- START ROW -->
    <div class="row">
        <!-- NEW COL START -->
        <article class="col-sm-12 col-md-12 col-lg-12">
            <p>
                <?= Html::a('<i class="fa fa-edit"></i> Actualizar', ['update', 'item_name' => $model->item_name, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-minus"></i> Eliminar', ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => '¿Esta seguro que desea eliminar esta asignación ?',
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
                    <span class="widget-icon"> <i class="fa fa-cogs"></i> </span>

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
                                'item_name',
                                'created_at:date',
                                'updated_at:date'
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
