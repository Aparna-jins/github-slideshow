<?php
    include "connection.php";
?>
<?php
  
    $result=mysqli_query($db,"bank");
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bankstyle.css">
    <title>PEOPLE's BANK</title>
    <style type="test/css">

    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="download.jpg" alt="logo">
                <h1>PEOPLE'S BANK </h1>
                <nav>
                    <ul>
                        <li><a href="bankindex.php">HOME</a></li>
                        <li><a href="customers.php">CUSTOMERS</a></li>


                    </ul>
                </nav>
            </div>
        </header>
        <section style=" background-image: url('ground.jpg'); height: 700px; width: 1532px; padding-top: 200px;">
            <div class="C_name" style="  background-color:white; border:3px solid blue;
                width:600px;margin-left:500px ;">
                <br>
                <h2 style="text-align: center;">TRANSFER</h2><br>
                <h3 style="margin-left: 150px;">
                    <label for="transfer">Transfer Amount to</label>
                </h3>
                <select style="margin-left: 190px;" name="transfer" id="trans">
                    <?php
                    $res=mysqli_query( $db,"SELECT * FROM `customers` ");
                    while($row=mysqli_fetch_array($res))
                    {
                    ?>


                    <option>
                        <?php echo $row["Name"];?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
                <h3 style="margin-left: 150px;">Balance:
                    <?php echo $row['Balance'] ?>
                </h3>
                <h3 style="margin-left: 150px;"><a href="transfer.php"><button>TRANSFER MONEY</button></a></h3>


            </div>


        </section>

    </div>
</body>

</html>