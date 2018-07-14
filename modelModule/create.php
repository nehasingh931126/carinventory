
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Car Inventory Demo | CodeMax </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap Date-Picker Plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Common Css -->
    <link rel="stylesheet" href="../build/css/common.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/carinventory" class="site_title"><i class="fa fa-car"></i> <span>Car Inventory</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/codemax.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>CodeMax</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>Manufacturer<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href='<?php echo "http://$_SERVER[HTTP_HOST]/carinventory/manufactureModule/create.php" ?>'>Add Manufacturer</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i>Add Model<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="">Add Model</a>
                        </li>
                        <li><a href='<?php echo "http://$_SERVER[HTTP_HOST]/carinventory/modelModule/list.php" ?>'>View List</a>
                        </li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
           <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Model<small>Car Inventory</small></h2>
                    <div class="clearfix"></div>
                    <?php
                        if(!empty($_REQUEST['message']) && isset($_REQUEST['message'])){ 
                          $message = $_REQUEST['message'] 
                          ?>
                          <div class="alert alert-success ">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <p><?php echo $message; ?></p>
                          </div>
                    <?php } ?>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="model_form" name="model_form" action="ModelsController.php" method="post" enctype="multipart/form-data">
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Model Name" required>
                        <span class="fa fa-car form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <select class="form-control" id="manufacturer_name" name="manufacturer_name" required>
                            <option value="">Select Manufacturer</option>
                        </select>
                        <span class="fa fa-car form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="color" placeholder="Color" name="color" required>
                        <span class="fa fa-check-circle form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="manufacturing_year" name="manufacturing_year" placeholder="Manufacturing Year">
                        <span class="glyphicon glyphicon-calendar form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="Registration Number">
                        <span class="glyphicon glyphicon-calendar form-control-feedback right"aria-hidden="true"></span>
                      </div>
                      <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="file" class="form-control" name="file_upload[]" id="file_upload" required multiple>
                        <span class="fa fa-file-image-o form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control" name="model_count" id="model_count" required>
                        <span class="fa fa-car form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" placeholder="Notes" name="notes" id="notes"></textarea>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            @Created By Neha Singh</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript" src="../build/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../build/js/common.js"></script>
    <script>
        $( document ).ready(function() {
          $.ajax({
                url: 'ModelsController.php',
                data: {
                  action: 'get_all_manfacturers_name'
                },
                type: 'post',
                success: function(response) {
                    var obj = JSON.parse(response);
                    $.each(obj, function(key, value) {
                    $('#manufacturer_name')
                        .append($("<option></option>")
                          .attr("value",value.id)
                          .text(value.manufacturer_name)); 
                    });
                }
          });
        });
    </script>
  </body>
</html>
