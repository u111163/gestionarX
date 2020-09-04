'use strict';
import Crud from "./../crud";

(function($){
    //DECLARAR
    const tipo_cambio = new Crud({
        id: 'tipo_cambio',
        fieldsTable: [
            'fecha',
            'compra',
            'venta'
        ],
        fieldsForm: [
            'fecha',
            'compra',
            'venta'
        ],
    })

    //FUNCTIONS ASYN


    //METHODS

    //VALIDATION

    //INIT
    $(document).ready(function () {
        tipo_cambio.valid_form({
            'tipo_cambio[fecha]': {
                validators: {
                    notEmpty: {
                        message: 'Fecha requerido'
                    }
                }
            },
            'tipo_cambio[compra]': {
                validators: {
                    notEmpty: {
                        message: 'Compra requerido'
                    }
                }
            },
            'tipo_cambio[venta]': {
                validators: {
                    notEmpty: {
                        message: 'Venta requerido'
                    }
                }
            }
        })
    })

})(jQuery)