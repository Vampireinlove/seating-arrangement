<?php
    session_start();
    include ('_dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Seating Plan Manager</title>
        <link rel="stylesheet" href="css/index_style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            .banner-image
            {
                background-color:brown;
            }
        </style>
    </head>
    <body>
        <!-- Navbar  -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
        <div class="container">
            <a class="navbar-brand" href="#">Seating Plan Management</a>
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link text-white" href="#">Home</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <?php
            $empty = "TRUNCATE `exam`.`data`";
            $run = mysqli_query($con, $empty);
        ?>

        <!-- Banner Image  -->
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center">
                <form action="" method="post">
                    <input type="text" name="rows" placeholder="rows">;
                    <input type="text" name="col" placeholder="col">
                    <input type="text" name="seats" placeholder="total">
                    <br>
                    <input type="submit" value="Generate" name="btn" class="btn btn-primary my-2">
                </form>
            </div>
        </div>


        <?php
            if (isset($_POST['btn']))
            {
                
                $_SESSION['row'] =  $row = $_POST['rows'];
                $_SESSION['col'] =  $col = $_POST['col'];
                $_SESSION['totl'] =  $total = $_POST['seats'];


                while ($total > 0)
                {
                    $num = rand(1,20);
                    $insert_qry = "INSERT INTO `data`( `num`) VALUES ('$num')";
                    $run_insert = mysqli_query($con, $insert_qry);
                    
                    $total--;
                }

                echo 
                " 
                    <script>
                        window.location.href='display.php';
                    </script> 
                ";
            }
        ?>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 100) {
            nav.classList.add('bg-dark', 'shadow');
            } else {
            nav.classList.remove('bg-dark', 'shadow');
            }
        });
        </script>
  </body>
</html>
