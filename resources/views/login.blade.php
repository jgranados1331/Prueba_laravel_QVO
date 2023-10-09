<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="body-login">
    <div class="container_all">
    <div class="conteiner">
    <div class="cont_form">
        <div class="name_proyect"><p>Inicio de sesion</p></div>
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <form action="/login" method="POST" class="form">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Usuario o correo electronico</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contrasena</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesion</button>
        </form>
        <div>
            <p style="color:white; font-weight:600;">No tienes cuenta? <a style="color:orange;" href="/register">Registrate</a></p>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>
</html>
