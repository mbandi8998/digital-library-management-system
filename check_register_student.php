<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $registration_number = strtoupper($_POST['registration_number']);
    $phone_number = $_POST['phone_number'];
    $student_email = $_POST['student_email'];

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


    $sql="SELECT * FROM `students` WHERE `Registration Number`=:registration_number";
     $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':registration_number' => $registration_number,      
    ));


    $sql="SELECT * FROM `students` WHERE `Phone Number`=:phone_number";
    $stmt3 = $pdo->prepare($sql);
    $stmt3->execute(array(
        ':phone_number' => $phone_number,      
    ));

    while ( $row = $stmt3->fetch(PDO::FETCH_ASSOC) ) {
        $phone_number_exists = $row["Phone Number"];
    }

    if (strlen($phone_number_exists) > 0){
        header("Location:register_student.php?errcode=2");
    }

    $sql="SELECT * FROM `students` WHERE `Student Email`=:student_email";
    $stmt3 = $pdo->prepare($sql);
    $stmt3->execute(array(
        ':student_email' => $student_email,      
    ));

    while ( $row = $stmt3->fetch(PDO::FETCH_ASSOC) ) {
        $student_email_exists = $row["Student Email"];
    }

    if (strlen($student_email_exists) > 0){
        header("Location:register_student.php?errcode=3");
    }
    else{
        $sql4 = "UPDATE `house` SET `Vacant` = 'no' WHERE `House Number`=:house_number";
        $stmt4 = $pdo->prepare($sql4);
        $stmt4->execute(array(
            ':house_number' => $house_number,      
        ));

    }
     
    if($stmt->rowCount()<1){
        date_default_timezone_set("Africa/Nairobi");
        $joined = date("d-m-y");

        $sql = "INSERT INTO `students`(`First Name`, `Last Name`, `Registration Number`, `Phone Number`, `Student Email`) VALUES (:first_name, :last_name, :registration_number, :phone_number, :student_email)";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->execute(
            [
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':registration_number' => $registration_number,
            ':phone_number' => $phone_number,
            ':student_email' => $student_email,
            ]
        );
        header("Location:manage_students.php");
        
        
    }else{
        header("Location:register_student.php?errcode=1");
    }

     
    
    
     
}
else {
header("Location:choose_login.php");
}
?>