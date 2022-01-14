<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script>

    $(document).ready(function() {

      var calendar = $('#calendar').fullCalendar({
       header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      }, 

      locale: 'es',
      events: '<?php echo site_url("ReservacionController/reservacion") ?>',

      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many event
      selectable:true,
      droppable: true,
      editable: true,


      //al click desplega modal
      dayClick: function(date, jsEvent, view) {
       $('#modalAdd').modal('open');
     },//fin eventClick


     //metodo insertar
    select: function(start, end, allDay){
       alert('Fecha Seleccionada: ' + date.format());
      
      $('#btnEnviar').click(function(){
      var id_habitacion = $('#txtid_hab').val();
      var title = $('#txttitulo').val();
      var color = $('#txtcolor').val();
      var start = $('#txtstart').val();
      var end = $('#txtend').val();
      var id_estado_reserva = $('#txtid_estado_reserva').val();
      var nombre_cliente = $('#txtnombre_cliente').val();
      var id_estado_pago = $('#txtid_estado_pago').val();
      if (!confirm("Desea agregar la reservacion ")) {
        reverFunc();
      }else{
      $.post("<?php echo base_url(); ?>ReservacionController/insertReserv",
      {
        id_habitacion:id_habitacion,
         title:title,
         color:color,
         start:start,
         end:end,
         id_estado_reserva:id_estado_reserva,
         nombre_cliente:nombre_cliente,
         id_estado_pago:id_estado_pago
      },
       function(data){
        if (data==1) {
          alert('Reservacion agregada correctamente');
        }else{
          alert('Algo fallo!');
        }
      })

      }
      })
      
  
    },// fin insert

    //Metodo para actualizar las fechas arrastrandolas
    eventDrop: function(event, delta, reverFunc){
      
      var id = event.id;
      var start = event.start.format();
      var end = event.end.format();
      if (!confirm("Desea realizar los cambios a "+event.title)) {
        reverFunc();
      }else{
       $.post("<?php echo base_url("ReservacionController/UpdateReserv") ?>",
       {
        id: id,
        start: start,
        end: end
      },
      function(data){
        if (data == 1) {
          alert('fechas actualizadas correctamente');
        }

      });
     }
     
      },//fin de eventDrop

      //metodo para cambiar el tamaño de las reservaciones
      eventResize: function(eventResizeInfo) {
        alert(eventResizeInfo.event.title + " empiezas " + eventResizeInfo.event.start.toISOString());

        if (!confirm("is this okay?")) {
          eventResizeInfo.revert();
        }
    },//fin eventResize

    //Metodo para eliminar
    eventRender: function(event, element,reverFunc){
      var el = element.html();
      element.html("<div style='float:left;width:60%;'>"+ el + "</div><div style='text-align:right;color:#eb3d34;' class='close'><i class='material-icons'>delete_forever</i></div>");

      element.find('.close').click(function(){

        if (!confirm("Esta seguro de eliminar esta Reservacio?")) {
         reverFunc();
       }else{
        var id = event.id;
        $.post("<?php echo base_url(); ?>ReservacionController/DeleteReserv",
        {
          id: id
        },
        function(data){
          if (data== 1) {
            $('#calendar').fullCalendar('removeEvents', event.id);
            alert('Eliminado correctamente');
          }else{
            alert("Error");
          }
        });
        
      }

    });


     

    },//fin event render

     //al clickear cada reservacion se despliega el modal para editar
    eventClick: function(event,jsEvent,info){

       if (!confirm("Desea editar la reservacion "+event.title)) {
        reverFunc();
      }else{
       
       // $('#modalEdit').modal('open');
       
      var id =$('#txtid').val(event.id);
      var id_habitacion = $('#txid_habitacion').val();
      var title = $('#txttitle').val(event.title);
      var color = $('#txcolor').val(event.color);
      var color = $('#txcolor').val(event.color);
      var starts = $('input[name=start').val(event.start.format('YYYY-MM-DD'));
      var ends = $('input[name=end').val(event.end.format('YYYY-MM-DD'));
     // var id_estado_reserva = $('#txid_estado_reserva').val(event.extraParams.id_estado_reserva);
     //var nombre_cliente = $('input[name=nombre_cliente').val(info.event.extendedProps.nombre_cliente);
     // var id_estado_pago = $('#txid_estado_pago').val(); 
     //var start = $('#txstart').val(end).format('yyy-MM-ddThh:mm:ss');

      $('#modalEdit').modal('open');
     
        
      }  
    },// fin event Click 

   });//fin fullcalendar

    });

  </script>
  <style>

    #calendar {
      max-width: 900px;
      margin: 0 auto;
    }

  </style>
</head>
<body>

  <div id='calendar'></div>


  <?php  
  include('modalAdd.php');
  include('modalEdit.php');
  ?>

</body>
</html>