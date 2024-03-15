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
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">

    </head>
    <body>

        <div id="licenciasCargadas" style="margin: 0 auto; width: 80%;"></div>
    
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jtable@2.6.0/lib/jquery.jtable.min.js"></script>
    
    
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
            paging: true,
            pageSize: 10,
            sorting: true,
            async: true,
            defaultSorting: 'nroOrden',
            actions: {
                listAction: function (postData, jtParams) {
                    return $.Deferred(function ($dfd) {
                        $.ajax({
                            type: 'POST',
                            url: '/usersLicencias',
                            dataType: 'json',
                            async: true,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            dataType: 'json',
                            data: {
                                jtStartIndex: (jtParams.jtStartIndex),
                                jtPageSize: jtParams.jtPageSize,
                                jtSorting: jtParams.jtSortingartIndex,
                                idEstado: 2,
                                buscar: $('#buscar').val()
                            },
                            success: function (data) {
                                $dfd.resolve(data);
    
                            },
                            error: function (data) {
                                $dfd.reject();
                            }
                        });
                    });
                }
            },
            fields: {
                dni: {
                    title: 'DNI',
                    width: '10%',
                    key: true,
                    list: true,
                    sorting: false,
                },
                apellido: {
                    title: 'Apellido',
                    listClass: 'text-center',
                    width: '15%',
                    sorting: false,
                },
                nombre: {
                    title: 'Nombre',
                    listClass: 'text-center',
                    sorting: false,
                },
                fechainicio:{
                    listClass: 'text-center',
                    title: 'Fecha inicio',
                    width: '18%',
                    sorting: false,
                },
                fechafin: {
                    listClass: 'text-center',
                    title: 'Fecha fin',
                    width: '15%',
                    sorting: false,
                },
                provincia: {
                    listClass: 'text-center',
                    title: 'Provincia',
                    width: '20%',
                    sorting: false,
                },
                localidad: {
                    listClass: 'text-center',
                    title: 'Localidad',
                    sorting: false,
                    width: '14%',
                },
                direccion: {
                    listClass: 'text-center',
                    title: 'Dirección',
                    sorting: false,
                    width: '18%',
                },
                cie: {
                    listClass: 'text-center',
                    width: '3%',
                    title: 'CIE',
                    sorting: false,
                },
                gestion: {
                    listClass: 'text-center',
                    sorting: false,                        
                    width: '20%',
                    display: function (data) {
                        if (data.record.fechaActa == null && data.record.fechaInformacion == null){
                            var color = 'black';
                        }else if (data.record.fechaActa != null && data.record.fechaInformacion == null){
                            var color = 'orangered';
                        } else { 
                            var color = 'green';
                        }
                        if(data.record.permisos[0] == "N3" || data.record.permisos[0] == "N2"){
                            return '<button data-idparte="'+data.record.id+'" data-idparteoriginal="'+data.record.idParteEnfermo+'" data-dni='+data.record.dni+' data-tipo="C" data-tipoparte="'+data.record.tipoParte+'" data-title="Altas" id="botonVencido" class="btn btn-sm btn-default btn-alta"><i class="fas fa-clock"></i></button><button data-dni='+data.record.dni+' data-idparte="'+data.record.id+'" data-idparteoriginal="'+data.record.idParteEnfermo+'" data-tipoparte="'+data.record.tipoParte+'" data-title="Ampliación" id="ampliar" class="btn btn-sm btn-default btn-ampliar"><i class="fas fa-stethoscope"></i></button><button data-idparteoriginal="' + data.record.idParteEnfermo + '" id="acta" data-title="Acta/Información" class="btn btn-sm btn-default btn-acta"><i style="color: '+color+'" class="fas fa-clipboard"></i></button><button data-idparteoriginal="'+data.record.idParteEnfermo+'" data-dni='+data.record.dni+' data-title="Historial" class="btn btn-sm btn-default btn-cerrado"><i class="fas fa-list"></i></button>'
                        }
                    }
                }        
            },
            rowInserted: function (event, data) {
                if (data.record) {
                    if(data.record.idEstado == 'Cerrado/AD'){
                        if(data.record.diasFinHastaLaFecha >= 15 && data.record.diasFinHastaLaFecha < 30){
                            data.row.css("background","#fff3cd");
                        } else if(data.record.diasFinHastaLaFecha >= 30 && data.record.diasFinHastaLaFecha < 45){
                            data.row.css("background","#6DA4BD");
                        }else if ( data.record.diasHastaLaFecha > 45 ) {
                            data.row.css("background","#DB7377");
                        }
                    }else{
    
                        if(data.record.diasDesdeHastaLaFecha >= 30 && data.record.diasDesdeHastaLaFecha <45){
                            data.row.css("background","#6DA4BD");
                        }else if(data.record.diasDesdeHastaLaFecha > 45){
                            data.row.css("background","#DB7377");
                        }else if ( data.record.diasDesdeHastaLaFecha >=15 && data.record.diasDesdeHastaLaFecha <30 ) {
                            data.row.css("background","#fff3cd");
                        }
                    }
                }
            }
        });
    
        $('#tablaLicencias').jtable('load');
    
        $('#buscar').keyup(function(e){
            if(e.keyCode == 13)
            {
                $('#tablaLicencias').jtable('load', {
                    buscar: $('#buscar').val(),
                });
            }
        });
    
        $('#lupita').click(function () {
            $('#tablaLicencias').jtable('load', {
                buscar: $('#buscar').val(),
                idEstado: $('#estado').val(),
            });
        });
    
        $('#limpiar').click(function () {
            $("#lupita" ).css( "background-color","white");
            $("#buscar" ).css( "border-right-color","white");
            $("#lupita" ).css( "border-color","");
            $("#lupitaIcono" ).css( "color","");
            $('#buscar').val("");
            $('#estado').val("Todos");
            $('#tablaLicencias').jtable('reload');
        });
    
        $(document).on("click", '.btn-vencido',function(){
            var parte = $(this).closest('tr').find('.btn-vencido');
            var idParte = parte.data("idparte");
            var dniParte = parte.data("dni");
            var tipo = parte.data("tipo");
            var tipoParte = parte.data("tipoparte");
            var idParteOriginal = parte.data("idparteoriginal");
            $('#altaAnt').modal({
                backdrop: 'static',
                keyboard: false,
                refresh: true
            });
            $.ajax({
                type: 'POST',
                url: '/editarPartes',
                async: true,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: {
                    id: idParteOriginal,
                    tipoParte: "P"
                },
                success: function (datos) {
                    var armaEsp = "";
                    if(datos.armaEsp != null){
                        armaEsp = datos.armaEsp;
                    }
                    $('#causanteAlta').text(datos.grado + ' ' + armaEsp + ' ' + datos.apellido + ' ' + datos.nombre);
                    $('#fecha_inicio_Alta').val(datos.fechaDesde);
                    $('#lugarAlta').val(datos.lugar);
                },
            })
    
            $('#guardarAlta').attr('data-id',idParteOriginal);
            $('#guardarAlta').attr('data-dni',dniParte);
            $('#guardarAlta').attr('data-tipo',tipo);
    
        });
    
        $('#tablaLicencias').jtable('load');
    
        })
            </script>
    
    </body>
    
</html>