<?php
include "database.php";
function isLoggedIn(){
  if(!isset($_SESSION["loggedIn"])){
    header('location: login.php');
  }
}

function addInfo(){
        global $connection;
        if(isset($_POST['submit'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $pc = $_POST['pc'];
            $phoneNumber = $_POST['phoneNumber'];
            $creditCardNumber = $_POST['creditCardNumber'];
            $creditCardExpiry = $_POST['creditCardExpiry'];
            $creditCardCVC = $_POST['creditCardCVC'];
            $accountNumber = $_POST['accountNumber'];
            $password = $_POST['password'];


            //used to check input to not mess up database and allow " ' " in names
            $firstName = mysqli_real_escape_string($connection, $firstName);
            $lastName = mysqli_real_escape_string($connection, $lastName);
            $street = mysqli_real_escape_string($connection, $street);
            $city = mysqli_real_escape_string($connection, $city);
            $pc = mysqli_real_escape_string($connection, $pc);
            $phoneNumber = mysqli_real_escape_string($connection, $phoneNumber);
            $creditCardNumber = mysqli_real_escape_string($connection, $creditCardNumber);
            $creditCardExpiry = mysqli_real_escape_string($connection, $creditCardExpiry);
            $creditCardCVC = mysqli_real_escape_string($connection, $creditCardCVC);
            $accountNumber = mysqli_real_escape_string($connection, $accountNumber);
            $password = mysqli_real_escape_string($connection, $password);

            $query = "INSERT INTO Customer(account_number, password, first_name, last_name, street, city, pc, phone_number, credit_card_number, credit_card_expiry, credit_card_cvc) ";
            $query .= "VALUES('$accountNumber','$password','$firstName','$lastName','$street','$city','$pc','$phoneNumber','$creditCardNumber','$creditCardExpiry','$creditCardCVC')";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die('Query Failed' . mysqli_error());
            }else{
                header('location: login.php');
            }
        }
}
?>
