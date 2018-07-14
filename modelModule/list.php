
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
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Common Css -->
    <link rel="stylesheet" href="../build/css/common.css">
  </head>
<?php 
  include '../DatabaseConnection.php';
  include 'ModelsModel.php';
  $model = Model::getInstance();
  $result= $model->listModelRecords();
  
?>
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
                        <li><a href='<?php echo "http://$_SERVER[HTTP_HOST]/carinventory/modelModule/create.php" ?>'>Add Model</a>
                        </li>
                        <li><a href="">View List</a>
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
                    <h2>Model List<small>Car Inventory</small></h2>
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
                    <table id="datatable" class="table table-striped table-bordered sortable">
                      <thead>
                        <tr>
                          <th>S No.</th>
                          <th>Model Name</th>
                          <th>Manufacturer Name</th>
                          <th>Manufacturing year</th>
                          <th>Registration Numnber</th>
                          <th>Count</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($result as $key=>$value){ ?>
                        <tr data-toggle="modal" data-target="#exampleModal" id = "id" modelId='<?php echo $value['id']; ?>'>
                          <td><?php echo $key+1; ?></td>
                          <td><?php echo $value['model_name']; ?></td>
                          <td><?php echo $value['manufacturer_name']; ?></td>
                          <td><?php echo $value['manufacturing_year']; ?></td>
                          <td><?php echo $value['registration_number']; ?></td>
                          <td><?php echo $value['model_count']; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Model Details</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered modelClass">
                  <tbody>
                    <tr>
                      <input type="hidden" name="idToSell" id="idToSell" value="">
                      <td><p class="heading">Model Name:</p><p class="modelName"></p></td>
                      <td><p  class="heading">Manufacturer Name :</p><p class="manufacturerName"></p></td>
                      <td><p  class="heading">No. of Models To Sold :</p><p class="model_count"></p></td>
                    </tr>
                  </tbody>
            </table>
            <div class="col-md-12">
              <div class="col-md-6"><img id="file_one" src="" style="width:15em; height:15em;"/><br/></div>
              <div class="col-md-6"><img id="file_second" src="" style="width:15em; height:15em;"/><br/></div>
            </div>
            <br/>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="#" name="sellTheItem" id="sellTheItem" >Sold</a>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript" src="../build/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../build/js/common.js"></script>
    <script type="text/javascript">
        $("#datatable tr").click(function(){
          var attr1 = $(this).attr('modelId');
          $.ajax({ 
                    url: 'ModelsController.php',
                    data: {
                      valueToGetby: 'getDataById',
                      id: attr1 
                    },
                    type: 'post',
                    success: function(response) {
                        var obj = JSON.parse(response);
                        $.each(obj, function(key, value) {
                          $('#idToSell').attr('value',value.id);
                          $('.modelName').html(value.model_name); 
                          $('.manufacturerName').html(value.manufacturer_name);
                          $('.model_count').html(value.model_count);
                          $('#file_one').attr('src','uploadedimages/'+value.file_upload_one);
                          $('#file_second').attr('src','uploadedimages/'+value.file_upload_second);
                          var id = value.id; 
                        });
                    }
                });
        });

        $(document).on('click', '#sellTheItem', function(event) {
            deleteId = $('#idToSell').val();
            $.ajax({ 
              url: 'ModelsController.php',
              data: {
                deleteFlag: true,
                idToDelete:deleteId
              },
              type: 'post',
              success: function(response) {
                window.location="list.php?message="+response;
              }
            });
        });
    </script>
  </body>
</html>
