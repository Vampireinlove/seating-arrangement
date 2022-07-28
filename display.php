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
                            
                            $data = mysqli_fetch_assoc($run);
                                            
                            $original = array();
                            $temp = array();
                            for ($i = 0; $i < $total; $i++)
                            {
                                $original[$i] = $data['num'];
                            }
                            
                            $length = sizeof($original);
                            $temp = $original;   
                            
                            //echo $data['num'];
                            //print_r($original);
                            //print_r($temp);


                        while($total>0)
                        {
                            $index_num = 0;

                            for ( $r = 1; $r < $row; $r++ )
                            {
                                echo "<tr>";
                                
                                for ($c = 1; $c < $col; $c++)
                                {
                                    echo "<td height=30px width=30px>";
                                    
                                    if ($r == 1 && $c == 1)
                                    {
                                        echo $temp[$index_num];
                                    }

                                    else if($r == 1 && $c > 1)
                                    {
                                        if($temp[$index_num] != $temp[$index_num-1])
                                        {
                                            echo $temp[$index_num];
                                        }
                                        else
                                        {
                                            $t = 1;
                                            $z = 0;
                                            while ($z == 0)
                                            {
                                                while ($t < $total )
                                                {
                                                    if ($temp[$index_num-1] != $temp[$index_num+$t])
                                                    {
                                                        echo $temp[$index_num+$t];
                                                        $z = 1;
                                                    }
                                                    else
                                                    {
                                                        $t++;
                                                    }
                                                }
                                            }
                                        }
                                        
                                    }
                                    else if($r > 1 && $c == 0)
                                    {
                                        if($temp[$index_num] != $temp[$index_num-$col])
                                        {
                                            echo $temp[$index_num];
                                        }
                                        else
                                        {
                                            $t = 1;
                                            $z = 0;
                                            while ($z == 0)
                                            {
                                                while ($t < $total )
                                                {
                                                    if ($temp[$index_num-$col] != $temp[$index_num+$t])
                                                    {
                                                        echo $temp[$index_num+$t];
                                                        $z = 1;
                                                    }
                                                    else
                                                    {
                                                        $t++;
                                                    }
                                                }
                                                
                                            }
                                        }
                                        
                                    }
                                    else if($r > 1 && $c > 1)
                                    {
                                        if($temp[$index_num] != $temp[$index_num-1] && $temp[$index_num] != $temp[$index_num-$col])
                                        {
                                            echo $temp[$index_num];
                                        }
                                        else
                                        {
                                            $t = 1;
                                            $z = 0;
                                            while ($z == 0)
                                            {
                                                while ($t < $total )
                                                {
                                                    if ($temp[$index_num + $t] != $temp[$index_num-1] && $temp[$index_num + $t] != $temp[$index_num-$col])
                                                    {
                                                        echo $temp[$index_num+$t];
                                                        $z = 1;
                                                    }
                                                    else
                                                    {
                                                        $t++;
                                                    }

                                                }
                                                
                                            }
                                        }
                                        
                                    }
                                    else
                                    {
                                        echo " ";
                                    }

                                    echo " </td>";
                                    
                                    $index_num++;
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
