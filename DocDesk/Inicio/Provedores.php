<div class="proveedor-buttons">
  <?php
  // Definir un array con la información de cada proveedor
  $proveedores = array(
    array(
      'url' => '../Provedores/Estudio.html',
      'imagen' => 'Imagenes/descarga.jpg',
      'nombre' => 'Proveedor Estudios'
    ),
    array(
      'url' => '../Provedores/Maquinaria.html',
      'imagen' => 'Imagenes/OIP (1).jpg',
      'nombre' => 'Proveedor Maquinaria'
    ),
    array(
      'url' => '../Provedores/Medicamento.html',
      'imagen' => 'Imagenes/OIP.jpg',
      'nombre' => 'Proveedor Medicina'
    ),
    array(
      'url' => 'https://calendar.google.com/calendar/u/0?cid=YzhmN2M3OWEyZjRjMWUxOWU5NmU4ZTQ0MTM4ZmMyMGIzZjIxMzEwZjY3YmFiODM5ODQ3N2UwYWY3ZDUzY2M5YkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t',
      'imagen' => 'Imagenes/agenda.jpg',
      'nombre' => 'Agenda'
    )
    
    // Agrega más proveedores aquí
  );

  // Recorrer el array de proveedores para generar los botones
  foreach ($proveedores as $proveedor) {
    $url = $proveedor['url'];
    $imagen = $proveedor['imagen'];
    $nombre = $proveedor['nombre'];
  
    if ($url === 'https://calendar.google.com/calendar/u/0?cid=YzhmN2M3OWEyZjRjMWUxOWU5NmU4ZTQ0MTM4ZmMyMGIzZjIxMzEwZjY3YmFiODM5ODQ3N2UwYWY3ZDUzY2M5YkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t') {
      echo '<a href="' . $url . '" target="_blank" class="button">';
      echo '<img src="' . $imagen . '" alt="Imagen">';
      echo $nombre;
      echo '</a>';
    } else {
      echo '<a href="' . $url . '" class="button">';
      echo '<img src="' . $imagen . '" alt="Imagen">';
      echo $nombre;
      echo '</a>';
    }
  }
  
  ?>
</div>

<script>
  // JavaScript para hacer que las imágenes se vayan mostrando automáticamente
  var botones = document.getElementsByClassName('button');
  var index = 0;

  function mostrarSiguienteImagen() {
    // Ocultar todos los botones
    for (var i = 0; i < botones.length; i++) {
      botones[i].style.display = 'none';
    }

    // Mostrar el siguiente botón
    botones[index].style.display = 'block';

    // Actualizar el índice para mostrar el siguiente botón en la siguiente llamada
    index = (index + 1) % botones.length;

    // Llamar a la función nuevamente después de 3 segundos
    setTimeout(mostrarSiguienteImagen, 3000); // Cambiar el tiempo en milisegundos según lo necesites
  }

  // Iniciar el ciclo de mostrar imágenes automáticamente
  mostrarSiguienteImagen();
</script>