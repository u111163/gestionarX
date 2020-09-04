"use strict";

// Class Definition
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    'user[firstname]': {
                        validators: {
                            notEmpty: {
                                message: 'Nombres requerido'
                            }
                        }
                    },
                    'user[lastname]': {
                        validators: {
                            notEmpty: {
                                message: 'Apellidos requerido'
                            }
                        }
                    },                    
                    'user[email]': {
                        validators: {
                            notEmpty: {
                                message: 'Dirección de correo requerido'
                            },
                            emailAddress: {
                                message: 'El valor ingresado no es una dirección de correo válida'
                            }
                        }
                    },
                    'user[password][first]': {
                        validators: {
                            notEmpty: {
                                message: 'Contraseña requerida'
                            }
                        }
                    },
                    'user[password][second]': {
                        validators: {
                            notEmpty: {
                                message: 'Confirmación de la contraseña requerida'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="user[password][first]"]').value;
                                },
                                message: 'La contraseña y su confirmación no son el mismo'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'Debe aceptar los términos y condiciones.'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    //submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap()                    
                }
            }
        );

        $('#kt_login_signup_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Datos ingresados correctamente.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Enviando...",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                } else {
                    swal.fire({
                        text: "Se ha detectado algún error. Verifique los datos ingresados.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();
           $(location).attr('href','/');
        });
    }



    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');
            _handleSignUpForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
