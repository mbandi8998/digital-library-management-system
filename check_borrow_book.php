<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true) {
    $registration_number = strtoupper($_POST['registration_number']);
    $book_id = $_POST['book_id'];

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

    if($stmt->rowCount()>0){
        $sql2="SELECT * FROM `book` WHERE `Id`=:book_id";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute(array(
            ':book_id' => $book_id,      
        ));

        $available_copies = 0;
        $book_id = "";
        $book_title = "";
        $book_author = "";
        while ( $row = $stmt2->fetch(PDO::FETCH_ASSOC) ) {
            $available_copies = $row["Available Copies"];
            $book_id = $row["Id"];
            $book_title = $row["Title"];
            $book_author = $row["Author"];
        }

        if($available_copies>0){
            date_default_timezone_set("Africa/Nairobi");
            $date_borrowed = date("d-m-y");

            $sql2="INSERT INTO `borrowed book`(`Book Id`, `Book Title`, `Registration Number`, `Date Borrowed`, `Author`) VALUES (:book_id, :book_title, :registration_number, :date_borrowed, :book_author)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(
                [
                ':book_id' => $book_id,
                ':book_title' => $book_title,
                ':registration_number' => $registration_number,
                ':date_borrowed' => $date_borrowed,
                ':book_author' => $book_author,
                ]
            );
            
            $available_copies -=1;
            $sql3 = "UPDATE `book` SET `Available Copies` = '$available_copies' WHERE `Id`=:book_id";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->execute(array(
                ':book_id' => $book_id,      
            ));

            header("Location:index.php?successcode");
        }
        else{
            header("Location:index.php?errorcode1");
        }
        
        
    }else{
        header("Location:index.php?errorcode2");
    }

     
}

else {
    header("Location:choose_login.php");
}

?>