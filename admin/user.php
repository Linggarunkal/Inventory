<!DOCTYPE html>
<html lang="en">
<?php
require('connection.php');
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Inventory</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.html">Inventory Admin</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="home.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="divisi.html"><i class="fa fa-briefcase fa-fw"></i> Divisi</a>
                    </li>
                    <li>
                        <a href="user.html"><i class="fa fa-users fa-fw"></i> User</a>
                    </li>
                    <li>
                        <a href="model.html"><i class="fa fa-archive fa-fw"></i> Model</a>
                    </li>
                    <li>
                        <a href="barang.html"><i class="fa fa-hdd-o fa-fw"></i> Barang</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Management</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List User
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Manager</th>
                                <th style="width: 60px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Budi</td>
                                <td>Finance</td>
                                <td>budi@gmail.com</td>
                                <td>budi_user</td>
                                <td>12345</td>
                                <td>User</td>
                                <td>Ani</td>
                                <td><a href="#" data-toggle="modal" data-target="#modalLayout"><i class="fa fa-plus-circle fa-fw"></i></a> <a href="#" onclick="Delete()"><i class="fa fa-times-circle fa-fw"></i></a> </td>
                            </tr>
                            <tr>
                                <td>Ani</td>
                                <td>Finance</td>
                                <td>ani@gmail.com</td>
                                <td>ani_user</td>
                                <td>12345</td>
                                <td>Manager</td>
                                <td>Riri</td>
                                <td><a href="#" data-toggle="modal" data-target="#modalLayout"><i class="fa fa-plus-circle fa-fw"></i></a> <a href="#" onclick="Delete()"><i class="fa fa-times-circle fa-fw"></i></a> </td>
                            </tr>
                            <tr>
                                <td>Siska</td>
                                <td>Finance</td>
                                <td>siska@gmail.com</td>
                                <td>siska_user</td>
                                <td>12345</td>
                                <td>User</td>
                                <td>Ani</td>
                                <td><a href="#" data-toggle="modal" data-target="#modalLayout"><i class="fa fa-plus-circle fa-fw"></i></a> <a href="#" onclick="Delete()"><i class="fa fa-times-circle fa-fw"></i></a> </td>
                            </tr>
                            <tr>
                                <td>Badu</td>
                                <td>Finance</td>
                                <td>badu@gmail.com</td>
                                <td>badu_admin</td>
                                <td>12345</td>
                                <td>Admin</td>
                                <td>-</td>
                                <td><a href="#" data-toggle="modal" data-target="#modalLayout"><i class="fa fa-plus-circle fa-fw"></i></a> <a href="#" onclick="Delete()"><i class="fa fa-times-circle fa-fw"></i></a> </td>
                            </tr>
                            </tbody>
                        </table>

                        <button class="form-control" data-toggle="modal" data-target="#modalLayout" style="width: 100px">New User</button>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

    </div>
    <!-- /#page-wrapper -->

</div>

<!-- dialog form insert or update user -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modalLayout">
    <div class="modal-dialog" role="document" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Insert/Update User</h4>
            </div>
            <form>
            <div class="modal-body">
                <table style="width: 100%;font-size: 15px">
                    <tr>
                        <td>
                            <label>Nama</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="txtNama">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Divisi</label>
                        </td>
                        <td>
                            <select class="form-control select2">
                                <option selected="selected">-</option>
                                <option>GA</option>
                                <option>Finance</option>
                                <option>Accounting</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="txtEmail">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="txtUserName">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="txtPassword">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Level</label>
                        </td>
                        <td>
                            <select  class="form-control select2" name="level" id="level">
                                <option value="" selected="selected">-- Select --</option>
                                <option value="1">User</option>
                                <option value="2">Manager</option>
                                <option value="3">Admin</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Manager</label>
                        </td>
                        <td>
                            <select class="form-control select2" name="manager" id="manager">
                                <option value="" selected="selected">-- Select --</option>
                                <option value="1">Ani</option>
                                <option value="2">Lisa</option>
                            </select>
                        </td>
                        
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<?php
    $getLevel = "select id_level from level_tb where role_level = 'user'";
    $resLevel = $conn->query($getLevel);
    $row = $resLevel->fetch_assoc();
    // echo "".$row['id_level']."";
    $milik = $row['id_level'];

?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    function Delete() {
        confirm("Are You Sure?");
    }





</script>
<script>
    $('#level').on('change', function(){
        if($(this).val()==='1'){
    $('#manager').attr('disabled', false);
    }else{
    $('#manager').attr('disabled', 'disabled');
    }
    });
</script>

</body>

</html>
