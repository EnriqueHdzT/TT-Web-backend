<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #3498db;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .content p {
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            font-size: 16px;
            color: white;
            background-color: #3498db;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            background-color: #e9e9e9;
            color: #555;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Recuperación de Contraseña</h1>
    </div>
    <div class="content">
        <h2>Hola, {{ $user->name }}</h2>
        <p>Hemos recibido una solicitud para restablecer tu contraseña.</p>
        <p>Puedes restablecer tu contraseña usando el siguiente enlace:</p>
        <a href="{{ $resetUrl }}" class="button">Recuperar contraseña</a>
        <p>Si no has solicitado restablecer tu contraseña, por favor, ignora este correo.</p>
        <p>Gracias.</p>
    </div>
    <div class="footer">
        <p>Este mensaje ha sido enviado desde nuestro sistema de recuperación de contraseñas.</p>
    </div>
</div>
</body>
</html>
