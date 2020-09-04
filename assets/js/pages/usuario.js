'use strict';
import Crud from "./../crud";

(function($){
	//DECLARAR
    const usuario = new Crud({
        id: 'usuario',
        fieldsTable: [
            'dni',
            'nombres',
            'login',
            'tipo_usuario_id',
            //'email'
        ],
        fieldsForm: [
            'dni',
            'nombres',
            'login',
            'password',
            'tipo_usuario_id',
            'empresa_id'
        ],
    })

	//FUNCTIONS ASYN


	//METHODS

    //VALIDATION

	//INIT
    $(document).ready(function () {
        usuario.valid_form({
            'usuario[dni]': {
                validators: {
                    notEmpty: {
                        message: 'DNI requerido'
                    }
                }
            },
            'usuario[nombres]': {
                validators: {
                    notEmpty: {
                        message: 'Nombres requerido'
                    }
                }
            },
            'usuario[login]': {
                validators: {
                    notEmpty: {
                        message: 'Login requerido'
                    }
                }
            },
            'usuario[password]': {
                validators: {
                    notEmpty: {
                        message: 'Password requerido'
                    }
                }
            },
            'usuario[empresa_id]': {
                validators: {
                    notEmpty: {
                        message: 'Empresa requerido'
                    }
                }
            },
            'usuario[tipo_usuario_id]': {
                validators: {
                    notEmpty: {
                        message: 'Tipo Usuario requerido'
                    }
                }
            }
        })
    })

})(jQuery)