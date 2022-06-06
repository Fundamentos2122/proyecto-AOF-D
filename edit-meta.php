<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];
$activo = 1;

$query = $con->prepare("SELECT titulo, descripcion, ahorrado, fecha FROM metas WHERE id = :id AND activo=:activo");
$query->execute(['id' => $id, 'activo' => $activo]);
$num = $query->rowCount();
if ($num > 0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
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
        <h2 class="text-center color-primary">Edita tu meta</h2>
        <section id="form">
            <h2>Ingresa los datos de tu meta: </h2>
            <div class="flex" data-state="column vertical-center user-list form-adapt" >   
                <div class="form-box">
                    <form class="flex" data-state="column" action="config/save/meta.php" method="POST" autocomplete="off">
                      <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                        <label for="titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" value="<?php echo $row['titulo']?>" autofocus required>
                        <label for="descripcion">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']?>">
                        <label for="ahorrado">Ahorrado $</label>
                        <input type="number" id="ahorrado" name="ahorrado" value="<?php echo $row['ahorrado']?>">
                        <label for="fecha">Fecha límite</label>
                        <input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha']?>">
                        <div class="flex" data-state="warp">
                            <button class="btn text-center"><a  href="dashboard-user.php">Cancelar</a></button>
                            <button class="btn text-center" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>