<?php  echo @file_get_contents('header.php'); ?>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
  
} else {
  header("Location:choose_login.php");
}
?>


<?php  echo @file_get_contents('navbar.php'); ?>



<div class="container-fluid" >
  <div class="row" style="min-height:100vh;">
    <div class="col-lg-2" style="background-color:#edece6;padding: 0 !important;">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white h-100 w-100">
          <div class="position-sticky">
            <div class="list-group list-group-flush mx-1 mt-3">
              <a
                href="#"
                class="list-group-item list-group-item-action py-2 ripple"
                aria-current="true"
              >
              </a>
              <a href="index.php" class="list-group-item list-group-item-action py-2 ripple ">
              <i class="fa-solid fa-gauge"></i> <span class="px-1">Main Dashboard</span>
              </a>
              <a href="register_student.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-user-plus fa-fw me-3"></i> <span class="px-1">Register Student</span></a
              >

              <a href="manage_students.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
                ><i class="fas fa-users fa-fw me-3"></i> <span class="pl-1">Manage Students</span></a
              >

              <a href="add_book.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-plus"></i> <span class="pl-1">Add Book</span></a
              >

              <a href="manage_books.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-book"></i> <span class="pl-1">Manage Books</span></a
              >

              
              
              <a href="manage_visitors.php" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa fa-bus"></i> <span class="pl-1">Manage Visitors</span>
              </a>
              
              <a href="visitors_record.php" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa fa-file pl-1"></i> <span class="pl-1">Visitors Record</span>
              </a>

              <a href="generate_report.php" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa fa-info pl-1"></i> <span class="pl-1">Generate Report</span>
              </a>

              <a href="emergency_contacts.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-briefcase-medical"></i> <span class="pl-1">Emergency Contacts</span></a
              >
              <a href="evacuation_procedure.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-clipboard-list"></i> <span class="pl-1">Evacuation Procedure</span></a
              >
              
              <a href="software_guide.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-book-open-reader"></i> <span class="pl-1">Software Guide</span></a
              >
            </div>
          </div>
        </nav>
        <!-- Sidebar -->
    </div>
    <div class="col-lg-10 mx-auto">
    <?php
      if(isset($_GET['successcode'])){
            echo '<script>alert("Book Returned Successfully")</script>';
            echo '<script>window.location = "manage_borrowed_books.php"</script>';
      }

      ?>
    
    <div class="row my-4 px-3">
        
        <div class="h5 text-center my-3 w-100"><span class="text-light gradient-custom-3 px-3 py-2">Manage Borrowed Books</span></div>
        <table class="table table-striped " >
            <thead>
            <tr>
                <th scope="col">Book Title</th>
                <th scope="col">Book Author</th>
                <th scope="col">Student Reg No</th>
                <th scope="col">Date Borrowed</th>
                <th scope="col">Date Returned</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="text-dark">
                <?php
                    $servername = "localhost";
                    $root_username = "root";
                    $password = "";
                    $dbname = "library management system";
                    
                    try{
                        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $root_username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }

                    $sql="SELECT * FROM `borrowed book`";
                    $result = $pdo->query($sql);
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr><td style="vertical-align: middle;" class="col-2">'.$row["Book Title"].'</td><td style="vertical-align: middle;">'.$row["Author"].'</td><td style="vertical-align: middle;">'.$row["Registration Number"].'</td><td style="vertical-align: middle;">'.$row["Date Borrowed"].'</td><td style="vertical-align: middle;">'.$row["Date Returned"].'</td>';
                        $status = $row['Status'];
                        if ($status == "Not Returned"){
                            echo '<td style="vertical-align: middle;" class="bg-danger text-light text-center">'.$row["Status"].'</td>';
                            echo '<td style="vertical-align: middle;" ><a href="check_return_book.php?borrowed_book_id='.$row["Id"].'&book_id='.$row["Book Id"].'"><button data-rowid="'.$row["Id"].'" data-bookid="'.$row["Book Id"].'" data-booktitle="'.$row["Book Title"].'" data-bookauthor="'.$row["Author"].'" data-registrationnumber="'.$row["Registration Number"].'" data-dateborrowed="'.$row["Date Borrowed"].'" data-datereturned="'.$row["Date Returned"].'" data-status="'.$row["Status"].'" class="edit_tenant_details btn btn-info text-light btn-sm px-3 my-1"> Return Book <i class="fa fa-arrow-right px-1"></i></button></a></td></tr>';
                        }
                        else{
                            echo '<td style="vertical-align: middle;" class="bg-success text-light text-center">'.$row["Status"].'</td>';
                            echo '<td style="vertical-align: middle;"></td>';
                        }
                    }
                ?>
            </tbody>
                
        </table>
      </div>
    </div>
  </div>
</div>



