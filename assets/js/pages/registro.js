'use strict';
import Crud from "./../crud";

(function($){
	//DECLARAR
    const registro = new Crud({
        id: 'registro',
        fieldsTable: [
            'nombre'
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
        registro.valid_form({
            'registro[nombre]': {
                validators: {
                    notEmpty: {
                        message: 'Nombre requerido'
                    }
                }
            }
        })
    })

})(jQuery)