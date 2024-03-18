<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-5/bootstrap-5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f0f0f0;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        /* Estilo para el loader */
        #loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Iniciar Sesión</div>
                    <div class="card-body">
                        <!-- Loader -->
                        <div id="loader" style="display: none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <form action="#" method="POST" id="formusuario">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" onKeyUp="this.value=this.value.toUpperCase()" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" onClick="buscar()" id="btn-login">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        $("#mensajeError").hide();
    });

    $("#formusuario").validate({
        rules: {
            usuario: {
                required: true,
                minlength: 4,
                maxlength: 15
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            usuario: "El campo usuario no es válido.",
            password: "Tu contraseña debe tener al menos 8 caracteres."
        },
        errorElement: "div",
        errorLabelContainer: ".alert-danger"
    });

    function buscar() {
        if (!$('#formusuario').valid()) {
            return;
        }

        var data_form = {
            usuario: $("#usuario").val(),
            password: $("#password").val()
        };

        $("#mensajeError").hide();
        $("#loader").show();
        $("#btn-login").prop("disabled", true);

        $.ajax({
                type: 'POST',
                url: './php/procesar_login.php',
                data: data_form,
                dataType: 'json',
                async: true,
            })
            .done(function(res) {
                console.log(res);
                if (res.resultado == 0) {
                    // Mostrar SweetAlert en caso de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de inicio de sesión',
                        text: res.mensaje
                    });
                    $("#loader").hide();
                    $("#btn-login").prop("disabled", false);
                } else {
                    window.location = res.redirect;
                }
            })
            .fail(function(error) {
                console.log(error);
            });
    }
</script>
