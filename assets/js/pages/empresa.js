'use strict';
import Crud from "./../crud";

(function($){
	//DECLARAR
    const empresa = new Crud({
        id: 'empresa',
        fieldsTable: [
            'ubigeo',
            'ruc',
            'razonsoc',
            'direccion',
            'telf',
            //'email'
        ],
        fieldsForm: [
            'ruc',
            'razonsoc',
            'direccion',
            'ubigeo',
            'telf',
            'email'
        ],
    })

	//FUNCTIONS ASYN


	//METHODS

    //VALIDATION

	//INIT
    $(document).ready(function () {
        empresa.valid_form({
            'empresa[ruc]': {
                validators: {
                    notEmpty: {
                        message: 'RUC requerido'
                    }
                }
            },
            'empresa[razonsoc]': {
                validators: {
                    notEmpty: {
                        message: 'Razon social requerido'
                    }
                }
            },
            'empresa[direccion]': {
                validators: {
                    notEmpty: {
                        message: 'Dirección requerido'
                    }
                }
            },
            'empresa[ubigeo]': {
                validators: {
                    notEmpty: {
                        message: 'Ubigeo requerido'
                    }
                }
            },
            'empresa[telf]': {
                validators: {
                    notEmpty: {
                        message: 'Telefono requerido'
                    }
                }
            },
            'empresa[email]': {
                validators: {
                    notEmpty: {
                        message: 'Email requerido'
                    },
                    emailAddress: {
                        message: 'El valor ingresado no es una dirección de correo válida'
                    }
                }
            }
        })
    })

})(jQuery)