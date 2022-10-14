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
              
              <a href="software_guide.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
                ><i class="fa-solid fa-book-open-reader"></i> <span class="pl-1">Software Guide</span></a
              >
            </div>
          </div>
        </nav>
        <!-- Sidebar -->
    </div>
    <div class="col-lg-10 mx-auto">
    <table class="table table-striped " >
              <thead>
                <tr class="text-danger">
                  <th scope="col-5">Action</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody class="text-dark">
                  <tr>
                    <td style="font-weight:550;width:200px;">Register Student.</td>
                    <td>Click on Register Student (on the sidebar), you will then be redirected to the Register Student page. Fill in the Register Student form with the student's details and click submit to register the student</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Manage Students.</td>
                    <td>To see and edit students details, click on Manage Students (on the sidebar)</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Add Book.</td>
                    <td>To add a new book, click on Add Book (on the sidebar). You will then be redirected to the Add Book page. Fill in the Add Book form by entering the details asked. Then click submit to add the book to the database. </td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Manage Books.</td>
                    <td>To add manage various books, click on Manage Books (on the sidebar). You will then be redirected to the Manage Books page</td>
                  </tr>

                  <tr>
                    <td style="font-weight:550;width:200px;">Manage Visitors</td>
                    <td>To add, manage and signout incoming visitors, go to the manage vistors section by clicking on manage visitors (On the sidebar.)</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Generate Report</td>
                    <td>To generate a report click on generate report (On the sidebar.)</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Emergency Contacts</td>
                    <td>To get in touch with emergency services such as ambulance and fire fighting, click on the emergency contacts section (On the sidebar.) to get emergency contacts.</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Evacuation Procedure</td>
                    <td>Incase of a fire or suspected fire outbreak, click on the evacuation procedure section (on the sidebar) and follow the instructions listed below. </td>
                  </tr>
                  
              </tbody>
          </table>
    </div>
  </div>
</div>


