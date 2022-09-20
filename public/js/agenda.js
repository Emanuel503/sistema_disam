document.addEventListener('DOMContentLoaded', function () {

    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    var ruta = loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {

        locale: "es",
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: ruta + "calendario",
        eventDisplay: 'block',
        eventBorderColor: '#D0D0D0',
            
        eventClick: function (info) {

            if(info.event.title == "Registro de salida"){
                $("#salida").modal("show");
                document.formularioSalida.id.value = info.event.id;
                document.formularioSalida.title.value = info.event.title;
                document.formularioSalida.fecha.value = info.event.extendedProps.fecha;
                document.formularioSalida.hora_inicio.value = info.event.extendedProps.hora_inicio;
                document.formularioSalida.hora_final.value = info.event.extendedProps.hora_final;
                document.formularioSalida.objetivo.value = info.event.extendedProps.objetivo;
                document.getElementById('enlaceSalida').setAttribute('href', ruta + 'registros-salida/' + info.event.id);
            }else if(info.event.title == "Solicitud Sala"){
                $("#solicitudSala").modal("show");
                document.formularioSolicitudSala.id.value = info.event.id;
                document.formularioSolicitudSala.title.value = info.event.title;
                document.formularioSolicitudSala.fecha.value = info.event.extendedProps.fecha;
                document.formularioSolicitudSala.hora_inicio.value = info.event.extendedProps.hora_inicio;
                document.formularioSolicitudSala.hora_finalizacion.value = info.event.extendedProps.hora_finalizacion;
                document.formularioSolicitudSala.actividad.value = info.event.extendedProps.actividad;
                document.getElementById('enlaceSolicitudSala').setAttribute('href', ruta + 'solicitudes-sala/' + info.event.id);   
            }else{
                $("#actividad").modal("show");
                document.formularioActividad.id.value = info.event.id;
                document.formularioActividad.title.value = info.event.title;
                document.formularioActividad.fecha.value = info.event.extendedProps.fecha_inicio + ' - ' + info.event.extendedProps.fecha_finalizacion;
                document.formularioActividad.hora.value = info.event.extendedProps.hora_inicio + ' - ' + info.event.extendedProps.hora_finalizacion;
                document.formularioActividad.objetivo.value = info.event.extendedProps.objetivo;
                document.formularioActividad.observaciones.value = info.event.extendedProps.observaciones;
                document.getElementById('enlaceActividad').setAttribute('href', ruta + 'actividades/' + info.event.id);
            }
        }
    });
    calendar.render();
});