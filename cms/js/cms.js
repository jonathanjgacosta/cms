$(document).ready(function() {
    
//Validacion para form de login
 $('#loginForm').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'El email es requerido'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida'
                    }
                }
            }
        }
    });

//Validacion de formulario de registro
$('#usuarioForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    }
                }
            },

            apellido: {
                validators: {
                    notEmpty: {
                        message: 'El apellido es requerido'
                    }
                }
            },

            usuario: {
                validators: {
                    notEmpty: {
                        message: 'El usuario es requerido'
                    }
                }
            },

            password: {
                validators: {
                    notEmpty: {
                        message: 'El password es requerido y no puede ser vacio'
                    },
                    stringLength: {
                        min: 8,
                        message: 'El password debe contener al menos 8 caracteres'
                    }
                }
            },

            tipo_usuario: {
                validators: {
                    notEmpty: {
                        message: 'El tipo de usuario es requerido y no puede ser vacio'
                    },

                }
            },
        

        }
    });


//Datepicker registro form
$(function () {
$('#datetimepicker').datetimepicker({
                    pickTime: false
                });
});


 $('#datetimepicker')
        .on('dp.change dp.show', function(e) {
            // Revalidate the date when user change it
            $('#registrationForm').bootstrapValidator('revalidateField', 'datetimepicker');
            $('#pagoForm').bootstrapValidator('revalidateField', 'fecha_pago');
        });


//Validacion para form de login
 $('#contenidoForm').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            titulo: {
                validators: {
                    notEmpty: {
                        message: 'El titulo es requerido'
                    }
                }
            },

            tipo_contenido: {
                validators: {
                    notEmpty: {
                        message: 'El tipo de contenido es requerido'
                    }
                }
            },

            datetimepicker: {
                validators: {
                    notEmpty: {
                        message: 'La fecha de publicacion es requerida y no puede ser vacia'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'La fecha de publicacion no es valida'
                    }
                }
            },


        }
    });


//fin del document.ready()
});
