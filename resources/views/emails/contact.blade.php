<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Mensaje de {{config('app.name', 'Tienda en linea')}}
    </h1>
    <p><strong>Nombre Completo: {{$contact_first_name}}</strong></p><br>
    <p><strong>Teléfono: {{$contact_phone}}</strong></p><br>
    <p><strong>Correo Electrónico: {{$contact_email_address}}</strong></p><br>
    <p><strong>Asunto: {{$contact_subject}}</strong></p><br>
    <p><strong>Mensaje: {{$contact_mensaje}}</strong></p><br>
</body>
</html>