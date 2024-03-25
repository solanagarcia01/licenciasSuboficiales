<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Proyecto Final</title>

        <header>
            <img class="Logo" src="https://www.cge.mil.ar/cge2020/wp-content/uploads/2020/04/Mesa-de-trabajo-1@3x.png" alt="Logo" style="height: 100px; ">
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <a class="nav-link bar" href="\" onclick="mostrarSeccion('usersLicencias'); return false;">Cargá tu Licencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bar"  aria-current="page" href="\TablaLicencias" onclick="mostrarSeccion('TablaLicencias'); return false;">Licencias Cargadas</a>
                </li>
            </ul>
        </header>

    
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/jtable@2.6.0/lib/themes/metro/blue/jtable.min.css" rel="stylesheet">

    </head>
    <body>

        <div id="licenciasCargadas"></div>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jtable@2.6.0/lib/jquery.jtable.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <script>
        
            $(document).ready(function () {
        
            $.ajax({
                url: window.location.origin+'/img/preloader.gif',
                type:'HEAD',
                error: function()
                {
                    $("div .jtable-busy-message").css('background',"url('http://imgfz.com/i/okEmX14.gif') no-repeat");
                },
                success: function()
                {
                }
            });
        
            $('#licenciasCargadas').jtable({
                title: 'Tabla Licencias',
                paging: true,
                pageSize: 10,
                sorting: true,
                async: true,
                defaultSorting: 'fechaInicio',
                actions: {
                    listAction: function (postData, jtParams) {
                        return $.Deferred(function ($dfd) {
                            $.ajax({
                                type: 'GET',
                                url: 'http://localhost:5800/',
                                dataType: 'json',

                                success: function (data) {
                                // Verifica que 'data.licencias' sea el arreglo que contiene los datos en tu respuesta JSON
                                $dfd.resolve({
                                    "Result": "OK",
                                    "Records": data.licencias, // Suponiendo que 'licencias' es el arreglo que contiene los datos en tu respuesta JSON
                                    "TotalRecordCount": data.licencias.length
                                });
                            },
                            error: function (data) {
                                $dfd.reject();
                            }
                        });
                    });
                },

                createAction: '/GettingStarted/CreatePerson',
                updateAction: '/GettingStarted/UpdatePerson',
                deleteAction: '/eliminar-form',
                
            /*     deleteAction:  function (postData, jtParams) {
            return $.Deferred(function ($dfd) {
                console.log(postData.record.id),
                $.ajax({
                    type: 'POST',
                    url: '/eliminar-form',
                    // Utilizar la ruta nombrada en web.php
                    data: { id: postData.record.id }, // Pasar el ID de la licencia a eliminar
                    dataType: 'json',
                    success: function (data) {
                        $dfd.resolve();
                        $('#PartesVencidos').jtable('reload'); // Recargar la tabla después de la eliminación
                    },
                    error: function () {
                        $dfd.reject();º
                    }
                });
                
            });
        }*/

            },
                fields: {
                    dni: {
                        title: 'DNI',
                        width: '5%',
                        listClass: 'text-center',
                        key: true,
                        list: true,
                        sorting: false,

                    },
                    fechaInicio:{
                        listClass: 'text-center',
                        title: 'Fecha inicio',
                        width: '10%',
                        sorting: false,
                    },
                    fechaFin: {
                        listClass: 'text-center',
                        title: 'Fecha fin',
                        width: '10%',
                        sorting: false,
                    },
                    provincia: {
                        listClass: 'text-center',
                        title: 'Provincia',
                        width: '10%',
                        sorting: false,
                    },
                    localidad: {
                        listClass: 'text-center',
                        title: 'Localidad',
                        sorting: false,
                        width: '10%',
                    },
                    direccion: {
                        listClass: 'text-center',
                        title: 'Dirección',
                        sorting: false,
                        width: '10%',
                    },
                    tipo: {
                        listClass: 'text-center',
                        width: '10%',
                        title: 'Tipo Licencia',
                        sorting: false,
                    },   
                    ordenDia: {
                        listClass: 'text-center',
                        width: '10%',
                        title: 'OD',
                        sorting: false,
                    },      
                },

            });
        
            $('#licenciasCargadas').jtable('load');
            $('#licenciasCargadas').on('click', '.jtable-toolbar-item-add-record', function () {
            // Redirigir al usuario a la vista del formulario
            window.location.href = '/'; // Reemplaza '/ruta-de-tu-formulario' con la ruta correcta de tu formulario
    });
        
    })
    </script>
    
    </body>
    
</html>