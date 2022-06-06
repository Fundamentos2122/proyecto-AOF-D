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
            <div class="">
                <h2 class="text-center color-primary">Test financiero</h2>
                <p>Hola, para registrarte o debes realizar primero el test financiero. En caso de que sólo quieras saber tu resultado financiero, disfruta el test de abajo.</p>
            </div>

            <div class="flex" data-state="column vertical-center">
                <div class="semaforo flex" data-state="vertical-center">
                    <div class="dot green"></div>
                    <div class="dot yellow"></div>
                    <div class="dot red"></div>
                </div>
                <button class="btn text-center" type="submit"><a href="#main-test">Descubre tu color</a></button>
            </div>

        </section>
        <section id="main-test" class="">
            <div class="">
                <form action="test-result.php" method="POST">
                    <div class="question">
                        <h2>¿Tienes ahorros definidos?</h2>
                        <input type="radio" name="q1" id="q1r1" value="1">
                        <label for="q1r1">Sí.</label><br>
                        <input type="radio" name="q1" id="q1r1" value="0">
                        <label for="q1r2">No.</label>
                    </div>
                    <div class="question">
                        <h2>¿Tienes metas establecidas?</h2>
                        <input type="radio" name="q2" id="q2r1" value="1">
                        <label for="q2r1">Sí.</label><br>
                        <input type="radio" name="q2" id="q2r2" value="0">
                        <label for="q2r2">No.</label>
                    </div>
                    <div class="question">
                        <h2>¿Alguna vez has ahorrado para cumplir una meta?</h2>
                        <input type="radio" name="q3" id="q3r1" value="1">
                        <label for="q3r1">Sí.</label><br>
                        <input type="radio" name="q3" id="q3r2" value="0">
                        <label for="q3r2">No.</label>
                    </div>
                    <div class="question">
                        <h2>¿Tienes inversiones?</h2>
                        <input type="radio" name="q4" id="q4r1" value="1">
                        <label for="q4r1">Sí.</label><br>
                        <input type="radio" name="q4" id="q4r2" value="0">
                        <label for="q4r2">No.</label>
                    </div>
                    <div class="question">
                        <h2>¿Conoces la libertad financiera?</h2>
                        <input type="radio" name="q5" id="q5r1" value="1">
                        <label for="q5r1">Sí.</label><br>
                        <input type="radio" name="q5" id="q5r2" value="0">
                        <label for="q5r2">No.</label>
                    </div>
                    <button class="btn text-center" type="submit" class="form-input"><a>Enviar respuesta</a></button>
                  </form>
            </div>
        </section>
    </div>
</body>
</html>