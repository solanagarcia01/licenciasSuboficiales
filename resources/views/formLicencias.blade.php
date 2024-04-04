<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Proyecto Final</title>

    <header>
        <img class="Logo" src="https://www.cge.mil.ar/cge2020/wp-content/uploads/2020/04/Mesa-de-trabajo-1@3x.png" alt="Logo" style="height: 100px; ">
        <div class="nav-bar" style="margin: 20px;">
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <a class="nav-link bar" href="\" onclick="mostrarSeccion('usersLicencias'); return false;">Cargá tu Licencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bar" aria-current="page" href="\TablaLicencias" onclick="mostrarSeccion('TablaLicencias'); return false;">Licencias Cargadas</a>
                </li>
            </ul>
        </div>
    </header>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        h3 {
            text-decoration: underline;
            color: black;
            text-align: center;
        }

        .error {
            color: red;
        }
    </style>

</head>

<body>


    <h3><strong> Licencias de Suboficiales </strong> </h3>

    <form class="row g-3" id="myForm" style="padding:10vh" ;>
        @csrf
        <div class="col-md-8">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" required>
        </div>
        <br>
        <div class="col-md-6">
            <label for="fechaInicio" class="form-label">Inicio de la licencia</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
        </div>
        <div class="col-md-6">
            <label for="echaFin" class="form-label">Fin de la licencia</label>
            <input type="date" class="form-control" id="fechaFin" name="fechaFin" required>
        </div>
        <div class="col-md-4">
            <label for="provincia" class="form-label">Provincia</label>
            <select id="provincia" class="form-select" name="provincia" required>
                <option selected disabled value="">Choose...</option>
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Ríos">Entre Ríos</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquén">Neuquén</option>
                <option value="Río Negro">Río Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago del Estero">Santiago del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucumán">Tucumán</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="localidad" class="form-label">Localidad</label>
            <input type="text" class="form-control" id="localidad" name="localidad" required>
        </div>
        </div>

        <div class="col-md-4">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        </div>

        <div class="col-md-6">
            <label for="ordenDia" class="form-label">Orden del Día (OD)</label>
            <input type="text" class="form-control" id="ordenDia" name="ordenDia" required>
        </div>
        </div>

        <div class="col-6">
            <label for='licencia' class="form-label">Seleccione el tipo de Licencia:</label>
            <select id=licencia class="form-select" name="tipo" required>
                <option selected disabled value="">Choose...</option>
                <option value="Licencia Ordinaria">Licencia Ordinaria</option>
                <option value="Licencia Extraordinaria">Licencia Extraordinaria</option>
            </select>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit" id="btnCargar">Cargar Licencia</button>
        </div>
    </form>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const inputs = document.querySelectorAll('#myForm input');
    $(document).ready(function() {
                $.validator.addMethod("fechaMenor", function(value, element, params) {
                    var fechaInicio = new Date($('#fechaInicio').val());
                    var fechaFin = new Date(value);
                    return fechaFin > fechaInicio;
                }, "La fecha debe ser mayor que la fecha de inicio.");

                $(document).ready(function() {
                    $("#myForm").validate({
                        rules: {
                            dni: {
                                required: true,
                                digits: true,
                                minlength: 7,
                                maxlength: 8,
                            },
                            fechaInicio: {
                                required: true,
                                date: true
                            },
                            fechaFin: {
                                required: true,
                                date: true,
                            },
                            provincia: {
                                required: true,
                            },
                            localidad: {
                                required: true,
                                letras: true,
                            },
                            direccion: {
                                required: true,
                                // alphanumeric: true
                            },
                            od: {
                                required: true,
                                minlength: 6,
                                maxlength: 10,
                            },
                            tipoLicencia: {
                                required: true
                            }
                        },
                        messages: {
                            dni: {
                                required: "El DNI es obligatorio",
                                minlength: "El DNI debe tener entre 7 y 8 dígitos",
                                maxlength: "El DNI debe tener entre 7 y 8 dígitos",
                                digits: "El DNI debe contener solo números"
                            },
                            nombre: {
                                required: "El Nombre es obligatorio",
                                letras: "El Nombre debe contener solo letras."
                            },
                            apellido: {
                                required: "El Apellido es obligatorio",
                                letras: "El Apellido debe contener solo letras."
                            },
                            provincia: {
                                required: "La Provincia es obligatoria",
                            },
                            localidad: {
                                required: "La Localidad es obligatoria",
                                letras: "La Localidad debe contener solo letras."
                            },
                            direccion: {
                                required: "La Dirección es obligatorio",
                                // alphanumeric: "La Dirección debe contener solo letras y números."
                            },
                            fechainicio: {
                                required: "La fecha de inicio de la licencia es obligatoria",
                                date: "La fecha de inicio de la licencia debe ser una fecha válida"
                            },
                            fechafin: {
                                required: "La fecha de finalización de la licencia es obligatoria",
                                date: "La fecha de finalización de la licencia debe ser una fecha válida"
                            },
                            od: {
                                required: "La OD es obligatoria.",
                                minlength: "La OD debe contener al menos 6 caracteres.",
                                maxlength: "La OD debe no debe contener más de 10 caracteres."
                            },
                            tipoLicencia: {
                                required: "Debe seleccionar una opción de licencia"
                            }

                        },
                    });

                    // Regla de validación personalizada para letras
                    $.validator.addMethod("letras", function(value, element) {
                        return this.optional(element) || /^[a-zA-Z]+$/.test(value);
                    });
                });

                $('#btnCargar').click(function(e) {
                    e.preventDefault();
                    var formData = $('#myForm').serialize();
                    console.log(formData);
                    $.ajax({
                        method: 'POST',
                        url: 'http://localhost:5800/insert',
                        dataType: 'json',
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            Swal.fire({
                                icon: "success",
                                title: "¡Licencia Cargada!",
                                text: "Formulario enviado con éxito",
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Hubo un error al enviar los datos: ' + error);
                        }
                    });
                });
            });
</script>