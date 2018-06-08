<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="../assets/style.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
        <!-- Amaran Notification  -->
		<link rel="stylesheet" href="../assets/css/amaran.min.css" type="text/css" />
		<link rel="stylesheet" href="../assets/css/animate.min.css" type="text/css" />
        <!--Bootstrap Datatable-->
        <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap.min.css">
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <!-- TITLE -->
        <title>Simple CRUD with Pagination and Search | Ajax</title>
    </head>
    <body>
        <header class="site-class--title">
            <h2>Simple Crud with Pagination and Search | Ajax</h2>
            <small>By: Jan Kenneth Sajo</small>
        </header>
        <div class="container" id="container">
            <button id="add_guest" class="btn btn-primary--new w-radius" onclick="modal_add_guest()"><i class="fa fa-plus" aria-hidden="true"></i><span>Add New Guest</span></button>
            <div class="table-responsive bottommargin-sm">
                <table id="show-g-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>	
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>	
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </tfoot>
                    <tbody id="show_guests_table" ><!--content will go here--></tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="modal_guests" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="modalLabel">ADD GUEST</h4>
                        </div>
                        <div class="modal-body">
                            <form name="formAddGuests" id="formAddGuests" autocomplete="off" class="nobottommargin" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">First Name <small>*</small></label>
                                        <input type="hidden" id="guest_id" name="guest_id" class="sm-form-control" />
                                        <input type="text" id="guest_firstname" name="guest_firstname" class="sm-form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Last Name <small>*</small></label>
                                        <input type="text" id="guest_lastname" name="guest_lastname" class="sm-form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Email <small>*</small></label>
                                        <input type="text" id="guest_email" name="guest_email" class="sm-form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Address <small>*</small></label>
                                        <input type="text" id="guest_address" name="guest_address" class="sm-form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Contact <small>*</small></label>
                                        <input type="text" id="guest_contact" name="guest_contact" class="sm-form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary--new" data-dismiss="modal">Cancel</button>
                                <button type="submit" id="data-submit--guests" class="btn btn-primary--new dflt-radius">Add Guest</button>
                            </div>
                        </form>
                    </div>	
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_delete_guest" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="modalLabel">DELETE GUEST</h4>
                        </div>
                        <div class="modal-body">
                            <form name="FormImageProducts" id="FormImageProducts" class="nobottommargin" method="post">
                            <input type="hidden" id="delete_guest_id" name="delete_guest_id" class="sm-form-control"/>
                            <h4 style="text-align: center;">Do you want to delete this guest?</h4>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary--new" data-dismiss="modal">Cancel</button>
                                <button type="button" id="data-delete--guests" class="btn btn-primary--new dflt-radius" onclick="delete_guest_by_id(this.value)">Delete Guest</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--External Scripts -->
        <script type="text/javascript" src="../assets/js/jquery.js"></script>
        <script type="text/javascript" src="../assets/js/vue.min.js"></script>
        <!--Functions JavaScript-->
        <script type="text/javascript" src="../assets/js/ajaxFunctions.js"></script>
        <script type="text/javascript" src="../assets/js/functions.js"></script>
        <!--Bootstrap Scripts -->
        <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
        <!---Amaran Notification-->
		<script type="text/javascript" src="../assets/js/jquery.amaran.min.js"></script>
        <!---DataTable-->
		<script type="text/javascript" src="../assets/js/components/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../assets/js/components/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                show_guests();
                add_guests();
            });
        </script>
    </body>
</html>