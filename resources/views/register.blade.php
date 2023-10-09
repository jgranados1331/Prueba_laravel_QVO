<body class="body-reg">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="conteiner-all-signup">
        <div class="conteiner-color-home">
            <div class="title-signup">Registro</div>
            <div class="signup">
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Verificar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    </div>
                <button type="submit" class="btn btn-primary">Crear cuenta</button>
            </form>
        </div>
        <div class="conteiner-none"></div>
    </div>
</body>