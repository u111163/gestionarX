'use strict';
import Crud from "./../crud";

(function($){
	//DECLARAR
    const forma_pago = new Crud({
        id: 'forma_pago',
        fieldsTable: [
            'nombre',
            //'email'
        ],
        fieldsForm: [
            'nombre'
        ],
    })

	//FUNCTIONS ASYN


	//METHODS

    //VALIDATION

	//INIT
    $(document).ready(function () {
        forma_pago.valid_form({
            'forma_pago[nombre]': {
                validators: {
                    notEmpty: {
                        message: 'Nombre requerido'
                    }
                }
            }
        })
    })

})(jQuery)