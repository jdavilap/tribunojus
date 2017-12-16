/**
 * Created by J&D on 11/12/2017.
 */
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

var pagefunction = function () {

    var $checkoutFormAbogado = $('#abogado-form').validate({
        // Rules for form validation
        rules: {
            'SignupForm[first_name]': {
                required: true
            },
            'SignupForm[last_name]': {
                required: true
            },
            'SignupForm[email]': {
                required: true,
                email: true
            },
            'SignupForm[dni]': {
                required: true,
                digits: true
            },
            'SignupForm[domicilio]': {
                required: true
            },
            'SignupForm[username]': {
                required: true
            },
            'SignupForm[password]': {
                required: true
            }

        },
        // Messages for form validation
        messages: {
            'SignupForm[first_name]': {
                required: 'Por favor entre su nombre'
            },
            'SignupForm[last_name]': {
                required: 'Por favor entre su apellido'
            },
            'SignupForm[email]': {
                required: 'Por favor entre direccion de e-mail',
                email: 'Por favor entre una direccion valida de e-mail'
            },
            'SignupForm[dni]': {
                required: 'Por favor entre su dni',
                digits: 'Solo se admite digitos'
            },
            'SignupForm[domicilio]': {
                required: 'Por favor entre su domicilio'
            },
            'SignupForm[username]': {
                required: 'Por favor entre su nombre de usuario'
            },
            'SignupForm[password]': {
                required: 'Por favor entre su contraseña'
            }
        },

        // Do not change code below
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        }
    });
    var $checkoutFormUser = $('#user-form').validate({
        // Rules for form validation
        rules: {
            'SignupForm[first_name]': {
                required: true
            },
            'SignupForm[last_name]': {
                required: true
            },
            'SignupForm[email]': {
                required: true,
                email: true
            },
            'SignupForm[dni]': {
                required: true,
                digits: true
            },
            'SignupForm[domicilio]': {
                required: true
            },
            'SignupForm[username]': {
                required: true
            },
            'SignupForm[password]': {
                required: true
            }

        },
        // Messages for form validation
        messages: {
            'SignupForm[first_name]': {
                required: 'Por favor entre su nombre'
            },
            'SignupForm[last_name]': {
                required: 'Por favor entre su apellido'
            },
            'SignupForm[email]': {
                required: 'Por favor entre direccion de e-mail',
                email: 'Por favor entre una direccion valida de e-mail'
            },
            'SignupForm[dni]': {
                required: 'Por favor entre su dni',
                digits: 'Solo se admite digitos'
            },
            'SignupForm[domicilio]': {
                required: 'Por favor entre su domicilio'
            },
            'SignupForm[username]': {
                required: 'Por favor entre su nombre de usuario'
            },
            'SignupForm[password]': {
                required: 'Por favor entre su contraseña'
            }
        },

        // Do not change code below
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        }
    });
    var $checkoutFormItem = $('#item-form').validate({
        // Rules for form validation
        rules: {
            'AuthItem[name]': {
                required: true
            },
            'AuthItem[type]': {
                required: true,
                digits: true
            }

        },
        // Messages for form validation
        messages: {
            'AuthItem[name]': {
                required: 'Por favor entre el nombre de la regla'
            },
            'AuthItem[type]': {
                required: 'Por favor entre el tipo de regla',
                digits: 'Solo se admite digitos'
            }
        },

        // Do not change code below
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        }
    });
    var $checkoutFormExpediente = $('#expediente-form').validate({
        // Rules for form validation
        rules: {
            'PjExpediente[n_expendiente]': {
                required: true
            },
            'PjExpediente[juez]': {
                required: true
            },
            'PjExpediente[fecha_inicio]': {
                required: true
                //date: true
            },
            'PjExpediente[sumilla]': {
                required: true
            },
            'PjExpediente[materia]': {
                required: true
            },
            'PjExpediente[etapa_procesal]': {
                required: true
            },
            'PjExpediente[ubicacion]': {
                required: true
            },
            'PjExpediente[proceso]': {
                required: true
            },
            'PjExpediente[especialidad]': {
                required: true
            },
            'PjExpediente[estado]': {
                required: true
            },
            'PjExpediente[distrito_judicial]': {
                required: true
            }


        },
        // Messages for form validation
        messages: {
            'PjExpediente[n_expendiente]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[juez]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[fecha_inicio]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[sumilla]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[materia]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[etapa_procesal]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[ubicacion]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[proceso]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[especialidad]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[estado]': {
                required: 'Este campo es requerido'
            },
            'PjExpediente[distrito_judicial]': {
                required: 'Este campo es requerido'
            }
        },

        // Do not change code below
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        }
    });
};

// end pagefunction

// Load form valisation dependency
loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);