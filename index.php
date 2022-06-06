<?php
    session_start();
    require 'config/database.php';
    $u = $_POST['usr'];
    $p = $_POST['psw'];
    $db = new Database();
    $con = $db->conectar();

    $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $con ->prepare("SELECT * FROM usuarios WHERE username = :u AND password = :p");
    $query->bindParam(":u",$u);
    $query->bindParam(":p",$p);
    $query->execute();
    $username = $query->fetch(PDO::FETCH_ASSOC);
    $password = $query->fetch(PDO::FETCH_ASSOC);
    if($username AND $username['admin']){  
        $_SESSION['id'] = $username['id'];
        $_SESSION['username'] = $username['username'];
        $_SESSION['name'] = $username['name'];
        $_SESSION['type'] = $username['type'];
        $_SESSION['password'] = $username['password'];
        header("location:dashboard-admin.php");
    }   else if($username){  
        $_SESSION['id'] = $username['id'];
        $_SESSION['username'] = $username['username'];
        $_SESSION['name'] = $username['name'];
        $_SESSION['type'] = $username['type'];
        $_SESSION['password'] = $username['password'];
        header("location:dashboard-user.php");
    } 
               
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="modal.css">
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
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#nosotros">Nosotros</a></li>
                    <!-- <li><a href="#contacto">Contáctanos</a></li>-->
                    <!-- <li class="services">
                        <a href="/">Services</a>
                        <ul class="dropdown">
                            <li><a href="/">Dropdown 1 </a></li>
                            <li><a href="/">Dropdown 2</a></li>
                            <li><a href="/">Dropdown 2</a></li>
                            <li><a href="/">Dropdown 3</a></li>
                            <li><a href="/">Dropdown 4</a></li>
                        </ul>
                    </li> -->
                    
                    <li><a class="cursor-pointer" onclick="document.getElementById('login').style.display='block'">Login</a></li>
                </div>
            </ul>
        </nav>
    </header>

    <div id="login" class="modal">
  
        <form class="modal-content animate" action="index.php" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
      
            <div class="container-1">
                <label for="usr"><b>Username</b></label>
                <input type="text" placeholder="Usuario" name="usr" required>
        
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Contraseña" name="psw" required>
                
                <button type="submit">Login</button>
                <button type="submit"><a href="test.php">Registrate</a></button>
            </div>
      
            <div class="container-1 color-white">
                <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
                <?php 
                    if($username){
                    }   else{ ?>
                        <span class="psw"><a">Usuario incorrecto.</a></span>
                   <?php }
                ?>
                
            </div>
        </form>
    </div>


    <div class="container text-justify">
        <section id="inicio" class="flex" data-state="justify-between vertical-center">
            <div class="box">
                <h2 class="text-center color-primary">Quiénes Somos</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis adipisci recusandae id praesentium voluptatem nesciunt libero, veritatis eius fugiat voluptas asperiores eos perferendis aliquid laboriosam cumque, eveniet ex. Consequatur, pariatur?</p>
            </div>
            <div class="box">
                <img src="https://picsum.photos/700/" class="shadow" alt="">
            </div>
        </section>
        <section id="nosotros" class="flex" data-state="justify-between vertical-center">
            <div class="box">
                <img src="https://picsum.photos/700" class="shadow" alt="">
            </div>
            <div class="box">
                <h2 class="text-center color-primary">Test financiero</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut sit tempore ipsum voluptas, laudantium illum! Eos id, reprehenderit delectus quaerat asperiores ea optio quo alias quasi rem, corrupti sequi aliquid?</p>
                <button class="btn text-center" type="submit"><a href="test.php">Ir al test</a></button>
            </div>
        </section>
        <!-- <section id="contacto" class="flex" data-state="vertical-center">
            <div class="contact-form flex" data-state="vertical-center">
                <div class="row flex" data-state="wrap">
                    <div class="col">
                        <div class="">
                            <h2 class="text-center">Contáctanos</h2>
                            <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure asperiores ex neque, at soluta ratione quibusdam deserunt sunt suscipit veniam accusantium ducimus error itaque! Veniam quisquam voluptatem ad quis accusantium.</p>
                         </div>
                         <div class="text-center">
                             <h2>Mensaje</h2>
                             <textarea name="" id="">
                                 
                             </textarea>
                         </div>
                    </div>
                </div>
                <div class="col">
                    <form action="" class="">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-input">
    
                        <label for="mail">Correo</label>
                        <input type="text" name="mail" class="form-input">
    
                        <label for="number">Número</label>
                        <input type="text" name="number" class="form-input">
                        
                        <button class="btn text-center" type="submit" class="form-input"><a href="">Enviar mensaje</a></button>
                    </form>
                </div>
            </div>     
        </section> -->
    </div>

    <footer class="flex text-center" data-state="justify-between">
        <div class="footer-box flex" data-state="column vertical-center">
            <img src="https://picsum.photos/700/" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="footer-box flex" data-state="column vertical-center link">
            <h2>Links Útiles</h2>
            <div class="link-box flex" data-state="column">
                <a href="test.php">Test Finanzas</a>
                <a href="index.php">Inicio</a>
            </div>
        </div>
        <div class="footer-box flex" data-state="column vertical-center">
            <h2>Encuéntranos</h2>
            <img src="https://picsum.photos/100/" alt="">
            <img src="https://picsum.photos/101/" alt="">
        </div>
    </footer>

    

    <script>
        // Get the modal
        var modal = document.getElementById('login');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>