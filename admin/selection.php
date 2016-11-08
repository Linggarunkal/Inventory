<!DOCTYPE html>
<html lang="en">

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
<button class="form-control" data-toggle="modal" data-target="#modalLayout" style="width: 100px">New User</button>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modalLayout">
    <div class="modal-dialog" role="document" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Insert/Update User</h4>
            </div>
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
                            <input type="text" class="form-control" id="txtLevel">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Manager</label>
                        </td>
                        <td>
                            <select class="form-control select2">
                                <option selected="selected">-</option>
                                <option>Ani</option>
                                <option>Lisa</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>