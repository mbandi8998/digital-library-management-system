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
              <a href="index.php" class="list-group-item list-group-item-action py-2 ripple">
              <i class="fa-solid fa-gauge"></i> <span class="px-1">Main Dashboard</span>
              </a>
              <a href="register_student.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-user-plus fa-fw me-3"></i> <span class="px-1">Register Student</span></a
              >

              <a href="manage_students.php" class="list-group-item list-group-item-action py-2 ripple"
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

              <a href="generate_report.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3">
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

    <div class="col-lg-2">
        
    </div>
    
    <div class="col-lg-7">
        <div class="h5 text-danger text-center mt-3">Digital Library Management System - Report</div>
        <div class="w-100 bg-danger" style="height:2px;"></div>
        <div class="h6 text-secondary text-center my-2">
            Report Generated at - 
            
            <?php
                date_default_timezone_set("Africa/Nairobi");
                $date_time = date("h:i:s d-m-Y");
                echo '<span class="text-primary">'.$date_time.'</span>';
            ?>
        </div>
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

          $year = date("Y");
          $month = date("m");
          $yearly_revenue = 0;
          $total_unpaid_rent = 0;
          $paid_rent_this_month = 0;
          $unpaid_rent_this_month = 0;
          $no_of_tenants = 0;
          $no_of_houses = 0;
          $no_of_occupied_houses = 0;
          $no_of_vacant_houses = 0;
          $no_of_visitors = 0;

          $sql="SELECT * FROM `book` ";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          
          $total_available_copies = 0;

          while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
              $available_copies = $row["Available Copies"];
              $total_available_copies += $available_copies;
            
          };

          $sql6 ="SELECT * FROM `students` ";
          $stmt6 = $pdo->prepare($sql6);
          $stmt6->execute();
          $no_of_students = $stmt6->rowCount();

          $sql7 ="SELECT * FROM `book` ";
          $stmt7 = $pdo->prepare($sql7);
          $stmt7->execute();
          $no_of_books = $stmt7->rowCount();

          $sql8 ="SELECT * FROM `borrowed book` WHERE `Status` = 'Not Returned' ";
          $stmt8 = $pdo->prepare($sql8);
          $stmt8->execute();
          $no_of_borrowed_books = $stmt8->rowCount();


          $sql10 ="SELECT * FROM `visitors` ";
          $stmt10 = $pdo->prepare($sql10);
          $stmt10->execute();
          $no_of_visitors = $stmt10->rowCount();

            
        echo    '<table class="table table-striped " >
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    
                </tr>
                </thead>
                <tbody class="text-dark">
                    <tr>
                        <td scope="col-2 text-dark" style="font-weight:bold;">Current Number Of Registered Students:</td>
                        <td>'.$no_of_students.'</td>
                    </tr>
                    <tr>
                        <td scope="col-2 text-dark" style="font-weight:bold;">No Of Available Books:</td>
                        <td>'.$no_of_books.'</td>
                    </tr>
                    <tr>
                        <td scope="col-2 text-dark" style="font-weight:bold;">No Of Available Book Copies:</td>
                        <td>'.$total_available_copies.'</td>
                    </tr>

                    <tr>
                        <td scope="col-2 text-dark" style="font-weight:bold;">Number Of Borrowed Books:</td>
                        <td>'.$no_of_borrowed_books.'</td>
                    </tr>
                    
                    <tr>
                        <td scope="col-2 text-dark" style="font-weight:bold;">Total Number Of Visitors:</td>
                        <td>'.$no_of_visitors.'</td>
                    </tr>
                
                </tbody>
                    
            </table>
            '
        ?>
    </div>
  </div>
</div>


