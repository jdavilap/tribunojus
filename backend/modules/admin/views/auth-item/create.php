<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItem */

$this->title = 'CREAR REGLA';
$this->params['breadcrumbs'][] = ['label' => 'REGLAS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

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
                            <span class="widget-icon"> <i class="fa fa-check-circle"></i> </span>

                            <h2><?= Html::encode($this->title) ?></h2>
                        </header>
                        <!-- widget div-->
                        <div>
                            <!-- widget content -->
                            <div class="widget-body">
                                <?= $this->render('_form', [
                                    'model' => $model,
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