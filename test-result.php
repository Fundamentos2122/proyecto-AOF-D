<?php 


     $q1 = $_POST['q1'];
     $q2 = $_POST['q2'];
     $q3 = $_POST['q3'];
     $q4 = $_POST['q4'];
     $q5 = $_POST['q5'];
     $resultado = $_POST['q1'] + $_POST['q2'] + $_POST['q3'] + $_POST['q4'] + $_POST['q5'];
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
                </div>
            </ul>
            </nav>
    </header>

    <div class="container text-justify">
        <section id="inicio" class="flex test-box first" data-state="column vertical-center center">
            <?php if($resultado <= 2){ ?>    
            <h2 class="text-center color-primary">Tu color es: rojo</h2>
            <?php } else if($resultado <= 4){ ?>    
            <h2 class="text-center color-primary">Tu color es: amarillo</h2>
            <?php } else if($resultado == 5){ ?>    
            <h2 class="text-center color-primary">Tu color es: verde</h2>
            <?php }?>
            

            <div class="flex" data-state="column vertical-center">
            <p>Hola, eres libre de registrarte o regresar al inicio. Que tengas un excelente día.</p><br>
                <div class="semaforo flex" data-state="vertical-center">
                    <?php if($resultado <= 2){ ?>    
                        <div class="dot red"></div>
                        <div class="dot red"></div>
                        <div class="dot red"></div>
                    <?php } else if($resultado <= 4){ ?>    
                        <div class="dot yellow"></div>
                        <div class="dot yellow"></div>
                        <div class="dot yellow"></div>
                    <?php } else if($resultado == 5){ ?>    
                        <div class="dot green"></div>
                        <div class="dot green"></div>
                        <div class="dot green"></div>
                    <?php }?>
                </div>
                <button class="btn text-center"><a href="index.php">Inicio</a></button>
                <button class="btn text-center" type="submit"><a href="registro.php?level=<?php echo $resultado ?>">Regístrate</a></button>
            </div>
        </section>
    </div>
</body>
</html>