<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();
session_start();
if($_SESSION['admin'] = 1){

$activo = 1;

$control_usuarios = $con->prepare("SELECT id, name FROM usuarios WHERE activo=:mi_activo AND admin = '0' ORDER BY id ASC");
$control_usuarios->execute(['mi_activo' => $activo]);
$usuarios = $control_usuarios->fetchAll(PDO::FETCH_ASSOC);

?>

</html>
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
        <h2 class="text-center color-primary">Crea tu nuevo mensaje</h2>
        <section id="form">
            <h2>Ingresa los datos de tu mensaje: </h2>
            <div class="flex" data-state="column vertical-center user-list form-adapt" >
                
                <div class="form-box">
                    <form class="flex" data-state="column" action="config/save/mensaje.php" method="POST" autocomplete="off">
                        <label for="usuario">A quién va tu mensaje</label>
                        <div class="select">
                            <select id="usuario" name="usuario">
                                <?php foreach($usuarios AS $row){?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <label for="asunto">Asunto</label>
                        <input type="text" id="asunto" name="asunto" autofocus required>
                        <label for="mensaje">Mensaje</label>
                        <input type="text" id="mensaje" name="mensaje">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha">
                        <div class="flex" data-state="warp">
                            <button class="btn text-center"><a  href="dashboard-admin.php">Regresar</a></button>
                            <button class="btn text-center" type="submit">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

<?php }else { header("location:dashboard-admin.php");} ?>