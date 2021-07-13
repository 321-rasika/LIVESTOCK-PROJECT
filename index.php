<?php
$insert=false;
if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);
    if(!$con){
        die("connection failed due to ".mysqli_connect_error());
    }
    //echo "success";
    $name=$_POST['name'];
    $livestock=$_POST['livestock'];
    $noOflivestock=$_POST['noOflivestock'];
    $vaccine=$_POST['vaccine'];
    $symptoms=$_POST['symptoms'];
    $area=$_POST['area'];
    $sellOrBuy=$_POST['sellOrBuy'];

    $sql="INSERT INTO `register`.`register`(`name`,`livestock`,`noOflivestock`,`vaccine`,`symptoms`,`area`,`sellOrBuy`) 
    VALUES ('$name','$livestock','$noOflivestock','$vaccine','$symptoms','$area','$sellOrBuy')";
    // echo $sql;
    
    if($con->query($sql)==True){
        $insert=true;   
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Sellers and Buyers</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="animal-3437467_1280.jpg" alt="BUYER AND SELLERS" >
    <div class="container">
        <h1>Welcome to Sellers and Buyers</h1>
        <p>Let us help you find the best deal!</p>
        <?php 
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for registering with us!Your Report will be displayed</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="livestock" id="livestock" placeholder="Type of livestock eg.cows etc">
            <input type="text" name="noOflivestock" id="noOflivestock" placeholder="Enter no of livestocks">
            <input type="text" name="vaccine" id="vaccine" placeholder="vaccinations taken">
            <input type="text" name="symptoms" id="symptoms" placeholder="Enter symptoms">
            <input type="text" name="area" id="area" placeholder="Enter your area">
            <input type="text" name="sellOrBuy" id="sellOrBuy" placeholder="Enter S-Seller else B-Buyer">
            <input type="text" name="contact" id="conatct" placeholder="Enter your Mail Id">
            <!-- 
            // echo "<div><h4>$name</h4></div>";
             -->
            <!--<h4>If you are a BUYER please Fill Area and Buyer columns only</h4>-->
            <button class="btn">Submit</button>
            <!-- <button class="btn">Report</button>"; -->
                        
        </form>
    </div>
    <script src="index.js"></script>
    <div class="container1" style="text-align:center; background:antiquewhite;">
        <?php
        echo "<h3>YOUR REPORT:<br><br>
        Name : $name <br>
        livestock : $livestock <br>
        No of Livestock : $noOflivestock <br> 
        Vaccines taken : $vaccine<br>
        Symptoms : $symptoms <br>
        Area : $area<br> Sell/Buy : $sellOrBuy<br>
        contact : $name@gmail.com <br></h3>";
        echo "<h3><br>For Treatment Suggestions Visit<br></h3>";
        echo "<h3><a href=https://vikaspedia.in/agriculture/livestock/general-management-practices-of-livestock/common-animal-diseases-and-their-prevention-and-treatments>
        Vikas Pedia<br></h3></a>";
        echo "<h4>(An Indian Government Iniative)</h4><br>";
        if($symptoms=="fever" or $symptoms=="cold"){
            echo "<h4>Take vaccines : a).ABC b)XYZ c)PQR <br></h4>";
            if($sellOrBuy=="s" or $sellOrBuy=="S"){
                echo "<h4>Interested Buyers in your area:<br>
                a)Ramesh kumar contact:rameshkumar@gmail.com<br>
                b)raviprasad contact:raviprasad@gmail.com<br>
                c)naman gupta contact:namangupta@gmail.com</h4>";
            }
            else{
                echo "<h4><br>Interested Sellers in your area:<br> a)nitin yadav contact:nitinyadav@gmail.com<br>
                b)mangesh contact:mangesh@gmail.com<br> c)sampat yogi contact:sampatyogi@gmail.com<br></h4>";
            }
        }
        else{
            echo "LATEST PROGRAMS AVAILABLE : 
                <h4>1. <a href=http://dahd.nic.in/about-us/divisions/national-livestock-mission>Visit DAdh</a></h4>
                <h4>2. <a href=https://vikaspedia.in/agriculture/policies-and-schemes>Visit Vikaspedia</a></h4>
            ";
            echo "<br><h4>contact us : sellersandbuyers@gmail.com </h4>";
        }

        ?>
    </div>
</body>

</html>