'use strict';
import './functions'
const _route = $("meta[name='route']").attr('content')

export default class Crud {

    constructor(p) {
        this.id = p.id
        this.fieldsTable = p.fieldsTable
        this.fieldsForm = p.fieldsForm
        this.title = (p.title === undefined) ? p.id : p.title
        this.textModal = {
            store: {
                title: 'Nueva ' + this.title,
                button: 'Guardar cambios'
            },
            update: {
                title: 'Editar ' + this.title,
                button: 'Actualizar cambios'
            }
        }
        this.route = _route + this.id + '/';
        this.init()
    }

    //functions asyn request
    read (msg = true) {
        let that = this
        $.ajax({
            url: this.route+'list',
            type: 'GET',
            beforeSend: function () {
                _overlayPage()
            },
            success: function (r) {
                let nro = 1
                that.datatable.clear()
                if (r['data'].length > 0) {
                    $.each(r['data'], function (k, v) {
                        let options = '<span style="overflow: visible; position: relative; width: 125px;">' +
                            '   <a href="javascript:;" data-id="' + v.id + '" class="btn btn-sm btn-primary btn-text-primary btn-icon mr-2 edit" title="Editar ' + that.title + '">' +
                            '        <span class="svg-icon svg-icon-md"> ' +
                            '           <svg xmlns="http://www.w3.org/2000/svg"' +
                            '                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">' +
                            '                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">' +
                            '                    <rect x="0" y="0" width="24" height="24"></rect>' +
                            '                    <path' +
                            '                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"' +
                            '                        fill="#000000" fill-rule="nonzero"' +
                            '                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">' +
                            '                    </path>' +
                            '                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>' +
                            '                </g>' +
                            '            </svg> ' +
                            '       </span> ' +
                            '   </a> ' +
                            '   <a href="javascript:;" data-id="' + v.id + '" class="btn btn-sm btn-danger btn-text-primary btn-icon delete" title="Eliminar ' + that.title + '"> ' +
                            '       <span class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"' +
                            '                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">' +
                            '                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">' +
                            '                    <rect x="0" y="0" width="24" height="24"></rect>' +
                            '                    <path' +
                            '                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"' +
                            '                        fill="#000000" fill-rule="nonzero"></path>' +
                            '                    <path' +
                            '                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"' +
                            '                        fill="#000000" opacity="0.3"></path>' +
                            '                </g>' +
                            '            </svg> </span> </a>' +
                            '</span>';
                        let data = [];
                        data.push(nro++)
                        for (let field of that.fieldsTable) {
                            data.push(v[field])
                        }
                        data.push(options)
                        that.datatable.row.add(data).draw(false)
                    })

                    $('#table-'+that.id).on('click', 'a', function () {
                        let id = $(this).attr('data-id')
                        if ($(this).hasClass('edit')) {
                            that.modal.find('.modal-title').text(that.textModal.update.title)
                            that.btnSave.text(that.textModal.update.title).attr('data-id', id)
                            that.show(id)
                        } else if ($(this).hasClass('delete')) {
                            that.delete(id)
                        }
                    })

                } else {
                    that.form.find('tbody').empty()
                    that.datatable.draw()
                }
            }
        })
            .done(function () {
                if (msg) _m(1)
            })
            .fail(function () {
                _m(2)
            })
            .always(function () {
                _overlayPage(false)
            })
    }

    show (id) {
        let that = this
        $.ajax({
            url: this.route+id,
            type: 'GET',
            beforeSend: function () {
                _overlayPage()
            },
            success: function (r) {
                for (let field of that.fieldsForm) {
                    $('#'+that.id+'_'+field).val(r['data'][field])
                }
            }
        })
            .done(function () {
                _m(5)
                that.modal.modal('show')
            })
            .fail(function () {
                _m(6)
            })
            .always(function () {
                _overlayPage(false)
            })
    }

    store (data) {
        let that = this
        $.ajax({
            url: this.route+'store',
            type: 'POST',
            data: data,
            beforeSend: function () {
                _overlayPage()
            }
        })
            .done(function () {
                that.modal.modal('hide')
                that.read(false)
                _m(3)
            })
            .fail(function () {
                _m(4)
            })
            .always(function () {
                _overlayPage(false)
            })
    }

    update (id, data) {
        let that = this
        $.ajax({
            url: this.route+id,
            type: 'PUT',
            data: data,
            beforeSend: function () {
                _overlayPage()
            }
        })
            .done(function () {
                that.modal.modal('hide')
                that.read(false)
                _m(3)
            })
            .fail(function () {
                _m(4)
            })
            .always(function () {
                _overlayPage(false)
            })
    }

    delete (id) {
        let that = this
        Swal.fire({
            title: '¿Está Seguro?',
            text: "Esta acción puede no ser reversible!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrar registro!'
        }).then((result) => {
            if (result.value)
                $.ajax({
                    url: this.route+id,
                    type: 'DELETE',
                    beforeSend: function () {
                        _overlayPage()
                    }
                })
                    .done(function () {
                        that.read(false)
                        _m(1)
                        swal.fire(
                            'Eliminado',
                            'Tu registro ha sido eliminado.',
                            'success'
                        );
                    })
                    .fail(function () {
                        _m(2)
                    })
                    .always(function () {
                        _overlayPage(false)
                    })
        });
    }

    //utils
    reset_form () {
        for (let field of this.fieldsForm) {
            $('#'+this.id+'_'+field).val('').removeClass('is-valid')
        }
    }

    valid_form (fields) {
        this.validation = FormValidation.formValidation(
            document.getElementById('form-'+this.id),
            {
                fields: fields,
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    //submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        )
    }

    //init
    init () {
        const that = this
        this.modal = $('#modal-'+this.id);
        this.table = $('#table-'+this.id);
        this.form = $('#form-'+this.id);

        this.btnNew = $('#new-'+this.id);
        this.btnRefresh = $('#refresh-'+this.id)
        this.btnSave = $('#save-'+this.id);

        this.btnNew.click(function () {
            that.modal.modal('show');
        })
        this.btnRefresh.click(function () {
            that.read();
        })
        this.btnSave.click(function () {
            let id = $(this).attr('data-id')
            that.validation.validate().then(function(status) {
                if (status === 'Valid') {
                    let data = {}
                    for (let field of that.fieldsForm) {
                        data[field] = $('#'+that.id+'_'+field).val()
                    }
                    if (id === undefined) {
                        that.store(data)
                    } else {
                        that.update(id, data)
                    }
                    /*swal.fire({
                        text: "Datos ingresados correctamente.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "¿Enviar Datos?",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        let data = {}
                        for (let field of that.fieldsForm) {
                            data[field] = $('#empresa_'+field).val()
                        }
                        if (id === undefined) {
                            that.store(data)
                        } else {
                            that.update(id, data)
                        }
                    });*/
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
        })
        this.datatable = this.table.DataTable({
            language: {
                url: '/build/json/es_datatable.json'
            }
        })

        this.modal.on('hide.bs.modal', function () {
            //$('#myInput').trigger('focus')
            that.modal.find('.modal-title').text(that.textModal.store.title)
            that.btnSave.text(that.textModal.store.title)
            that.reset_form()
        })

        $(document).ready(function ($) {
            that.read()
        })
    }
}