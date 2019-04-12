<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Students Management system</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png" />
</head>


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="<?php echo base_url(); ?>images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="<?php echo base_url(); ?>images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">Schedule
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?php echo base_url(); ?>images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?php echo base_url(); ?>images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, Richard V.Welsh !</span>
              <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>images/faces/face1.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a class="dropdown-item">
                Change Password
              </a>
              <a class="dropdown-item">
                Check Inbox
              </a>
              <a class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Students</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/students">Enroll Students</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/students/student_promotion">Students Promotion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/students/view_students">View Students</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>admin/students/enroll_teacher">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Enroll Teacher</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>admin/students/enroll_class">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Enroll Class</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> 500 </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        	<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Students</h4>

                  <?php if($message!=''){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?php echo $message; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
              <form>
                <div class="row">
                  <!-- <form> -->
                  <div class="col-md-3">
                  <div class="form-group row required">
                    <label class="col-sm-4 col-form-label">Admission no</label>
                    <div class="col-sm-8">
                      <input type="text" name="ad_no" id="ad_no" class="form-control" >
                    </div>
                  </div>
                </div>

              <div class="col-md-3">
                <div class="form-group row required">
                  <label class="col-sm-3 col-form-label">Class</label>
                  <div class="col-sm-6">
                    <input type="text" name="class" id="class" class="form-control" >
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group row required">
                  <label class="col-sm-3 col-form-label">Division</label>
                  <div class="col-sm-6">
                    <input type="text" name="division" id="division" class="form-control" >
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group row required">
                  <div class="col-sm-6">
                    <input type="submit" name="submit" class="form-control" value="submit">
                  </div>
                </div>
              </div>
                  <!-- </form> -->
                </div>
                  </form>
                  
                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="myTable">
                      <thead>
                        <tr>
                          <th>Admission No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Class</th>
                          <th>Division</th>
                          <th>Parent Name</th>
                          <th>Parent Phone</th>
                          <th>Parents Add</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($students as $perreq) { ?>
                        <tr class="list">
                          <td><?php echo $perreq['login']->admission_no; ?></td>
                          <td class="py-1"><?php echo $perreq['login']->name; ?></td>
                          <td><?php echo $perreq['login']->email; ?></td>
                          <td><?php echo $perreq['student']->class; ?></td>
                          <td><?php echo $perreq['student']->division; ?></td>
                          <td><?php echo $perreq['student']->parent_name; ?></td>
                          <td><?php echo $perreq['student']->mob; ?></td>
                          <?php if($perreq['student']->status==0){ ?>
                            <td><a href="<?php echo base_url() ?>index.php/admin/students/enroll_parent/?id=<?php echo $perreq['login']->id; ?>">Add Parents</a></td>
                          <?php } else{ ?>
                            </td><td><a href="<?php echo base_url() ?>index.php/admin/students/view_parent/?id=<?php echo $perreq['login']->id; ?>">View Parents</a></td>
                         <?php } ?>
                          
                        </tr>
                      <?php } ?>
                        
                        
                      </tbody>
                    </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url(); ?>vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url(); ?>vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->

  <script>
    $(function () {
      $('form'). on('submit', function(e){
        //alert('hai.');
        // let data ={
        //     ad_no: $("#ad_no").val(),
        //     class: $("#class").val(),
        //     division: $("#division").val()
            //};
        //console.log(data);
        $.ajax({
          type:"POST",
          url:"filter",
          data: {
            ad_no: $("#ad_no").val(),
            class: $("#class").val(),
            division: $("#division").val()
            },
            success: function(result) {
              
              result = JSON.parse(result);
              //console.log('');
              if(result.success){
                $('.list').empty();
                if (result.data.status== "0") {
                  $('#myTable').append('<tr><td>'+result.data.admission_no+'</td><td>'+result.data.name+'</td><td>'+result.data.email+'</td><td>'+result.data.class+'</td><td>'+result.data.division+'</td><td>'+result.data.parent_name+'</td><td>'+result.data.mob+'</td><td><a href="<?php echo base_url() ?>index.php/admin/students/enroll_parent/?id='+result.data.id+'">Add Parents</a></td><td></td></td></tr><tr>...</tr>');
                } else {
                  $('#myTable').append('<tr><td>'+result.data.admission_no+'</td><td>'+result.data.name+'</td><td>'+result.data.email+'</td><td>'+result.data.class+'</td><td>'+result.data.division+'</td><td>'+result.data.parent_name+'</td><td>'+result.data.mob+'</td><td><a href="<?php echo base_url() ?>index.php/admin/students/view_parent/?id='+result.data.id+'">View Parents</a></td></tr>');
                
                }
                //console.log(result.data.id+" "+result.data.name);
              }
                
            }
        })
        e.preventDefault();
      })
    })
  </script>
</body>
</html>
