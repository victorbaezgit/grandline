<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td,th{
            border: 1px solid black;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Listado Usuarios</h1>
<table style="border: 1px solid black;text-align: center;width: 100%">
    <thead>
    <tr><th>ID</th><th>Nombre</th> <th>Apellidos</th> <th>Email</th> <th>Rol</th> </tr>
    </thead>
    <tbody>
    @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id}}</td>
            <td>{{ $usuario->name}}</td>
            <td>{{ $usuario->surname}}</td>
            <td>{{ $usuario->email}}</td>
            <td>{{ $usuario->roles->first()->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
