<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $id_number = $_POST['id_number'];
    $phone_number = $_POST['phone_number'];
    $reason_for_visiting = $_POST['reason_for_visiting'];

    date_default_timezone_set("Africa/Nairobi");
    $sign_in_time = date("d-m-y h:i:s");

    $servername = "localhost";
    $root_username = "root";
    $password = "";
    $dbname = "library management system";
    
    try{
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $root_username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = "INSERT INTO `visitors`(`First Name`, `Last Name`, `ID Number`, `Phone Number`, `Reason For Visiting`, `Sign In Time`) VALUES (:first_name, :last_name, :id_number, :phone_number, :reason_for_visiting, :sign_in_time)";
    $stmt2 = $pdo->prepare($sql);
    $stmt2->execute(
        [
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':id_number' => $id_number,
        ':phone_number' => $phone_number,
        ':reason_for_visiting' => $reason_for_visiting, 
        ':sign_in_time' => $sign_in_time,
        ]
    );
    header("Location:manage_visitors.php?successcode=1");
     
    
    
     
}
else {
    header("Location:choose_login.php");
}

?>