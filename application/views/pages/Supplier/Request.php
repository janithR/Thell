<link href="<?php echo base_url('assets/crud-assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/crud-assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/crud-assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<script src="<?php echo base_url('assets/crud-assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/crud-assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/crud-assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/crud-assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/crud-assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.js"></script>


<div class = "row">
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>branch name</th>        
            <th>fuel type</th>
            <th>volume(gal)</th>
            <th>Total price</th>            
            <th style="width:189px;">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
            foreach ($list as $row) {
                ?>
                <tr>
                <td><?php echo $row->branch_name; ?></td>
                <td><?php echo $row->fuel_type; ?></td>
                <td><?php echo $row->volume; ?></td>
                <td><?php echo $row->total_price; ?></td>
                <td><button type="button" class="btn btn-sm btn-primary" onclick="updateStatus(this);" value="<?php echo $row->request_id;?>">Confirmed</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="rejectStatus(this);" value="<?php echo $row->request_id;?>">Reject</button></td>
                </tr>
                <?php
            }
        ?>
        </tbody>


    </table>
</div>


 



</html>


<script type="text/javascript">


            function reload_table()
            {
            table.ajax.reload(null,false); //reload datatable ajax
            }


            function updateStatus(Object){

               
                var reqId = Object.value;

                 console.log(reqId);

                 $.ajax({
            url : "<?php echo site_url('s_request/c_status')?>",
            type: "POST",
            data:{'reqId':reqId},
            dataType:'JSON',
            success: function(data)
            {
                //if success close modal and reload ajax table
               
               
                swal(
                    'Good job!',
                    'Status Updated!',
                    'success'
                )
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                window.location.reload();
                swal(
                    'Good job!',
                    'Status Updated!',
                    'success'
                )
            }
        });


            }








            
            function rejectStatus(Object){

               
var reqId = Object.value;

 console.log(reqId);

 $.ajax({
url : "<?php echo site_url('s_request/r_status')?>",
type: "POST",
data:{'reqId':reqId},
dataType:'JSON',
success: function(data)
{
//if success close modal and reload ajax table


swal(
    'Good job!',
    'Status Updated!',
    'success'
)
},
error: function (jqXHR, textStatus, errorThrown)
{
window.location.reload();
swal(
    'Good job!',
    'Status Updated!',
    'success'
)
}
});


}

 </script>