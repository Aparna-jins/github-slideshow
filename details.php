<?php
    include "connection.php";

?>
<?php
    if(isset($_GET['ID']))
    {
    $ID =mysqli_real_escape_string($db,$_GET['ID']);

    $sql = "SELECT * FROM `customers` WHERE Account_No='$ID' ";
    $result=mysqli_query($db,$sql) or die("Bad Query:$sql");
    $row =mysqli_fetch_array($result);

    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bankstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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
            <form name="transfer" action="" method="post">
                <div class="C_name" style="  background-color:white; border:3px solid blue;
                width:600px;margin-left:500px ;">
                    <br>
                    <h2 style="text-align: center;">CUSTOMER DETAILS</h2><br>
                    <h4 style="margin-left: 150px; ">
                        Customer Name:
                        <?php echo $row['Name'] ?>

                    </h4>
                    <h4 style="margin-left: 150px;">
                        <p>Sender Account Number : <input readonly="readonly" name="Sender"
                                value="<?php echo $row['Account_No'] ?>"></input>
                        </p>
                    </h4>
                    <h4 style="margin-left: 150px;">Balance:
                        <?php echo $row['Balance'] ?>
                    </h4>
                    <h4 style="margin-left: 150px;">
                        <label for="Receiver">Transfer Amount to</label>
                    </h4>
                    <!-- <select style="margin-left: 150px; width:150px ;" name="Receiver" id="trans">
                            <?php
                $res=mysqli_query( $db,"SELECT * FROM `customers`  WHERE Account_No!='$ID' ");
                while($row=mysqli_fetch_array($res))
                {
                ?>


                            <option>
                                <?php echo $row["Name"];?>
                            </option>
                            <?php
                }
                ?>
                        </select> -->
                    <input style="margin-left:150px ;" type="number" name="Reciever" id="ReceiverInput">
                    <h4 style="margin-left: 150px;">
                        <label for="Amount">Amount to be transfered </label>
                    </h4>
                    <input style="margin-left: 150px;  " type="number" name="Amount" required="">
                    </h3>
                    <h3 style="margin-left: 150px;">
                        <input class="btn btn-default" type='submit' name="submit" value="Transfer Money"
                            style="color: black; width: 200px; height: 30px; background-color: rgb(66, 66, 177);">
                    </h3>
                    <?php
                                if($_SERVER["REQUEST_METHOD"] == "POST")
                                {
                                    
                                        
                                    $Sender = $_POST['Sender'];
                                    $Reciever = $_POST['Reciever'];
                                    $Amount = $_POST['Amount'];
                      
                                        mysqli_query($db,"INSERT INTO `transfer` VALUES($Sender, $Reciever, $Amount)");
                                        mysqli_query($db,"UPDATE `customers` SET Balance=Balance-$Amount WHERE Account_No=$Sender");
                                        mysqli_query($db,"UPDATE `customers` SET Balance=Balance+$Amount WHERE Account_No=$Reciever");
                                        echo "<p>Transaction Successfull</p>";
                                        
                                        
                                    
                                        
                                       
                    
                    ?>

                    <script type="text/javascript">
                        alert("Transaction successful");
                    </script>
                    <?php
                }
                    ?>




                </div>
            </form>


        </section>



    </div>
</body>

</html>