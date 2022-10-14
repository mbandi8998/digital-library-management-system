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
                ><i class="fas fa-users fa-fw me-3"></i> <span class="pl-1">Manage Tenants</span></a
              >

              <a href="add_book.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-plus"></i> <span class="pl-1">Add Book</span></a
              >

              <a href="manage_books.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
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
      <div class="text-danger h4 text-center my-2"><i class="fa fa-book"></i> Books</div>

      <div class="row my-3">
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

            $sql="SELECT * FROM `book`";
            $result = $pdo->query($sql);
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo '
              <div class="col-lg-4">
                <div class="card bg-secondary px-2 text-light">
                      <div class="text-light text-center h5 mt-2">
                        <span>'.$row["Title"].'</span>
                      </div>
                      <div class="divider bg-success w-100 my-2" style="height:2px;"></div>
                      <div class="px-1">
                        <span class="badge bg-danger py-2 px-2 h6">Author:</span>
                        <span>'.$row["Author"].'</span>
                      </div>
                      <div class="divider bg-danger my-2 w-100" style="height:2px;"></div>
                      <div class="px-1">
                        <span class="badge bg-danger py-2 px-2 h6">No of pages:</span>
                        <span>'.$row["No Of Pages"].'</span>
                      </div>
                      <div class="divider bg-danger my-2  w-100" style="height:2px;"></div>
                      <div class="px-1">
                        <span class="badge bg-success py-2 px-2 h6">Available Copies:</span>
                        <span>'.$row["Available Copies"].'</span>
                      </div>
                      <div class="divider bg-danger my-2 w-100" style="height:2px;"></div>
                      <div class="px-1">
                        <span class="badge bg-danger py-2 px-2 h6">Date Issued:</span>
                        <span>'.$row["Date Issued"].'</span>
                      </div>
                </div>
              </div>
              ';
            }
        ?>
      </div>
    </div>
  </div>
</div>


    
    



