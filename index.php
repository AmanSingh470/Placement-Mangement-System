<?php require_once('api/constant.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BPIT | TP Department Management System</title>
  <link rel="stylesheet" href="<?= BASE_URL?>assets/bootstrap/bootstrap.min.css">
  <style>
    body {
      background-color: lightgrey;
    }

    #social-box {
      padding: 5px;
    }
  </style>

<body>

  <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?=BASE_URL?>">
        <img src="image/bpit_logo.jpg" alt="Logo" width="50" class="d-inline-block align-text-top">
        BPIT
      </a>
    </div>
  </nav>

  <div class="container-fluid">
    <h2 class="text-center my-4">Training And Placement Managemnt System</h2>
  </div>

  <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="studentModal">Students</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive mb-2">
            <table class="table table-hover datatable-shadow" width="100%" id="view-student-table">
              <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Dept ID</th>
                <th>CGPA</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Coord ID</th>
              </thead>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="coordinatorModal" tabindex="-1" aria-labelledby="coordinatorModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Students Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="table-responsive mb-2">
          <table class="table table-hover datatable-shadow" width="100%" id="view-coordinator-table">
            <thead>
              <th>Coordinator ID</th>
              <th>Contact No</th>
              <th>Address</th>
              <th>Coordinator Name</th>
            </thead>
          </table>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Company Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="table-responsive mb-2">
          <table class="table table-hover datatable-shadow" width="100%" id="view-company-table">
            <thead>
              <th>Company ID</th>
              <th>Company Name</th>
              <th>Address</th>
              <th>Grade</th>
              <th>Package</th>
              <th>Contact No</th>
              <th>Criteria ID</th>
            </thead>
          </table>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="placementModal" tabindex="-1" aria-labelledby="placementModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Placement Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="table-responsive mb-2">
          <table class="table table-hover datatable-shadow" width="100%" id="view-placement-table">
            <thead>
              <th>Placement ID</th>
              <th>Student Name</th>
              <th>Company Name</th>
            </thead>
          </table>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="eligibleStudentModal" tabindex="-1" aria-labelledby="eligibleStudentModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Eligible Student According to Company Criteria</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive mb-2">
            <table class="table table-hover datatable-shadow" width="100%" id="view-eligible-student-table">
              <thead>
                <th>Stud ID</th>
                <th>Name</th>
                <th>Dept ID</th>
                <th>CGPA</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Coordinator ID</th>
              </thead>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="compAndCriteriaModal" tabindex="-1" aria-labelledby="compAndCriteriaModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Company and their Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="table-responsive mb-2">
          <table class="table table-hover datatable-shadow" width="100%" id="view-comp-and-criteria-table">
            <thead>
              <th>Comp ID</th>
              <th>Comp Name</th>
              <th>Address</th>
              <th>Grade</th>
              <th>Package</th>
              <th>Contact No</th>
              <th>Dept Allowed</th>
              <th>CGPA Required</th>
            </thead>
          </table>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="container-xl text-center">
    <div class="row mb-2">
      <div class="col-md-4 col-lg-3 col-sm-6 col-12 col-xl-3">
        <div class="card m-3">
          <img src="image/student-card-img.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Students</h5>
            <button id="student-btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#studentModal">View Student</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 col-sm-6 col-12 col-xl-3">
        <div class="card m-3">
          <img src="image/coordinator-card-img.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Coordinators</h5>
            <button id="coordinator-btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#coordinatorModal">View Coordinators</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 col-sm-6 col-12 col-xl-3">
        <div class="card m-3">
          <img src="image/company-card-img.avif" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Company</h5>
            <button id="company-btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#companyModal">View Company</button>
          </div>
        </div>

      </div>
      <div class="col-md-4 col-lg-3 col-sm-6 col-12 col-xl-3">
        <div class="card m-3">
          <img src="image/placement-card-img.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Placements</h5>
            <button id="placement-btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#placementModal">View Placement</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 col-sm-6 col-12 col-xl-3">
        <div class="card m-3">
          <img src="image/student-eligible-card.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Students Eligible for companies according to company criteria's</h5>
            <button id="eligile-student-btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#eligibleStudentModal">View Eligible Students</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 col-sm-6 col-12 col-xl-3">
        <div class="card m-3">
          <img src="image/company-and-criteria-card.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Company with their criteria's</h5>
            <button id="company-and-criteria-btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#compAndCriteriaModal">View Company and Their Criteria</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="container-fluid">
    <div class="row bg-dark text-white p-3 align-items-center">
      <div class="col-md-4 col-sm-4 col-12 mt-3">
        <div>
          <img src="image/bpit_logo.jpg" height="80em" alt="">
        </div>
        <div>
          Bhagwan Parshuram Institute of Technology, Delhi was established by the Bhartiya Brahmin Charitable Trust in
          2007 with the aim to impart value-based education and to prepare the most competent and ingenious
          technocrats and leaders of the country.
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-12 mt-3">
        <h4>Address</h4>
        <div>
          <ul>
            <li>PSP-4</li>
            <li>Dr. Kn Katju marg</li>
            <li>Sector-17</li>
            <li>Rohini</li>
            <li>New Delhi-110089</li>
          </ul>
        </div>

      </div>
      <div class="col-md-4 col-sm-4 col-12 mt-3">
        <h4>Contact Us</h4>
        <ul>
          <li>Tel: 011-2757 1080, 011-2757 2900</li>
          <li>Mail: bpitindia@yahoo.com
      </div>
    </div>
  </footer>

  <div class="container-fluid text-center bg-black text-white">
    About the developer<br>
    Hi, I am Aman a BTECH student who loves developing applications
    <div id="social-box">
      <a href="https://github.com/AmanSingh470" target="_blank"><i class="fa-brands fa-github fa-beat m-2"></i></a>
      <a href="https://www.linkedin.com/in/aman-singh-a301a8291" target="_blank"><i
          class="fa-brands fa-linkedin-in fa-beat m-2"></i></a>
      <a href="https://www.instagram.com/amansingh__16" target="_blank"><i
          class="fa-brands fa-instagram fa-beat m-2"></i></a>
    </div>
  </div>

</body>
</html>

<script src="<?= BASE_URL?>/assets/jquery/jquery-3.7.1.min.js"></script>
<script src="<?= BASE_URL?>/assets/datatable/jquery.dataTables.min.js"></script>
<script src="<?= BASE_URL?>/assets/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASE_URL?>/assets/datatable/dataTables.responsive.min.js"></script>

<script src="<?= BASE_URL?>/assets/bootstrap/popper.min.js"></script>
<script src="<?= BASE_URL?>/assets/bootstrap/bootstrap.min.js"></script>
<script src="<?= BASE_URL?>/assets/fontawesome/fontawesome.js"></script>
<script src="<?= BASE_URL?>/assets/fontawesome/brands.js"></script>
<script src="<?= BASE_URL?>/ajax/admin.js"></script>