<?php
    session_start();
    include ('_dbconnection.php');

    
    $row = $_SESSION['row'] ;
    $col = $_SESSION['col'];
    $total = $_SESSION['totl'];
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

        <!-- Banner Image  -->
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center text-white">
                <?php
                    echo "Number of rows = " . $row . "<br>";
                    echo "Number of columns = " .$col . "<br>";
                    echo "Numner of seats = " . $total . "<br>";
                ?>
                <table class="table table-bordered ">
                    <?php
                        
                        $qry = "SELECT * FROM `data`";
                        $run = mysqli_query($con, $qry);
                        


                            while($total>0)
                            {
                                for ( $i =1; $i <= $row; $i++ )
                                {
                                    echo "<tr>";
                                    
                                    for ($j = 1; $j <= $col; $j++)
                                    {
                                        echo "<td height=30px width=30px>";

                                        $data = mysqli_fetch_assoc($run);
                                        
                                        if($data)
                                        {
                                            echo $data['num'];
                                        }
                                        else
                                        {
                                            echo " ";
                                        }

                                        echo " </td>";
                                        
                                        $total--;
                                    }

                                    echo "</tr>";
                                }
                            }
 
                    ?>
                </table>
            </div>
        </div>

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
