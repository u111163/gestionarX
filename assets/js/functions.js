_overlayPage = (active = true)  => {
    if (active) {
        $('#card-main').addClass('overlay overlay-block')
        $('.card-body').append('' +
            '<div class="card-spinner overlay-layer bg-dark-o-10">' +
                '<div class="spinner spinner-danger"></div>' +
            '</div>'
        )
    } else {
        $('#card-main').removeClass('overlay overlay-block')
        $('.card-spinner').remove()
    }
}

_m = (status) => {
    switch (status) {
        case 1:
            _msg('success', 'Los datos se han actualizado correctamente.', 'Completado');
            break;
        case 2:
            _msg('error', 'Los datos no se han podido actualizar.', 'Error');
            break;
        case 3:
            _msg('success', 'Los datos se han guardado correctamente.', 'Completado');
            break;
        case 4:
            _msg('error', 'Los datos no se han podido guardar.', 'Error');
            break;
        case 5:
            _msg('success','Los datos se han descargado correctamente.','Completado');
            break;
        case 6:
            _msg('error','No se han podido descargar estos datos.','Error');
            break;
        case 7:
            _msg('error','El registro se ha eliminado correctamente.','Completado');
            break;
        case 8:
            _msg('success','El registro no se ha eliminado.','Error');
            break;
        default :
            _msg('info', 'Message', 'Title');
    }
    return 1;
}

_msg = (status = 'info', message = 'Message', title = 'Title') => {
    let options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    switch (status) {
        case "success":
            toastr.success(message, title, options);
            break;
        case "warning":
            toastr.warning(message, title, options)
            break;
        case "error":
            toastr.error(message, title, options)
            break;
        case "info":
            toastr.info(message, title, options)
            break;
        default:
            toastr.info(message, title, options)
    }
    return 1;
}