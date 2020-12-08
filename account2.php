<?php

require"config.php";

$emai = $passwor = "";
$err = "";




$username = $email = $password = "";
$email_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "get"){

    $password = $_GET['password'];
    $email = $_GET['email'];
    $username = $_GET['username'];

    $query = "INSERT INTO login (username,email,password) VALUES('$username','$email','$password')";
      
     
      $stm= mysqli_query($conn, $sql);
       $d= mysqli_num_rows($stm);
      if($d>0)
      {
        
        session_start();
        $_SESSION['email'] = $email;
        header("Location: index.php");

      }
      else
      {
        echo "erfdfhror";

      }


}


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $emai = $_POST['email'];
    $passwor = $_POST['password'];
 
    $sql ="SELECT * FROM login WHERE email = '$emai' AND password = '$passwor' ";
    $stmt = mysqli_query($conn, $sql);

    $d= mysqli_num_rows($stmt);
    
    if($d>0)
    {
      session_start();
      $_SESSION['email'] = $emai;
      header("Location: index.php");  
    }
    else
    {
      $err ='enter valid details';     
    }    
}    

?>




<!DOCTYPE html>
<html>
    <head>
        <title>Reldor Plastic</title>
        <link rel="stylesheet" href="style2.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <!-- Font Awesome -->
        <script src="https://use.fontawesome.com/27c4c1c648.js"></script>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
    </head>
    <body>
        
        
        <!-- NavigationBar -->
              <section id="nav-bar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#"><span>Reldor</span>Plastics</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#slider">HOME</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#about">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#services">SERVICES</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#team">OUR TEAM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonials">TESTIMONIAL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">CONTACT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products2.php">OUR PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account2.php">LOGIN</a>
                        </li>
                        <div class="image">
                            <a class="image" href="cart2.php">
                            <img src="https://tse3.mm.bing.net/th?id=OIP.ZoTNwUKPDQXmhWvPsk-7pgHaHa&pid=Api&P=0&w=300&h=300" width="30px" height="30px">
                            </a>
                          </div>
                      </ul>
                    </div>
                </nav>
            </section>

           
         <!-- Account-page -->
         <div class="account-page">
             <div class="container">
                 <div class="row">
                     <div class="col-md-6">
                         <img src="https://ak5.picdn.net/shutterstock/videos/12722285/thumb/10.jpg" width="100%">
                     </div>
                     <div class="col-md-6">
                        <div class="form-container">
                           <div class="form-btn">
                               <span onclick="login()">Login</span>
                               <span onclick="register()">Register</span>
                               <hr id ="Indicator">
                           </div>
                           <form id="LoginForm" action="" method="post">
                               <input type="text" placeholder="email" name="email" required>
                               <input type="password" placeholder="Password" name="password" required>
                               <button type="submit" class="btn btn-primary">Login</button>
                               <a href="">Forgot Password</a>
                           </form>

                           <form id="RegForm" action="" method="get">
                            <input type="text" placeholder="Username"name="username" required>
                            <input type="email" placeholder="E-Mail" name="email" required>
                            <input type="password" placeholder="Password" name="password" required>
                            <button type="submit" class="btn btn-primary">Register</button>
                            
                        </form>
                        </div>
                    </div>
                 </div>
             </div>
         </div>
        

 <!-- Footer -->
 <section id="footer">
    <div class="container text-center">
         <p> &copy; reldorplastic.com </p>
    </div>
   </section>
  <!-- //Foooter -->

        <script src="js/smooth-scroll.js"></script>
        <script>
            var scroll = new SmoothScroll('a[href*="#"]');
        </script>
        <!-- js for toggle form -->
        <script>
            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicator = document.getElementById("Indicator");

            function register(){
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }
            function login(){
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
        </script>
     </body>
</html>
