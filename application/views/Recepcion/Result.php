
<table id="datatable" >
  <tbody class="responsive"> 
   <?php   foreach ($hab as $h):?>
     <tr>      
      <td><?=$h->nombre_habitacion;?></td>

      <?php $estado= $h->estado_habitacion;
      switch ($estado){
        case 'disponible' : $color = '#6ae689'; break;
        case 'Disponible' : $color = '#6ae689'; break;
        case 'Reservada' : $color = '#f74c31'; break;
        case 'reservada' : $color = '#f74c31'; break;  
        default: $color = 'white';
      } ?>
      <td style="background-color:<?php echo $color ?>; text-align: left; width: 50px; ">
       <?=$h->estado_habitacion;?>
     </td>
     <td><?=$h->tipo_habitacion;?></td>
     <td><?=$h->nombre_nivel;?></td>
     <td>
      <a href="<?=base_url().'RecepcionController/editar/'.$h->id_habitacion?>" class=" tooltipped" data-position="left" data-tooltip="Alojar"><i  class="material-icons ">add_circle</i></a>
    </td>
  </tr>
<?php endforeach ?>
</tbody>
</table>

