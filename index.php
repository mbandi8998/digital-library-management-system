<?php  echo @file_get_contents('header.php'); ?>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
  
} else {
  header("Location:choose_login.php");
}
?>


<?php  echo @file_get_contents('navbar.php'); ?>


<div class="container-fluid" style="background-image:url('bg001.jpg');background-size:cover;">
    <div class="row" style="min-height:100vh;">
      <div class="col-lg-2" style="background-color:#edece6;padding: 0 !important;">
          <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white h-100 w-100">
          <div class="position-sticky">
            <div class="list-group list-group-flush mx-1 mt-3">
              <a href="index.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3">
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

      <div class="col-lg-10 my-3 mx-auto" style="min-height: 60vh;">
      <div class="row">
        <div class="col-lg-6">
          <div class="text-center my-2 h5 text-light">Quick Access</div>
          <div class="divider w-100 bg-light" style="height:2px;"></div>
          <div class="my-3">
            <a href="manage_visitors.php" class="d-flex justify-content-between text-light h5" style="text-decoration:none;">
              <span>Manage Visitors</span>
              <span class="fa fa-arrow-right "></span>
            </a>
          </div>
          <div class="divider w-100 bg-light" style="height:2px;"></div>
          <div class="my-3">
            <a href="visitors_record.php" class="d-flex justify-content-between text-light h5" style="text-decoration:none;">
              <span>Visitors Record</span>
              <span class="fa fa-arrow-right "></span>
            </a>
          </div>
          <div class="divider w-100 bg-light" style="height:2px;"></div>
          <div class="my-3">
            <a href="manage_borrowed_books.php" class="d-flex justify-content-between text-light h5" style="text-decoration:none;">
              <span>Manage Borrowed Books</span>
              <span class="fa fa-arrow-right "></span>
            </a>
          </div>
          <div class="divider w-100 bg-light" style="height:2px;"></div>
          <div class="my-3">
            <a href="generate_report.php" class="d-flex justify-content-between text-light h5" style="text-decoration:none;">
              <span>Generate Report</span>
              <span class="fa fa-arrow-right "></span>
            </a>
          </div>
          
        </div>
        <div class="col-lg-6">
        <form action="check_borrow_book.php" method="POST" class="my-5">
          <div class="card rounded-3 w-75 mx-auto" style="border-radius:12px;border-color:#d8363a;border-style:solid;border-width:medium;">
            <div class="card-body">
              <h4 class="text-center text-danger my-2">Borrow A Book</h4>
                    <!-- Start of php error display code -->
                    <!------------------------------------->
                    
                    <?php
                      if(isset($_GET['successcode'])){
                        echo '<script>alert("Book Borrowed Successfully")</script>';                      
                      }
                      if(isset($_GET['errorcode1'])){
                        echo '<span style="color: red;">There are no copies of this book remaining. All copies may have been borrowed.</span>';                      
                      }
                      if(isset($_GET['errorcode2'])){
                        echo '<div style="border-radius:12px;" class="bg-danger px-2 py-1"><span class="text-light">No student with the entered registration number exists in the system. Kindly check if the registration number was entered correctly.</span><span class="text-dark pb-2" style="font-weight:550;"> If the student is not registered in the system, kindly register them first</span></div>';                      
                      }
                      

                    ?>
                    <!-- end of php error display code -->
                    <!----------------------------------->

                <div class="row py-2">
                    <div class="col-md-12">

                      <div class="form-outline datepicker">
                        <label class="form-label h6">Registration number: </label>
                        <input type="text" minlength="7" maxlength="20" name="registration_number" class="form-control" required />
                        
                      </div>

                    </div>
                    <div class="col-md-12 my-2">

                      <div class="form-outline datepicker">
                        <label class="form-label h6">Select book to be borrowed: </label>
                        <select name="book_id" id="book_id" class="form-control bg-danger text-light" required>
                          <option class="text-light">Select Book</option>
                          <?php
                            session_start();
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

                            $sql5="SELECT * FROM `book`";
                            $stmt5 = $pdo->prepare($sql5);
                            $stmt5->execute();
                            while ( $row = $stmt5->fetch(PDO::FETCH_ASSOC) ) {
                                echo '<option value="'.$row["Id"].'" class="text-light">'.$row["Title"].'</option>';
                            }
                          ?>
                        </select>
                        
                      </div>

                    </div>
                    <div class="col-md-12 my-2">
                      <div class="d-flex justify-content-end">
                        <button type="submit" class=" my-2 btn btn-lg btn-danger mb-1 gradient-custom-3">Borrow</button>
                      </div>
                    </div>

                </div>

              
    
            </div>
          </div>
        </form>
        </div>

        </div>
      </div>
    </div>
  </div>
  
