<?php
/**
 * Created by PhpStorm.
 * User: J&D
 * Date: 27/11/2017
 * Time: 9:26
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Crear Reglas de Seguridad';
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-deletebutton="false">
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
                    <h2>Fuel Wizard </h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body fuelux">

                        <div class="wizard">
                            <ul class="steps">
                                <li data-target="#step1" class="active">
                                    <span class="badge badge-info">1</span>Step 1<span class="chevron"></span>
                                </li>
                                <li data-target="#step2">
                                    <span class="badge">2</span>Step 2<span class="chevron"></span>
                                </li>
                                <li data-target="#step3">
                                    <span class="badge">3</span>Step 3<span class="chevron"></span>
                                </li>
                                <li data-target="#step4">
                                    <span class="badge">4</span>Step 4<span class="chevron"></span>
                                </li>
                                <li data-target="#step5">
                                    <span class="badge">5</span>Step 5<span class="chevron"></span>
                                </li>
                            </ul>
                            <div class="actions">
                                <button type="button" class="btn btn-sm btn-primary btn-prev">
                                    <i class="fa fa-arrow-left"></i>Prev
                                </button>
                                <button type="button" class="btn btn-sm btn-success btn-next" data-last="Finish">
                                    Next<i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="step-content">
                            <form class="form-horizontal" id="fuelux-wizard" method="post">

                                <div class="step-pane active" id="step1">
                                    <h3><strong>Step 1 </strong> - Validation states</h3>

                                    <!-- wizard form starts here -->
                                    <fieldset>

                                        <div class="form-group has-warning">
                                            <label class="col-md-2 control-label">Input warning</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input class="form-control" type="text">
                                                    <span class="input-group-addon"><i class="fa fa-warning"></i></span>
                                                </div>
                                                <span class="help-block">Something may have gone wrong</span>
                                            </div>

                                        </div>

                                        <div class="form-group has-error">
                                            <label class="col-md-2 control-label">Input error</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input class="form-control" type="text">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                                </div>
                                                <span class="help-block"><i class="fa fa-warning"></i> Please correct the error</span>
                                            </div>
                                        </div>

                                        <div class="form-group has-success">
                                            <label class="col-md-2 control-label">Input success</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                    <input class="form-control" type="text">
                                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                                </div>
                                                <span class="help-block">Something may have gone wrong</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-2">Input icon success</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-sm-12">

                                                        <div class="input-icon-left">
                                                            <i class="fa txt-color-green fa-check"></i>
                                                            <input class="form-control" placeholder="Left Icon" type="text">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>

                                </div>

                                <div class="step-pane" id="step2">
                                    <h3><strong>Step 2 </strong> - Alerts</h3>

                                    <div class="alert alert-warning fade in">
                                        <button class="close" data-dismiss="alert">
                                            ×
                                        </button>
                                        <i class="fa-fw fa fa-warning"></i>
                                        <strong>Warning</strong> Your monthly traffic is reaching limit.
                                    </div>

                                    <div class="alert alert-success fade in">
                                        <button class="close" data-dismiss="alert">
                                            ×
                                        </button>
                                        <i class="fa-fw fa fa-check"></i>
                                        <strong>Success</strong> The page has been added.
                                    </div>

                                    <div class="alert alert-info fade in">
                                        <button class="close" data-dismiss="alert">
                                            ×
                                        </button>
                                        <i class="fa-fw fa fa-info"></i>
                                        <strong>Info!</strong> You have 198 unread messages.
                                    </div>

                                    <div class="alert alert-danger fade in">
                                        <button class="close" data-dismiss="alert">
                                            ×
                                        </button>
                                        <i class="fa-fw fa fa-times"></i>
                                        <strong>Error!</strong> The daily cronjob has failed.
                                    </div>

                                </div>

                                <div class="step-pane" id="step3">
                                    <h3><strong>Step 3 </strong> - Wizard continued</h3>
                                    <br>
                                    <br>
                                    <h1 class="text-center text-primary"> This will be your Step 3 </h1>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>

                                <div class="step-pane" id="step4">
                                    <h3><strong>Step 4 </strong> - Wizard continued...</h3>
                                    <br>
                                    <br>
                                    <h1 class="text-center text-danger"> This will be your Step 4 </h1>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>

                                <div class="step-pane" id="step5">
                                    <h3><strong>Step 5 </strong> - Finished!</h3>
                                    <br>
                                    <br>
                                    <h1 class="text-center text-success"><i class="fa fa-check"></i> Congratulations!
                                        <br>
                                        <small>Click finish to end wizard</small></h1>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>

                            </form>
                        </div>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->

    </div>

    <!-- end row -->

</section>
<!-- end widget grid -->


<?php
$script= <<<JS
/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();

	// PAGE RELATED SCRIPTS

	// pagefunction

	var pagefunction = function() {

		// load bootstrap wizard

		loadScript("js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js", runBootstrapWizard);

		//Bootstrap Wizard Validations

		function runBootstrapWizard() {

			var validator = $("#wizard-1").validate({

				rules : {
					email : {
						required : true,
						email : "Your email address must be in the format of name@domain.com"
					},
					fname : {
						required : true
					},
					lname : {
						required : true
					},
					country : {
						required : true
					},
					city : {
						required : true
					},
					postal : {
						required : true,
						minlength : 4
					},
					wphone : {
						required : true,
						minlength : 10
					},
					hphone : {
						required : true,
						minlength : 10
					}
				},

				messages : {
					fname : "Please specify your First name",
					lname : "Please specify your Last name",
					email : {
						required : "We need your email address to contact you",
						email : "Your email address must be in the format of name@domain.com"
					}
				},

				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				},
				errorElement : 'span',
				errorClass : 'help-block',
				errorPlacement : function(error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else {
						error.insertAfter(element);
					}
				}
			});

			$('#bootstrap-wizard-1').bootstrapWizard({

				'tabClass' : 'form-wizard',
				'onNext' : function(tab, navigation, index) {
					var valid = $("#wizard-1").valid();
					if (!valid) {
						validator.focusInvalid();
						return false;
					} else {
						$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass('complete');
						$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step').html('<i class="fa fa-check"></i>');
					}
				}
			});

		};

		// load fuelux wizard

		loadScript("js/plugin/fuelux/wizard/wizard.min.js", fueluxWizard);

		function fueluxWizard() {

			var wizard = $('.wizard').wizard();

			wizard.on('finished', function(e, data) {
				//$("#fuelux-wizard").submit();
				//console.log("submitted!");
				$.smallBox({
					title : "Congratulations! Your form was submitted",
					content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
					color : "#5F895F",
					iconSmall : "fa fa-check bounce animated",
					timeout : 4000
				});

			});

		};

	};

	// end pagefunction

	// Load bootstrap wizard dependency then run pagefunction
	pagefunction();
JS;
$this->registerJS($script);
?>