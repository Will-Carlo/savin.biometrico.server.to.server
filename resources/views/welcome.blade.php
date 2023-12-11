<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Ejemplo de un botón en una vista de Blade -->
<button id="encenderBtn">Encender</button>

</body>

@vite('resources/js/app.js')
<script>
  setTimeout(() => {
    window.Echo.channel('wsverify')
      .listen('.wsverify', (e)=> {
        console.log(e);
      });
  }, 200);
</script>

<script>
    const encenderBtn = document.getElementById('encenderBtn');
    encenderBtn.addEventListener('click', () => {
        // Datos a enviar en formato JSON
        const data = {
            // Aquí puedes agregar los datos que deseas enviar
            "estado": "encendido",
            "informacion": "..."
            // ... otros datos
        };

        // Conexión WebSocket
        const webSocket = new WebSocket('ws://localhost:6001'); // Reemplaza con tu URL de WebSockets

        webSocket.addEventListener('open', () => {
            console.log('Conexión establecida con el servidor WebSocket');
            // Envío del JSON al servidor
            webSocket.send(JSON.stringify(data));
        });

        webSocket.addEventListener('message', (event) => {
            console.log('Mensaje recibido del servidor:', event.data);
            // Manejo de mensajes recibidos desde el servidor (si es necesario)
        });

        webSocket.addEventListener('error', (error) => {
            console.error('Error en la conexión WebSocket:', error);
            // Manejo de errores en la conexión WebSocket
        });
    });
</script>



</html>