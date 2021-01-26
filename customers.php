<?php
    include "connection.php";
?>
<?php
$sql = "SELECT * FROM `customers`";
$result = mysqli_query($db,$sql) or die("Bad Query: $sql");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bankstyle.css">


    <title>PEOPLE's BANK</title>
    <style type="test/css">


    </style>
</head>


<body>
    <div class="wrapper" style="background-color: white;">
        <header>
            <div class="logo">
                <img src="download.jpg" alt="logo">
                <h1>PEOPLE'S BANK </h1>
                <nav>
                    <ul>
                        <li><a href="bankindex.php">HOME</a></li>
                        <li><a href="transfer.php">TRANSFER</a></li>



                    </ul>
                </nav>
            </div>
        </header>
        <section style=" margin-top:-20px; height: 800px; width: 1532px;">
            <h2 style="margin-left: 700px;">CUSTOMERS</h2>

            <?php
            $res=mysqli_query($db,"SELECT * FROM `customers`");
          
            echo "<table style='  background-color:pink;margin-left:20px;height:600px; border:2px solid black;border-collapse:collapse;width:1515px; text-align:center;'>";
                echo "<tr style=' border: 2px solid black;background-color:white; '>";
                    echo "<th style='border:2px solid black;'>"; echo "Account No"; echo "</th>";
                    echo "<th style='border:2px solid black;'>"; echo "Name"; echo "</th>";
                    echo "<th style='border:2px solid black;'>"; echo "Email"; echo "</th>";
                    echo "<th style='border:2px solid black;'>"; echo "Balance"; echo "</th>";
                    echo "<th style='border:2px solid black;'>"; echo "SELECT"; echo "</th>";
                echo "</tr>";
                
                while ($row=mysqli_fetch_assoc($res))
                {
                    echo "<tr>";
                        echo "<td style='border:1px solid black;'>"; echo $row['Account_No']; echo "</td>"; 
                        echo "<td style='border:1px solid black;'>"; echo $row['Name']; echo "</td>";
                        echo "<td style='border:1px solid black;'>"; echo $row['Email_ID']; echo "</td>";
                        echo "<td style='border:1px solid black;'>"; echo $row['Balance']; echo "</td>";
                        echo "<td style='border:1px solid black;'>"; echo "<button>"; echo"<a href='details.php?ID={$row["Account_No"]}'>"; echo "Select and View"; echo"</a>"; echo"</button>"; echo"</td>";
                    echo "</tr>";
             }
             echo "</table>";
             ?>








        </section>

    </div>
</body>

</html>

</html>