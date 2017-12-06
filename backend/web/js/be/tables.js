
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
