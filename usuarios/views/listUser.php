<?php
require('../layout/header.php');
?>
<!-- contenido -->
<div id="contenido">
    <h1>Listado Usuarios de la Aplicación</h1>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <div class="card px-4 py-2">
                <h5 class="card-header" style="text-shadow: 0 0 black;">DASHBOARD USUARIOS</h5><br>
                <div class="">
                    <button type="button" class="btn btn-primary" onclick="abrirModal()" style="background-color: #1F2937;">
                        Nuevo usuario
                        <i class="fas fa-user-plus" style="margin-left: 5px;"></i>
                    </button>
                    <br>
                    <br>
                    <table id="datatable-responsive" class="table table-striped dt-responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Small modal Guardar Nuevo -->
<div class="modal" tabindex="-1" id="FormModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong> Datos del Nuevo Usuario</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formusuario">
                    <div class="col-md-2" hidden>
                        <label for="id" class="form-label">Id</label>
                        <input hidden type="text" class="form-control" id="id" readonly>
                    </div>
                    <div class="col-12">
                        <label for="nombre" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-12">
                        <label for="nombre" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Identificación</label>
                        <input type="text" class="form-control" id="documento" name="documento" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="email" name="email" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Movil</label>
                        <input type="number" class="form-control" id="movil" name="movil" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="user" name="user" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="pass" name="pass" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Fecha Ingreso</label>
                        <input type="date" class="form-control" id="ingreso" name="ingreso" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="nivelUsuario" class="form-label">Nivel de Usuario</label>
                        <select id="nivelUsuario" class="form-select">
                            <option value="0">Seleccionar</option>
                            <option value="1">ADMINISTRADOR</option>
                            <option value="2">USUARIO</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputestado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-select">
                            <option value="0">Seleccionar</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
                        <button type="button" class="btn btn-dark" style="background-color:#31316A; border-color:#31316A" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div id="mensajeErrorCreacion" class="alert alert-danger" role="alert" style="display:none;"></div>
                        </div>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>

        </div>
    </div>
</div>
<!-- Fin modal Guardar Nuevo -->
<!-- Small modal Modificar Usuario -->
<div class="modal" tabindex="-1" id="FormModalModificar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong> Datos del Usuario a Modificar</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formusuarioEditar">
                    <div class="col-md-6">
                        <label for="idM" class="form-label">Id Usuario</label>
                        <input type="text" class="form-control" id="idM" readonly>
                    </div>
                    <div class="col-6">
                        <label for="nombre" class="form-label">Nombres Completo</label>
                        <input type="text" class="form-control" id="nombreM" name="nombreM" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-6">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidoM" name="apellidoM" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Identificación</label>
                        <input type="text" class="form-control" id="documentoM" name="documentoM" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="emailM" name="emailM" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Movil</label>
                        <input type="number" class="form-control" id="movilM" name="movilM" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDoc" class="form-label">Fecha Ingreso</label>
                        <input type="date" class="form-control" id="fechaM" name="fechaM" onKeyUp="this.value=this.value.toUpperCase()" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputUser" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuarioM" name="usuarioM" onKeyUp="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="inputnivelUsuarioM" class="form-label">Nivel de Usuario</label>
                        <select id="nivelUsuarioM" class="form-select">
                            <option value="0">Seleccionar</option>
                            <option value="1">ADMINISTRADOR</option>
                            <option value="2">USUARIO</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEstadoM" class="form-label">Estado</label>
                        <select id="estadoM" class="form-select">
                            <option value="0">Seleccionar</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="guardarEditado()">Guardar</button>
                <button type="button" class="btn btn-dark" style="background-color:#31316A; border-color:#31316A" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div id="mensajeErrorE" class="alert alert-danger" role="alert"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal Modificar Usuario -->
<!-- Small modal Modificar PASSWORD Usuario -->
<div class="modal" tabindex="-1" id="formusuarioPassword">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong> Cambio de Contraseña Usuario</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="formPassword">
                    <div class="col-md-2" hidden>
                        <label for="id" class="form-label">Id</label>
                        <input type="text" class="form-control" id="idP" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="inputUser" class="form-label"><strong> Usuario</strong></label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="usuarioP" name="usuarioP" value="<?php echo $_SESSION['nombre'] ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress5" class="form-label"><strong> Nueva Contraseña</strong></label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" class="form-control" id="passNuevo" name="passNuevo">
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress5" class="form-label"><strong> Confirmar Nueva Contraseña</strong></label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" class="form-control" id="passConfirm" name="passConfirm">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="guardarPass()">Guardar</button>
                        <button type="button" class="btn btn-dark" style="background-color:#31316A; border-color:#31316A" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div id="mensajeErrorP" class="alert alert-danger" role="alert"> </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<?php
require('../layout/footer.php');
?>

<script>
    // inicio carga datos dataTable
    var tabladata;
    var filaSeleccionada;
    tabladata = $("#datatable-responsive").DataTable({
        responsive: true,
        ordering: false,
        ajax: {
            url: './capaDatos/listarUsuarios.php',
            type: "GET",
            dataType: "json",
            complete: function() {},
        },
        columns: [{
                "data": "id_user"
            },
            {
                "data": "nombre"
            },
            {
                "data": "apellidos"
            },
            {
                "data": "documento"
            },
            {
                "data": "usuario"
            },
            {
                "data": "estado",
                "render": function(valor) {
                    return valor == "1" ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Inactivo</span>';
                }
            },
            {
                "defaultContent": '<div class="btn-group" role="group">' +
                    '<button type="button" class="btn btn-primary btn-sm btn-editar-user mr-2"><i class="fas fa-user-edit"></i></button>' +
                    '</div>' +
                    '<div class="btn-group" role="group" style="margin-left: 5px;">' +
                    '<button type="button" class="btn btn-secondary btn-sm btn-editar-pass mr-2"><i class="fas fa-lock-open"></i></button>' +
                    '</div>',
                orderable: false,
                searchable: false,
                width: "90px"
            }
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
        },

    });

    // inicio validacion usuario nuevo
    function abrirModal(dataJson) {
        //borrar los datos de los input
        $("#id").val(0);
        $("#nombre").val("");
        $("apellido").val("");
        $("#documento").val("");
        $("#email").val("");
        $("#movil").val("");
        $("#user").val("");
        $("#pass").val("");
        $("#ingreso").val("");
        $("#estado").val(0);
        $("#mensajeErrorCreacion").hide();

        if (dataJson != null) {
            $("#id").val(dataJson.id_user);
            $("#nombre").val(dataJson.nombre);
            $("#apellido").val(dataJson.apellidos);
            $("#documento").val(dataJson.documento);
            $("#email").val(dataJson.email);
            $("#email").val(dataJson.movil);
            $("#user").val(dataJson.usuario);
            $("#pass").val(dataJson.pass);
            $("#ingreso").val(dataJson.fecha_reg);
            $("#user").val(dataJson.usuario);
            $("#nivelUsuario").val(dataJson.nivelUsuario);
            $("#estado").val(dataJson.estado == "1" ? 1 : 0);
        }
        $("#FormModal").modal("show");
    }
    $.validator.addMethod("notZero", function(value, element) {
        return value != "0";
    }, "Este campo es obligatorio");   
    $("#formusuario").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 4
            },
            apellido: {
                required: true,
                minlength: 4
            },
            documento: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
            },
            movil: {
                required: true,
                minlength: 10
            },
            user: {
                required: true,
                minlength: 4
            },
            pass: {
                required: true,
                minlength: 8
            },
            nivelUsuario: {
                required: true,
                notZero: true

            },
            estado: {
                required: true,
                notZero: true
            }
        },
        messages: {
            nombre: "El nombre no cumple con los requisitos minimos.",
            apellido: "El campo apellido no cumple con los requisitos minimos.",
            documento: "El campo documento es obligatorio.",
            email: "El campo email es obligatorio",
            nivelUsuario: "El campo nivel es obligatorio",
            movil: "El campo Móvil es obligatorio",
            user: "El campo usuario es obligatorio",
            pass: "El campo Contraseña es obligatorio",
            estado: "Debe seleccionar estado del Usuario.",
        },
        errorElement: "div",
        errorLabelContainer: ".alert-danger"
    });

    function guardar() {
        if (!$('#formusuario').valid()) {
            return;
        }
        var Usuario = {
            id_user: $("#id").val(),
            nombre: $("#nombre").val(),
            apellidos: $("#apellido").val(),
            documento: $("#documento").val(),
            mail: $("#email").val(),
            usuario: $("#user").val(),
            pass: $("#pass").val(),
            nivelUsuario: $("#nivelUsuario").val(),
            movil: $("#movil").val(),
            fecha: $("#ingreso").val(),
            estado: $("#estado").val()
        }
        console.log(Usuario);
        $.ajax({
                type: 'POST',
                url: './capaDatos/setUsuario.php',
                data: Usuario,
                dataType: 'json',
                async: true,
            })

            .done(function ajaxDone(res) {
                console.log(res);
                if (res.resultado == '0' && res.mensaje.includes('Ya existe un usuario con ese Documento')) {
                    // Mostrar SweetAlert en caso de duplicado
                    swal("Error", res.mensaje, "error");
                    $("#mensajeError").text(res.mensaje).show();
                    return false;
                }

                if (Usuario.id_user == 0) {
                    if (res.resultado != 0) {
                        Usuario.id_user = res.resultado;
                        tabladata.row.add(Usuario).draw(false);
                        swal("Buen Trabajo!", res.mensaje, "success");
                        $("#FormModal").modal("hide");
                        return false;
                    } else {
                        swal("Revise los datos ingresados", res.mensaje, "info");
                        $("#mensajeError").text("Revise los datos ingresados.").show();
                    }
                } else {
                    if (res.resultado != 0) {
                        tabladata.row(filaSeleccionada).data(Usuario).draw(false);
                        filaSeleccionada = null;
                        swal("Buen Trabajo!", res.mensaje, "success");
                        $("#FormModal").modal("hide");
                        return false;
                    } else {
                        swal("No es posible actualizar", res.mensaje, "info");
                        $("#mensajeError").text("No es posible actualizar.").show();
                    }
                }
            })

            .fail(function ajaxError(e) {
                console.log(e);
            })
            .always(function ajaxSiempre() {
                console.log('Final de la llamada ajax.');
            })

        return false;

    }

    // inicio editar usuario
    $("#datatable-responsive tbody").on("click", '.btn-editar-user', function() {
        filaSeleccionada = $(this).closest("tr");
        var data = tabladata.row(filaSeleccionada).data();
        abrirModalEditar(data)
    })

    // abrir form para editar

    function abrirModalEditar(dataJson) {
        // Limpiamos los datos del formulario
        $("#idM").val("");
        $("#nombreM").val("");
        $("#documentoM").val("");
        $("#usuarioM").val("");
        $("#empresaM").val("");
        $("#nivelUsuarioM").val("");
        $("#canalM").val("");
        $("#estadoM").val("");
        $("#mensajeErrorE").hide();

        if (dataJson != null) {
            $.ajax({
                type: 'GET',
                url: './capaDatos/obtenerUsuario.php',
                data: {
                    idUsuario: dataJson.id_user
                },
                dataType: 'json',
                success: function(usuario) {
                    console.log(usuario);
                    $("#idM").val(usuario.id_user);
                    $("#nombreM").val(usuario.nombre);
                    $("#apellidoM").val(usuario.apellidos);
                    $("#documentoM").val(usuario.documento);
                    $("#emailM").val(usuario.mail);
                    $("#movilM").val(usuario.movil);
                    $("#usuarioM").val(usuario.usuario);
                    $("#fechaM").val(usuario.fecha_reg);
                    $("#nivelUsuarioM").val(usuario.tipo_user);
                    $("#estadoM").val(usuario.estado);
                    $("#mensajeErrorE").hide();

                    // Mostramos el modal de edición
                    $("#FormModalModificar").modal("show");
                },
                error: function() {
                    console.error('Error al obtener datos del usuario.');
                }
            });
            $("#FormModalModificar").modal("show");
        }
    }
    $.validator.addMethod("notZero", function(value, element) {
        return value != "0";
    }, "Este campo es obligatorio");
    $("#formusuarioEditar").validate({
        rules: {
            nombreM: {
                required: true,
                minlength: 4
            },
            apellidoM: {
                required: true,
                minlength: 4
            },
            documentoM: {
                required: true,
                minlength: 6
            },
            usuarioM: {
                required: true,
                minlength: 4
            },
            emailM: {
                required: true,
            },
            nivelUsuarioM: {
                required: true,
            },
            movilM: {
                required: true,
                minlength: 10
            },
            nivelUsuarioM: {
                required: true,
                notZero: true
            },
            estadoM: {
                required: true,
                notZero: true
            }
        },
        messages: {
            nombreM: "El nombre no cumple con los requisitos minimos.",
            documento: "El campo documento es obligatorio.",
            usuario: "El campo usuario es muy corto.",
            empresa: "El campo empresa es obligatorio",
            nivelUsuario: "El campo nivel es obligatorio",
            canal: "El campo Canal es obligatorio",
            estado: "Debe seleccionar estado del Usuario.",
        },
        errorElement: "div",
        errorLabelContainer: ".alert-danger"
    });

    function guardarEditado() {
        if (!$('#formusuarioEditar').valid()) {
            return;
        }
        var usuarioEditado = {
            id_user: $("#idM").val(),
            nombre: $("#nombreM").val(),
            apellidos: $("#apellidoM").val(),
            documento: $("#documentoM").val(),
            email: $("#emailM").val(),
            movil: $("#movilM").val(),
            usuario: $("#usuarioM").val(),
            nivelUsuario: $("#nivelUsuarioM").val(),
            estado: $("#estadoM").val()
        }
        //console.log(usuarioEditado);
        $.ajax({
                type: 'POST',
                url: './capaDatos/setUsuario.php',
                data: usuarioEditado,
                dataType: 'json',
                async: true,
            })

            .done(function ajaxDone(res) {
                if (usuarioEditado.id_user == 0) {
                    if (res.resultado != 0) {
                        usuarioEditado.id_user = res.resultado;
                        tabladata.row.add(usuarioEditado).draw(false);
                        swal("¡Buen Trabajo!", res.mensaje, "success")
                    } else {
                        swal("Revise los datos ingresados", res.mensaje, "info");
                        $("#mensajeError").text("Revise los datos ingresados.").show();
                        return;
                    }
                } else {
                    if (res.resultado != 0) {
                        tabladata.row(filaSeleccionada).data(usuarioEditado).draw(false);
                        filaSeleccionada = null;
                        swal("¡Buen Trabajo!", res.mensaje, "success")
                    } else {
                        swal({
                            title: "No es posible actualizar",
                            text: res.mensaje,
                            icon: "info"
                        });
                        $("#mensajeError").text("No es posible actualizar.").show();
                        return;
                    }
                }
                // Ocultar el modal después de realizar las operaciones
                $("#FormModalModificar").modal("hide");
            })
            .fail(function ajaxError(e) {
                console.log(e);
            })
            .always(function ajaxSiempre() {
                console.log('Final de la llamada ajax.');
            });

        return false;
    }

    // inicio cambio contraseña

    $("#datatable-responsive tbody").on("click", '.btn-editar-pass', function() {
        filaSeleccionada = $(this).closest("tr");
        var data = tabladata.row(filaSeleccionada).data();
        abrirModalCambioPass(data)
    })

    function abrirModalCambioPass(dataJson) {
        $("#mensajeErrorP").hide();
        if (dataJson != null) {
            $.ajax({
                type: 'GET',
                url: './CapaDatos/obtenerUsuario.php',
                data: {
                    idUsuario: dataJson.id_user
                },
                dataType: 'json',
                success: function(usuario) {
                    console.log(usuario);
                    $("#idP").val(usuario.id_user);
                    $("#usuarioP").val(usuario.usuario);
                },
                error: function() {
                    console.error('Error al otener datos de usuario');
                }
            });
            $("#formusuarioPassword").modal("show");
        }

    }
    $("#formPassword").validate({
        rules: {
            passNuevo: {
                required: true,
                minlength: 8,
                maxlength: 20
            },
            passConfirm: {
                required: true,
                minlength: 8,
                maxlength: 20
            },
        },
        messages: {
            passNuevo: "Debe ingresar una nueva contraseña.",
            passConfirm: "Debe confirmar la contraseña.",
        },
        errorElement: "div",
        errorLabelContainer: ".alert-danger"

    });

    function guardarPass() {
        if (!$('#formPassword').valid()) {
            return;
        }
        var pass1 = $('#passNuevo').val();
        var pass2 = $('#passConfirm').val();
        if (pass1 != pass2) {
            $('#mensajeErrorP').text('Las contraseñas no coinciden').show();
            return;
        }

        var cambioPass = {
            idP: $("#idP").val(),
            nuevaClave: $("#passNuevo").val(),
            tipoAccion: "password",
        }
        $.ajax({
                type: 'POST',
                url: './CapaDatos/cambiarContrasena.php',
                data: cambioPass,
                dataType: 'json',
                async: true,
            })
            .done(function ajaxDone(res) {
                console.log(res);
                if (res.resultado != 0) {
                    swal("Buen trabajo!", res.mensaje, "success");
                    $("#passNuevo").val("");
                    $("#passConfirm").val("");
                    $("#formusuarioPassword").modal("hide");
                    return false;
                } else {
                    swal("Revise los datos ingresados", res.mensaje, "info")
                    $("#mensajeErrorP").text("Revise los datos ingresados.").show();
                }
                $("#formusuarioPassword").modal("hide");
                return;
            })
            .fail(function ajaxError(e) {
                console.log(e);
            })
            .always(function ajaxSiempre() {
                console.log('Final de la llamada ajax.');
            })
        return false;
    }
</script>