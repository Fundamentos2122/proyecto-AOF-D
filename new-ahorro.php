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
        <h2 class="text-center color-primary">Creas tu nuevo ahorro</h2>
        <section id="form">
            <h2>Ingresa los datos de tu ahorro: </h2>
            <div class="flex" data-state="column vertical-center user-list form-adapt" >
                
                <div class="form-box">
                    <form class="flex" data-state="column" action="config/save/ahorro.php" method="POST" autocomplete="off">
                        <label for="concepto">Concepto</label>
                        <input type="text" id="concepto" name="concepto" autofocus required>
                        <label for="ahorrado">Ahorrado $</label>
                        <input type="number" id="ahorrado" name="ahorrado">
                        <label for="objetivo">Objetivo $</label>
                        <input type="number" id="objetivo" name="objetivo">
                        <div class="flex" data-state="warp">
                            <button class="btn text-center"><a  href="dashboard-user.php">Regresar</a></button>
                            <button class="btn text-center" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>