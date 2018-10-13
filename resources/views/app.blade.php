<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <div id="app">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Register</a>
                        @endif
                    </div>
                @endif

                <div>
                    <ul>
                        <li v-for="user in users">
                            @{{ user.name }} - @{{ user.email }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
        <script>
            var socket;
            new Vue({
                el: '#app',
                data: {
                    users: [
                        { name: 'Diego Ramirez', email: 'dramirez@gmail.com' }
                    ]
                },
                mounted() {
                    var self = this;
                    socket = io('http://broadcast.test:3000');
                    //Detecta cuando se conecta al servidor
                    socket.on('connect', function() {
                        console.log('Conectado al servidor');
                    });
                    socket.on('test-chanel:UserRegistered', function(message) {
                        console.log(message);
                        self.users.push(message.user);
                    });
                    socket.on('enviarMensaje', function(message) {
                        console.log(message);
                    });
                }
            })
        </script>
    </body>
</html>
