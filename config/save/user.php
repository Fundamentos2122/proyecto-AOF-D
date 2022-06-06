<?php

require '../database.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

    $level = $_GET['level'];
    if($level <= 2){   
        $type = 3;
    } else if($level <= 4){ 
        $type = 2;
    } else if($level == 5){ 
        $type = 1;
    }
    $name = $_POST['name'];
    $username = $_POST['user'];
    $password = $_POST['psw'];

    $query = $con->prepare("INSERT INTO usuarios (username, password, name, type, activo) VALUES (:usr, :psw, :nam, :typ, 1)");
    $resultado = $query->execute(array('usr' => $username, 'psw' => $password, 'nam' => $name, 'typ' => $type));

    if($resultado){
        $correcto = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar bg-primary">
            <!-- LOGO -->
            <div class="logo">Money Me</div>
            <!-- NAVIGATION MENU -->
            <ul class="nav-links">
                <input type="checkbox" id="checkbox_toggle" />
                <label for="checkbox_toggle" class="hamburger">&#9776;</label>
                <!-- NAVIGATION MENUS -->
                <div class="menu">
                    <li><a href="../../index.php">inicio</a></li>
                </div>
            </ul>
            </nav>
    </header>

    <div class="dashboard-container text-justify first">
        <h2 class="text-center color-primary">Registro de usuario.</h2>
        <section id="form">
            <?php if ($correcto) { ?>
                 <h2>Tu usuario fue guardado exitosamente. </h2>
            <?php } else {?>
                 <h2>Tu usuario no fue guardado exitosamente. </h2>
            <?php }?>
            <div class="flex" data-state="column vertical-center user-list form-adapt" >  
                <div class="form-box">
                    <p>Vuelve al inicio para iniciar sesión.</p>
                <button class="btn text-center" type="submit"><a href="../../index.php">Regresar</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>