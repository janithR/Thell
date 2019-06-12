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
    <button class="btn btn-success" onclick="add_person()" title="New Fuel Request Form"><i class="glyphicon glyphicon-plus"></i> New Fuel Request Form</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>date</th>
            <th>Supplier name</th>
            <th>Fuel type</th>
            <th>Volume</th>
            <th>Total price</th>            
            <th style="width:189px;">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>


    </table>
</div>



<script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Fuel_Request/Req_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                },
            ],

        });
    });

    function add_person()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add New Fuel Request'); // Set Title to Bootstrap modal title
    }

    function selectPrice() {
        let ftype = document.getElementById("fuel_type").value;
        console.log(ftype);

        $.ajax({
            url : "<?php echo site_url('Fuel_Request/get_price');?>",
            type: "GET",
            data: {"type": ftype},
            // dataType: "JSON",
            success: function(response)
            {
                var output =  JSON.parse(response);

               
                document.getElementById('unit_price').value =output["unit_price"];

                //if success close modal and reload ajax table
                // $('#modal_form').modal('hide');
                // reload_table();
                // swal(
                //     'Request has been sent to the Supplier!',
                //     'Request Data has been save!',
                //     'success'
                // )
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error on adding Request data!, Recheck your form and try again!');
                console.log(errorThrown);
            }
        });


}

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

    function save()
    {
        var url;
        if(save_method == 'add')
        {
            url = "<?php echo site_url('Fuel_Request/Req_add')?>";
        }
        else
        {
            url = "<?php echo site_url('Fuel_Request/Req_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                //if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                swal(
                    'Request has been sent to the Supplier!',
                    'Request Data has been save!',
                    'success'
                )
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error on adding Request data!, Recheck your form and try again!');
            }
        });
    }

    function view_person(req_id)
    {
        $.ajax({
            url : "<?php echo site_url('Fuel_Request/req_list_by_id')?>/" + req_id,
            type: "GET",
            success: function(result)
            {
                $('#haha').empty().html(result).fadeIn('slow');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
    }


    function calculate() {
    var myBox1 = document.getElementById('unit_price').value; 
    var myBox2 = document.getElementById('volume').value;
    var result = document.getElementById('total_price'); 
    var myResult = myBox1 * myBox2;
    result.value = myResult;

}


</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Request</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="request_id"/>
                    <input type="hidden" value="<?php echo $this->session->userData('branch_id') ?>" name="branch_id"/>
                    <input type="hidden" value="pending" name="status" id="status"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Request Date</label>
                            <div class="col-md-9">
                                <input name="req_date" class="form-control" value="<?php echo date('Y-m-d');?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Branch Name</label>
                            <div class="col-md-9">
                                <input name="branch_name" placeholder="Branch Name" class="form-control" value="<?php echo $b_name ?>" type="text" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Branch Manager</label>
                            <div class="col-md-9">
                                <input name="branch_manager" placeholder="Branch Manager" value="<?php echo $bm_name ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Branch location</label>
                            <div class="col-md-9">
                                <!-- <label value="" class="form-control" ><a target="_blank" href="<?php echo $location ?>"><?php echo substr($location, 0,45) ?></a></label> -->
                                <input name="branch_location" placeholder="Branch Location" value="<?php echo $location ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Contact Number</label>
                            <div class="col-md-9">
                                <input name="tel" placeholder="Contact Number" value="<?php echo $tel ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Contact E Mail</label>
                            <div class="col-md-9">
                                <input name="email" placeholder="Contact E Mail" value="<?php echo $email ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Supplier Name</label>
                            <div class="col-md-9">
                                <select name="supplier_name" id="supplier_name" data-error='Please enter Supplier Name'  class="form-control" required>
                                <?php 

                                foreach($sup as $row)
                                { 
                                echo '<option value="'.$row->s_name.'">'.$row->s_name.'</option>';
                                }
                                ?> 
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Request Fuel Type</label>
                            <div class="col-md-9">
                                <select name="fuel_type" id="fuel_type" onchange="selectPrice()" data-error='Please enter Fuel type' class="form-control">
                                
                                <?php 

                                foreach($groups as $row)
                                { 
                                echo '<option value="'.$row->fuel_type.'">'.$row->fuel_type.'</option>';
                                }
                                ?>   
                                
                                <!-- <option></option>
                                <option>Petrol 92 Octane</option>
                                <option>Petrol 95 Octane</option>
                                <option>Auto Diesel</option>
                                <option>Super Diesel 4 Star</option>
                                <option>Kerosene</option>
                                <option>Industrial Kerosene</option>
                                <option>Furnace Oil 800</option>
                                <option>Furnace Oil 1500</option>
                                <option>Furnace Oil 3500</option> -->
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Unit Price (Rs)</label>
                            <div class="col-md-9">
                                <input name="unit_price" id="unit_price" placeholder="Unit Price" class="form-control" type="text" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Volume (UK/gal)</label>
                            <div class="col-md-9">
                                <input name="volume" id="volume" placeholder="Volume" class="form-control" oninput="calculate()" type="text" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Total Price (Rs)</label>
                            <div class="col-md-9">
                                <input name="total_price" id="total_price" placeholder="Total Price" class="form-control" type="text" required>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Send Request</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>