<?php
session_start();

function randomPassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }
    return $password;
}

// Inicializar variables
$error = false;

// Comprueba si la contraseña ha sido generada
if(!isset($_SESSION['generatedPassword'])) {
    // Si no ha sido generada, genera una nueva contraseña
    $_SESSION['generatedPassword'] = randomPassword();
}

if ($_POST) {
    // Recibe información del formulario HTML
    $nombre = $_POST['txtNombre'];
    $contrasenaIngresada = $_POST['txtContrasena'];

    if ($contrasenaIngresada === $_SESSION['generatedPassword']) {
        // Asegúrate de proporcionar una ubicación válida para la redirección
        header('Location: ../Inicio/index.html');
        exit;
    } else {
        $error = true;
        // Si la contraseña es incorrecta, genera una nueva
        $_SESSION['generatedPassword'] = randomPassword();
    }
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocDesk</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="submit"] {
            width: 250px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        #randomPassword {
            margin-top: 10px;
        }

        #generatedPassword {
            font-size: 14px;
            margin-top: 5px;
            color: #333;
        }
    </style>    
</head>
<body>
    <div class="form-container">
        <h1>Bienvenido a DocDesk</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="txtNombre">Usuario:</label>
            <input type="text" name="txtNombre" id="txtNombre">
            <br/>
            <label for="txtContrasena">Contraseña:</label>
            <input type="password" name="txtContrasena" id="txtContrasena">
            
            <?php
            if ($error) {
                echo '<p style="color: red;">La contraseña ingresada es incorrecta</p>';
            }
            ?>

            <p>Contraseña generada: <?php echo $_SESSION['generatedPassword']; ?></p>

            <br/>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>