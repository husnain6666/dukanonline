<?php
/**
 * Created by PhpStorm.
 * User: Shehroz
 * Date: 9/30/2015
 * Time: 13:08
 */
include_once('dbConnect.php');
$q = $_GET['q'];

if($q == 'tables') {
    echo
        '<div class="box"  id="table_view">'.
            '<div class="box-header" >'.
                '<h3 class="box-title">Data Table With Full Features</h3>'.
            '</div>'.
        '<div class="box-body">'.
            '<table id="example1" class="table table-bordered table-striped">'.
                '<thead>'.
                    '<tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
						<th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       <td>Trident</td>
                       <td>Internet
                          Explorer 4.0</td>
                       <td>Win 95+</td>
                       <td> 4</td>
                       <td>X</td>
						<!--<td align="center"><span>
							<!--<button type="submit" class="btn label label-primary"  >Delete</button>
							<button type="submit" class="btn label label-primary"  >Update</button>
							<button type="submit" class="btn label label-primary"  >Open</button>-->
							<td align="center">
							<button class="btn btn-primary btn-xs" data-toggle="tooltip" title="" data-original-title="View"><i class="fa fa-eye"></i></button>&nbsp;
                            <button class="btn btn-success btn-xs" data-toggle="tooltip" title="" data-original-title="Update"><i class="fa fa-refresh"></i></button>&nbsp;
                            <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Delete User" ><i class="fa fa-trash-o" ></i></button>&nbsp;

						</td>
                      </tr>

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
              </div>';

}

else if ($q == 'users'){
    echo '
        <div class="row">
           <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">Users</h1>
                    </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="userData">';
    $query = "SELECT * FROM userinfo";
    $result = mysqli_query($CONNECTION, $query);
    if($result) {
        if($result->num_rows > 0) {
            while ($member = mysqli_fetch_assoc($result)) {
                $userId = $member['userId'];
                $userName = $member['firstName'];
                echo "<tr>".
                    "<td> {$member['userId']} </td>".
                    "<td> {$member['firstName']} </td>".
                    "<td> {$member['lastName']} </td>".
                    "<td> {$member['emailAddress']} </td>".
                    "<td align='center'><button class='btn btn-primary btn-xs' data-toggle='tooltip' title='' data-original-title='View'><i class='fa fa-eye'></i></button>&nbsp;".
                    "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#resetModal' title='' data-original-title='Reset Password' data-user-id='$userId' data-user-name='$userName'><i class='fa fa-refresh'></i></button>&nbsp;".
                    "<button class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal' title='' data-original-title='Delete User' data-user-id='$userId' data-user-name='$userName'><i class='fa fa-trash-o'></i></button>&nbsp;</td>".
                    "</tr>";
            }
        }
    }
    echo '
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </tfoot>
                     </table>
                 </div><!-- /.box-body -->
            </div><!-- /.box -->
         </div><!-- /.col -->
    </div><!-- /.row -->
    ';
}

else
    echo 'hello';

?>
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    var userName;
    $(function () {
        $("#example1").DataTable({
            "autoWidth": true,
            "lengthChange": true,
            "lengthMenu": [ 5, 10, 25, 50, 100 ]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

    $('#myModal').on('show.bs.modal', function(e) {
        var userId = $(e.relatedTarget).data('user-name');
        userName = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user"]').html('You are about to delete <strong>'+userId+'</strong>. Are you sure?');
    });

    $('#resetModal').on('show.bs.modal', function(e) {
        var userId = $(e.relatedTarget).data('user-name');
        userName = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user-reset"]').html('You want to set default password <i>"Honliz@123"</i> for <strong>'+userId+'</strong>?');
    });
</script>