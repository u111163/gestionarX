'use strict';
import Crud from "./../crud";

(function($){
	//DECLARAR
    const tipo_comprobante = new Crud({
        id: 'tipo_comprobante',
        fieldsTable: [
            'codigo',
            'nombre'
        ],
        fieldsForm: [
            'codigo',
            'nombre'
        ],
    })

	//FUNCTIONS ASYN


	//METHODS

    //VALIDATION

	//INIT
    $(document).ready(function () {
        tipo_comprobante.valid_form({
            'tipo_comprobante[codigo]': {
                validators: {
                    notEmpty: {
                        message: 'Codigo requerido'
                    }
                }
            },
            'tipo_comprobante[nombre]': {
                validators: {
                    notEmpty: {
                        message: 'Nombre requerido'
                    }
                }
            }
        })
    })

})(jQuery)