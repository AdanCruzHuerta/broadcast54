## Tiempo real en Laravel 5.4, Socket.io y Redis.

#### Pasos para la implementación 
Aplicación de ejemplo de tiempo real con Laravel y alternativa a Pusher.

- Tener instalado y corriendo un servidor de redis en nuestro servidor
- Instalar los siguientes requerimientos:
  - predis/predis (composer)
  - socket.io, ioredis (npm)
  - Libreria de socket.io cliente socket.io-client (npm) o [CDN](https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js)
 - Agregar el driver 'redis' en config/broadcasting.php
