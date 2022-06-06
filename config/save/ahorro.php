<?php

require '../database.php';

$db = new Database();
$con = $db->conectar();

session_start();

$correcto = false;

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $user_id = $_SESSION['id'];
    $concepto = $_POST['concepto'];
    $ahorrado = $_POST['ahorrado'];
    $objetivo = $_POST['objetivo'];

    $query = $con->prepare("UPDATE  ahorros SET concepto=?, ahorrado=?, objetivo=?  WHERE id=? AND user_id=?");
    $resultado = $query->execute(array($concepto, $ahorrado, $objetivo, $id, $user_id));

    if($resultado){
        $correcto = true;
    }
    

}else {
    $user_id = $_SESSION['id'];
    $concepto = $_POST['concepto'];
    $ahorrado = $_POST['ahorrado'];
    $objetivo = $_POST['objetivo'];
    

    
    $query = $con->prepare("INSERT INTO ahorros (concepto, ahorrado, objetivo, user_id, activo) VALUES (:conc, :aho, :obj, :usr, 1)");
    $resultado = $query->execute(array('conc' => $concepto, 'aho' => $ahorrado, 'obj' => $objetivo, 'usr' => $user_id));

    if($resultado){
        $correcto = true;
    }
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
                 <h2>Tu ahorro fue guardado exitosamente. </h2>
            <?php } else {?>
                 <h2>Tu ahorro no fue guardado exitosamente. </h2>
            <?php }?>
            <div class="flex" data-state="column vertical-center user-list form-adapt" >  
                <div class="form-box">
                <button class="btn text-center" type="submit"><a href="../../dashboard-user.php">Regresar</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>