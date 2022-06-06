<?php

require '../database.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

$id = $_GET['id'];

$query = $con->prepare("DELETE FROM mensajes WHERE id=?");
$resultado = $query->execute([$id]);

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
                    <li><a href="../../dashboard-user.php">Dashboard</a></li>
                </div>
            </ul>
            </nav>
    </header>

    <div class="dashboard-container text-justify first">
        <h2 class="text-center color-primary">Nuevo ahorro</h2>
        <section id="form">
            <?php if ($correcto) { ?>
                 <h2>Tu mensaje fue eliminado exitosamente. </h2>
            <?php } else {?>
                 <h2>Tu mensaje no fue eliminado exitosamente. </h2>
            <?php }?>
            <div class="flex" data-state="column vertical-center user-list form-adapt" >  
                <div class="form-box">
                <button class="btn text-center" type="submit"><a href="../../dashboard-admin.php">Regresar</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>