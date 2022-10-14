<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true) {
    $title = strtoupper($_POST['title']);
    $author = $_POST['author'];
    $no_of_pages = $_POST['no_of_pages'];
    $available_copies = $_POST['available_copies'];
    $date_issued = $_POST['date_issued'];


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


    $sql="SELECT * FROM `book` WHERE `Title`=:title";
     $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':title' => $title,      
    ));
     
    if($stmt->rowCount()<1){
        $sql="INSERT INTO `book`(`Title`, `Author`, `No Of Pages`, `Available Copies`, `Date Issued`) VALUES (:title, :author, :no_of_pages, :available_copies, :date_issued)";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->execute(
            [
            ':title' => $title,
            ':author' => $author,
            ':no_of_pages' => $no_of_pages,
            ':available_copies' => $available_copies,
            ':date_issued' => $date_issued,
            ]
        );
        header("Location:manage_books.php");
        
    }else{
        header("Location:add_book.php?errcode=1");
    }

     
    
    
     
}

else {
    header("Location:choose_login.php");
}
?>