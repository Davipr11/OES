<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>Crear</title>
    <header>     
            <img src="{{asset('images.png')}}" class="rounded mx-auto d-block">
                @auth
                <div class="button-logout">
                    <a href="/logout" class="btn btn-light">cerrar sesion</a>
                </div>
                @endauth
            <div class="button-home">
                <a href="/home" class="btn btn-light">Inicio</a>
            </div>
           
    </header>
</head>
<body>
    
    <form action="/register" method="post">
    <div class="form">
        <br>
    <h3>CREAR USUARIO</h3>
        @csrf
        <div class="mb-3">
            <label for="Nombres" class="form-label">Nombres:</label>
            <input type="text" name="Nombres" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos:</label>
            <input type="text" name="Apellidos" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Tipo_documento" class="form-label">Tipo Documento:</label>
            <select name="Tipo_documento" required id="Tipo_documento" class="form-control">
            <option selected>seleccione..</option>
                <option value="1">Cedula</option>
                <option value="2">Tarjeta de identidad</option>
                <option value="3">Pasaporte</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="Documento" class="form-label">Documento:</label>
            <input type="number" name="Documento" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Fecha_nacimiento" class="form-label">Fecha nacimiento:</label>
            <input type="date" name="Fecha_nacimiento" required class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="Correo" class="form-label">Correo:</label>
            <input type="email" name="Correo" required class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="Direccion" class="form-label">Direccion:</label>
            <input type="text" name="Direccion" required class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="Tipo_Usuario" class="form-label">Tipo Usuario:</label>
            <select name="Tipo_Usuario"  required id="Tipo_Usuario" class="form-control">
                <option selected>seleccione..</option>
                <option value="1">Administrador</option>
                <option value="2">Operador</option>
                <option value="3">Operador2</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="Usuario" class="form-label">Usuario:</label>
            <input type="text" name ="Usuario" id="Usuario" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Contrasena" class="form-label">Contraseña:</label>
            <input type="password" name ="Contrasena" id="Contrasena" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="Estado" class="form-label">Estado:</label>
            <select name="Estado"  required id="Estado" class="form-control">
                <option selected>seleccione..</option>
                <option value="Habilitado">Habilitado</option>
                <option value="Suspendido">Suspendido</option>
            </select>
        </div>
        
        <input type="submit" name = "crear" value="Crear" class="btn btn-primary">
    </div>
    </form>
    
</body>
</html>