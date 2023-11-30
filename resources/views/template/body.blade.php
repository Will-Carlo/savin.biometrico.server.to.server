<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOMÉTRICO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    /* Estilos adicionales si es necesario */
    body, html {
      height: 100%;
    }
    .bootstrap-remove-all {
        all: unset !important;
      }
  </style>
</head>
<body>

@yield('content')
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.36/moment-timezone-with-data.min.js"></script>

<script>
    function mostrarFechaHoraBolivia() {
        // Obtener la hora actual en la zona horaria de Bolivia
        let horaBolivia = moment().tz('America/La_Paz').format('DD-MM-YYYY HH:mm:ss');

        // Mostrar la hora y fecha de Bolivia en el elemento con ID 'fechaHora'
        document.getElementById('timeSavin').innerHTML = horaBolivia;
    }

    // Actualizar la hora y fecha cada segundo
    setInterval(mostrarFechaHoraBolivia, 1000);

    // Mostrar la hora y fecha al cargar la página
    mostrarFechaHoraBolivia();
</script>



</body>
</html>