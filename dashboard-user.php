<?php

require 'config/database.php';

session_start();
if(isset($_SESSION["username"])){



$db = new Database();
$con = $db->conectar();

$activo = 1;


$control_ahorros = $con->prepare("SELECT id, concepto, ahorrado, objetivo FROM ahorros WHERE activo=:mi_activo AND user_id=:mi_user ORDER BY id ASC");
$control_ahorros->execute(['mi_activo' => $activo, 'mi_user' => $_SESSION['id']]);
$ahorros = $control_ahorros->fetchAll(PDO::FETCH_ASSOC);

$control_metas = $con->prepare("SELECT id, titulo, descripcion, ahorrado, fecha FROM metas WHERE activo=:mi_activo AND user_id=:mi_user ORDER BY id ASC");
$control_metas->execute(['mi_activo' => $activo, 'mi_user' => $_SESSION['id']]);
$metas = $control_metas->fetchAll(PDO::FETCH_ASSOC);

$control_mensajes = $con->prepare("SELECT id, asunto, mensaje, fecha FROM mensajes WHERE activo=:mi_activo AND user_id=:mi_user ORDER BY id ASC");
$control_mensajes->execute(['mi_activo' => $activo, 'mi_user' => $_SESSION['id']]);
$mensajes = $control_mensajes->fetchAll(PDO::FETCH_ASSOC);

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
                    <li><a href="index.php">Inicio</a></li>
                    <li class="services">
                        <a href="/">Dashboard</a>
                        <ul class="dropdown">
                            <li><a href="#ahorros">Ahorros</a></li>
                            <li><a href="#metas">Metas</a></li>
                            <li><a href="#alertas">Alertas</a></li>
                        </ul>
                    </li>
                    <li class="services">
                        <a>User</a>
                        <ul class="dropdown">
                            <li><a href="index.php">Log out</a></li>
                        </ul>
                    </li>
                </div>
            </ul>
            </nav>
    </header>

    <div class="dashboard-container text-justify first">
        <h2 class="text-center color-primary">Bienvenido <?php echo $_SESSION['name']?></h2>
        
        <section id="ahorros">
            <div class="flex" data-state="justify-between vertical-center user-description"> 
                <div class="flex" data-state="column">
                    <h2 class="text-center color-primary">Mis ahorros</h2>
                    <img src="https://picsum.photos/2000/1000" alt="">
                </div>
                <?php if($_SESSION['type'] == 1){ ?>
                    <div class="box flex" data-state=" column vertical-center">
                        <h2>Recordatorios</h2>
                        <p>Como usuario verde en el semáforo de las finanzas te recordamos seguir con tu buen comportamiento financiero</p>
                        <button class="btn text-center"><a href="new-ahorro.php">Crear nuevo ahorro</a></button>
                    </div>
                <?php } else if($_SESSION['type'] == 2){ ?>
                <div class="box flex" data-state=" column vertical-center">
                    <h2>Pendientes</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius repellat omnis cupiditate quis corrupti perferendis eveniet tempora? Veritatis quae facere quos labore molestiae in! Repellat, aliquam. Doloremque repellat velit nobis!</p>
                    <button class="btn text-center"><a href="new-meta.php">Crear nueva meta</a></button>
                </div>
                <?php } else if($_SESSION['type'] == 3){ ?>
                <div class="box flex" data-state=" column vertical-center">
                    <h2>Pendientes</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius repellat omnis cupiditate quis corrupti perferendis eveniet tempora? Veritatis quae facere quos labore molestiae in! Repellat, aliquam. Doloremque repellat velit nobis!</p>
                    <button class="btn text-center"><a href="new-meta.php">Crear nueva meta</a></button>
                </div>
                <?php } ?>
                
                
            </div>
            
            <div class="flex" data-state="wrap user-list" >
                <?php
                    foreach($ahorros AS $row){
                ?>
                <div class="user-box">
                    <h2>Concepto: <?php echo $row['concepto']?>.</h2>
                    <h2>Ahorrado: $ <?php echo $row['ahorrado']?>.</h2>
                    <h2>Objetivo: $ <?php echo $row['objetivo']?>.</h2>
                    <button class="btn text-center" type="submit"><a href="edit-ahorro.php?id=<?php echo $row['id']?>">Editar</a></button>
                    <button class="btn text-center" type="submit"><a href="config/delete/ahorro.php?id=<?php echo $row['id']?>">Eliminar</a></button>
                </div>
                <?php }?>
            </div>
        </section>
        <section id="metas">
            <div class="flex" data-state="justify-between vertical-center user-description"> 
                <div class="flex" data-state="column">
                    <h2 class="text-center color-primary">Mis metas</h2>
                    <img src="https://picsum.photos/2000/1000" alt="">
                </div>
                <?php if($_SESSION['type'] == 1){ ?>
                <div class="box flex" data-state=" column vertical-center">
                    <h2>Pendientes</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius repellat omnis cupiditate quis corrupti perferendis eveniet tempora? Veritatis quae facere quos labore molestiae in! Repellat, aliquam. Doloremque repellat velit nobis!</p>
                    <button class="btn text-center"><a href="new-meta.php">Crear nueva meta</a></button>
                </div>
                <?php } else if($_SESSION['type'] == 2){ ?>
                <div class="box flex" data-state=" column vertical-center">
                    <h2>Pendientes</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius repellat omnis cupiditate quis corrupti perferendis eveniet tempora? Veritatis quae facere quos labore molestiae in! Repellat, aliquam. Doloremque repellat velit nobis!</p>
                    <button class="btn text-center"><a href="new-meta.php">Crear nueva meta</a></button>
                </div>
                <?php } else if($_SESSION['type'] == 3){ ?>
                <div class="box flex" data-state=" column vertical-center">
                    <h2>Pendientes</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius repellat omnis cupiditate quis corrupti perferendis eveniet tempora? Veritatis quae facere quos labore molestiae in! Repellat, aliquam. Doloremque repellat velit nobis!</p>
                    <button class="btn text-center"><a href="new-meta.php">Crear nueva meta</a></button>
                </div>
                <?php } ?>
                
            </div>
            
            <div class="flex" data-state="wrap" >
                 <?php
                    foreach($metas AS $row){
                ?>        
                <div class="user-box-metas">
                    <h2><?php echo $row['titulo']?>.</h2> 
                    <p><?php echo $row['descripcion']?></p>
                    <h2>Ahorrado: $<?php echo $row['ahorrado']?>.</h2>
                    <h2>Fecha: <?php echo $row['fecha']?>.</h2>
                    <div class="flex">
                        <button class="btn text-center" type="submit"><a href="edit-meta.php?id=<?php echo $row['id']?>">Editar</a></button>
                        <button class="btn text-center" type="submit"><a href="config/delete/metas.php?id=<?php echo $row['id']?>">Eliminar</a></button>
                    </div>
                </div>
                <?php }?>

            </div>
        </section>
        <section id="alertas">            
            <h2>Lista de mensajes</h2>
            <div class="flex" data-state="wrap" >
                <?php
                    foreach($mensajes AS $row){
                ?> 
                <div class="user-box-metas">
                    <h2>Querido <?php echo $_SESSION['name']?>.</h2> 
                    <h2><?php echo $row['asunto']?>.</h2> 
                    <p><?php echo $row['mensaje']?></p>
                    <h2 class="text-right">Fecha: <?php echo $row['fecha']?>.</h2>
                </div>
                <?php }?>
            </div>
        </section>
        <footer class="flex text-center" data-state="center vertical-center semaforo">
            <?php 
                if($_SESSION['type'] == 1){
            ?>
            <div class="footer-box flex border-box" data-state="column vertical-center">
                <h2>Perfil financiero verde</h2>
                <p>¡Sigue con esos buenos hábitos, excelente!</p>
                <div class="dot green"></div>
            </div>
            <?php } else if($_SESSION['type'] == 2){ ?>
            <div class="footer-box flex border-box" data-state="column vertical-center">
                <h2>Perfil financiero amarillo</h2>
                <p>Estás mejorando, adelante, tú puedes.</p>
                <div class="dot yellow"></div>
            </div>
            <?php } else if($_SESSION['type'] == 3){ ?>
            <div class="footer-box flex border-box" data-state="column vertical-center">
                <h2>Perfil financiero rojo</h2>
                <p>Aún faltan cosas por mejorar, ánimo y tú puedes.</p>
                <div class="dot red"></div>
            </div>
            <?php } ?>
        </footer>
    </div>
    

</body>
</html>
<?php }else{
    header("location:index.php");
} ?>