<?php  echo @file_get_contents('header.php'); ?>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
  
} else {
  header("Location:choose_login.php");
}
?>


<?php  echo @file_get_contents('navbar.php'); ?>


<div id="overlay" class="w-100 h-100" style="background-color:rgb(255,0,0,0.7);position:fixed;z-index:3;display:none;">

  <div class="container-fluid">
    <div class="d-flex justify-content-end my-3 mx-3">
        <span class="bg-light px-2 py-1" style="border-radius:50%;" onclick="hide_overlay()">
          <span class="fa fa-times text-danger" style="font-size:1.2rem;"></span>
        </span>
    </div>
    <div class="row">
      
    <div class="col-lg-10 mx-auto">
      
      <form action="check_edit_student_details.php" method="POST" class="my-5">
        
        <div class="card rounded-3 w-75 mx-auto" style="border-radius:12px;border-color:#d8363a;border-style:solid;border-width:medium;">
          <div class="card-body">
            <h4 class="text-center text-danger my-2">Edit Student Details</h4>
                  <!-- Start of php error display code -->
                  <!------------------------------------->
                  <?php
                  if(isset($_GET['errcode'])){
                      if($_GET['errcode']==1){
                          echo '<span style="color: red;">A Student with the registration number you entered already exists.</span>';
                      };

                      if($_GET['errcode']==2){
                          echo '<span style="color: red;">A Student with the phone number you entered already exists.</span>';
                      };

                      if($_GET['errcode']==3){
                        echo '<span style="color: red;">A Student with the student email you entered already exists.</span>';
                    };
                      
                  }

                  ?>
                  <!-- end of php error display code -->
                  <!----------------------------------->

              <input type="hidden" id="initial_registration_number" name="initial_registration_number" required>
              <div class="row py-2">
                  <div class="col-md-6">
  
                    <div class="form-outline datepicker">
                      <label class="form-label h6">First Name: </label>
                      <input id="first_name" type="text" maxlength="100" name="first_name" class="form-control" required/>
                      
                    </div>
  
                  </div>
                  <div class="col-md-6">
  
                    <div class="form-outline datepicker">
                      <label class="form-label h6">Last Name: </label>
                      <input id="last_name" type="text" maxlength="100" name="last_name" class="form-control" required/>
                      
                    </div>
  
                  </div>
              </div>

              <div class="row py-2">
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">Registration Number: </label>
                    <input id="registration_number" type="text" minlength="8" maxlength="20" name="registration_number" class="form-control" required />
                    
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">Phone Number : </label>
                    <input id="phone_number" type="text" minlength="10" maxlength="15" name="phone_number" class="form-control" required/>
                    
                  </div>

                </div>
            </div>

            <div class="row py-2">
                <div class="col-md-12">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">Student Email: </label>
                    <input id="student_email" type="email" minlength="4" maxlength="100" name="student_email" class="form-control" required />
                    
                  </div>

                </div>
                
            </div>


            <div class="d-flex justify-content-end">
              <button type="submit" class=" my-2 btn btn-lg mb-1 gradient-custom-3 text-light">Save</button>
            </div>
  
          </div>
        </div>
      </form>
    </div>
    </div>
  </div>

</div>


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
          if($_GET['successcode']==1){
              echo '<script>alert("Student Details Edited Successfully")</script>';
          };
          
      }

      ?>
    
    <div class="row my-4 px-3">
        
        <div class="h5 text-center my-3 w-100"><span class="text-light gradient-custom-3 px-3 py-2">Students Details</span></div>
        <table class="table table-striped " >
            <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Registration Number</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Student Email</th>
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

                    $sql="SELECT * FROM `students`";
                    $result = $pdo->query($sql);
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr><td>'.$row["First Name"].'</td><td>'.$row["Last Name"].'</td><td>'.$row["Registration Number"].'</td><td>'.$row["Phone Number"].'</td><td>'.$row["Student Email"].'</td>';
                        echo '<td><button data-firstname="'.$row["First Name"].'" data-lastname="'.$row["Last Name"].'" data-registrationnumber="'.$row["Registration Number"].'" data-phonenumber="'.$row["Phone Number"].'" data-studentemail="'.$row["Student Email"].'" class="edit_tenant_details btn btn-secondary text-light btn-md px-3 my-1"><i class="fa fa-pen"></i> Edit Details </button></td></tr>';
                        
                    }
                ?>
            </tbody>
                
        </table>
      </div>
    </div>
  </div>
</div>


<script>
  let btns = document.querySelectorAll(".edit_tenant_details");

  for (let i = 0; i < btns.length; i++) {
      let btn = btns[i];
      btn.addEventListener("click", edit_tenant_details);

  }


  function edit_tenant_details(event) {
      let firstname = event.target.dataset.firstname;
      let lastname = event.target.dataset.lastname;
      let registrationnumber = event.target.dataset.registrationnumber;
      let phonenumber = event.target.dataset.phonenumber;
      let studentemail = event.target.dataset.studentemail;

      document.getElementById("first_name").value = firstname;
      document.getElementById("last_name").value = lastname;
      document.getElementById("registration_number").value = registrationnumber;
      document.getElementById("phone_number").value = phonenumber;
      document.getElementById("student_email").value = studentemail;
      document.getElementById("initial_registration_number").value = registrationnumber;
      
      document.getElementById("overlay").style.display = "block";

  }

  function hide_overlay(){
    document.getElementById("overlay").style.display = "none";
  }



</script>


