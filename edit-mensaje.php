<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];
$user_id = $_GET['user_id'];
$activo = 1;



$query = $con->prepare("SELECT asunto, mensaje, fecha, user_id FROM mensajes WHERE id = :id AND activo=:activo");
$query->execute(['id' => $id, 'activo' => $activo]);
$num = $query->rowCount();

$control_usuarios = $con->prepare("SELECT name FROM usuarios WHERE activo=:mi_activo AND id=:mi_user AND admin = '0' ORDER BY id ASC");
$control_usuarios->execute(['mi_activo' => $activo, 'mi_user' => $user_id]);
$usuario = $control_usuarios->fetch(PDO::FETCH_ASSOC);

if ($num > 0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: dashboard-admin.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                    <li><a href="index.php">Dashboard</a></li>
                </div>
            </ul>
            </nav>
    </header>

    <div class="dashboard-container text-justify first">
        <h2 class="text-center color-primary">Edita tu mensaje</h2>
        <section id="form">
            <h2>Ingresa los datos de tu mensaje: </h2>
            <div class="flex" data-state="column vertical-center user-list form-adapt" >
                
                <div class="form-box">
                    <form class="flex" data-state="column" action="config/save/mensaje.php" method="POST" autocomplete="off">
                        <label for="asunto">Usuario: <?php echo $usuario['name']?></label>
                        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                        <label for="asunto">Asunto</label>
                        <input type="text" id="asunto" name="asunto" value="<?php echo $row['asunto']?>" autofocus required>
                        <label for="mensaje">Mensaje</label>
                        <input type="text" id="mensaje" name="mensaje" value="<?php echo $row['mensaje']?>">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha']?>">
                        <div class="flex" data-state="warp">
                            <button class="btn text-center"><a  href="dashboard-admin.php">Cancelar</a></button>
                            <button class="btn text-center" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>