<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FIELDWORK PLATFORM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
 
  <style>
    /* Custom styles for the log book form */
    .log-book-day {
      position: relative;
      padding-bottom: 35px; /* Space for icons */
    }

    .log-book-day .icon {
      position: absolute;
      top: 10px;
      right: 45px;
      cursor: pointer;
    }

    .log-book-day .save-icon {
      right: 10px;
    }

    .log-book-day .icon:hover {
      color: #007bff; /* Change color on hover */
    }

    /* Additional styling */
    .log-book-container {
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .log-book-title {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .log-book-week {
      margin-bottom: 30px;
    }

    .log-book-week h6 {
      margin-top: 30px;
    }

    .log-book-day textarea {
      resize: none;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">FIELDWORK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Image Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('student-dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link active" href="{{route('log-book')}}">
          <i class="bi bi-bell"></i>
          <span>Log Book</span>
        </a>
      </li><!-- End Send Notifications Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('student-profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Log Book</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Log Book</li>
          <li class="breadcrumb-item active">Week 1</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body log-book-container">
                <form id="logBookForm">
                  <div class="row">
                    <!-- Create 8 weeks fields -->
                    <div class="col-md-12">
                      <h6 class="log-book-title">Week 1</h6>
                      <!-- Create 5 days fields for Week 1 -->
                      <div class="row log-book-week">
                        <!-- Repeat for each day (day1 to day5) -->
                        <div class="col-md-6">
                          <div class="mb-3 log-book-day">
                            <label for="week1_day1" class="form-label">Day 1</label>
                            <textarea class="form-control" id="week1_day1" name="week1_day1" rows="3"></textarea>
                            <i class="bi bi-pencil icon edit-icon" title="Edit"></i>
                            <i class="bi bi-save icon save-icon" title="Save"></i>
                          </div>
                        </div>
                        <!-- Repeat similar for day2 to day5 -->
                        <div class="col-md-6">
                          <div class="mb-3 log-book-day">
                            <label for="week1_day2" class="form-label">Day 2</label>
                            <textarea class="form-control" id="week1_day2" name="week1_day2" rows="3"></textarea>
                            <i class="bi bi-pencil icon edit-icon" title="Edit"></i>
                            <i class="bi bi-save icon save-icon" title="Save"></i>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3 log-book-day">
                            <label for="week1_day3" class="form-label">Day 3</label>
                            <textarea class="form-control" id="week1_day3" name="week1_day3" rows="3"></textarea>
                            <i class="bi bi-pencil icon edit-icon" title="Edit"></i>
                            <i class="bi bi-save icon save-icon" title="Save"></i>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3 log-book-day">
                            <label for="week1_day4" class="form-label">Day 4</label>
                            <textarea class="form-control" id="week1_day4" name="week1_day4" rows="3"></textarea>
                            <i class="bi bi-pencil icon edit-icon" title="Edit"></i>
                            <i class="bi bi-save icon save-icon" title="Save"></i>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3 log-book-day">
                            <label for="week1_day5" class="form-label">Day 5</label>
                            <textarea class="form-control" id="week1_day5" name="week1_day5" rows="3"></textarea>
                            <i class="bi bi-pencil icon edit-icon" title="Edit"></i>
                            <i class="bi bi-save icon save-icon" title="Save"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Add a button to submit the log book -->
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Submit Log Book</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/bootstrap-icons/bootstrap-icons.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Populate weeks and days dynamically
      const logBookForm = document.getElementById('logBookForm');
      for (let week = 1; week <= 8; week++) {
        const weekSection = document.createElement('div');
        weekSection.classList.add('col-md-12');
        weekSection.innerHTML = `<h6>Week ${week}</h6>`;
        
        const weekRow = document.createElement('div');
        weekRow.classList.add('row');
        
        for (let day = 1; day <= 5; day++) {
          const dayCol = document.createElement('div');
          dayCol.classList.add('col-md-6');
          dayCol.innerHTML = `
            <div class="mb-3 log-book-day">
              <label for="week${week}_day${day}" class="form-label">Day ${day}</label>
              <textarea class="form-control" id="week${week}_day${day}" name="week${week}_day${day}" rows="3"></textarea>
              <i class="bi bi-pencil icon edit-icon" title="Edit"></i>
              <i class="bi bi-save icon save-icon" title="Save"></i>
            </div>
          `;
          weekRow.appendChild(dayCol);
        }
        
        weekSection.appendChild(weekRow);
        logBookForm.insertBefore(weekSection, logBookForm.querySelector('.col-md-12'));
      }

      // Function to handle form submission
      document.getElementById('logBookForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Collect data from all weeks and days fields
        const logBookData = {};
        for (let week = 1; week <= 8; week++) {
          for (let day = 1; day <= 5; day++) {
            const dayField = document.getElementById(`week${week}_day${day}`);
            logBookData[`week${week}_day${day}`] = dayField.value;
          }
        }
        // Here you can handle the submission of log book data, such as saving it to a database
        console.log('Log Book Data:', logBookData);
        // You can replace the console.log with actual code to handle form submission
      });

      // Function to generate PDF report
      function generatePDF() {
        // Here you can generate the PDF report using a library like jsPDF
        // For demonstration purposes, let's assume the PDF generation code is already implemented
        console.log('Generating PDF report...');
        // You can replace the console.log with actual code to generate PDF report
      }

      // Event listener for download PDF button
      document.getElementById('downloadPDF').addEventListener('click', function() {
        generatePDF();
      });

      // Function to save day data
      function saveDay(week, day) {
        const textarea = document.getElementById(`week${week}_day${day}`);
        const data = textarea.value;
        // Here you can save the data to a database or perform any other action
        console.log(`Saving data for Week ${week}, Day ${day}:`, data);
      }

      // Function to edit day data
      function editDay(week, day) {
        // This function can be used to enable editing of the corresponding textarea
        const textarea = document.getElementById(`week${week}_day${day}`);
        textarea.disabled = false;
        textarea.focus();
      }
    });
  </script>
</body>

</html>
