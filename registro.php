<?php

$level = $_GET['level'];

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
                    <li><a href="index.php">Inicio</a></li>
                </div>
            </ul>
            </nav>
    </header>

    <div class="dashboard-container text-justify first">
        <h2 class="text-center color-primary">Registrate con nosotros</h2>
        <section id="form">
            <h2>Ingresa tus datos</h2>
            <div class="flex" data-state="column vertical-center user-list form-adapt" >
                
                <div class="form-box">
                    <form class="flex" data-state="column" action="config/save/user.php?level=<?php echo $level ?>" method="POST" autocomplete="off">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" autofocus required>
                        <label for="user">Usuario</label>
                        <input type="text" id="user" name="user" required>
                        <label for="psw">Contraseña</label>
                        <input type="password" id="psw" name="psw" required>
                        <div class="flex" data-state="warp">
                            <button class="btn text-center"><a  href="index.php">Regresar</a></button>
                            <button class="btn text-center" type="submit">Registrarte</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>