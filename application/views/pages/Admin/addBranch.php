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
    <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add New Branch</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Branch ID</th>
            <th>Branch Name</th>
            <th>Address</th>
            <th>Incharge</th>
            <th>Octane 92</th>
            <th>Octane 95</th>
            <th>Auto diesel</th>
            <th>Super diesel</th>
            <th>Contact Number</th>
            <th>Service</th>
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
                "url": "<?php echo site_url('Branch/ajax_list')?>",
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
         // document.getElementById('image').style.visibility = 'visible';
         //  document.getElementById('image1').style.visibility = 'visible';
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add New Branch'); // Set Title to Bootstrap modal title
    }

    function edit_person(b_id)
    {
        save_method = 'update';

        // document.getElementById('image').style.visibility = 'hidden';
        //  document.getElementById('image1').style.visibility = 'hidden';
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('Branch/ajax_edit/')?>/" + b_id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="b_id"]').val(data.b_id);
                $('[name="b_name"]').val(data.b_name);
                $('[name="address"]').val(data.address);
                $('[name="location"]').val(data.location);
                $('[name="incharge"]').val(data.incharge);
                $('[name="petrol_92"]').val(data.petrol_92);
                $('[name="petrol_95"]').val(data.petrol_95);
                $('[name="auto_diesel"]').val(data.auto_diesel);
                $('[name="super_diesel"]').val(data.super_diesel);
                $('[name="kerosene"]').val(data.kerosene);
                $('[name="industrial_kerosene"]').val(data.industrial_kerosene);
                $('[name="furance_800"]').val(data.furance_800);
                $('[name="furance_1500"]').val(data.furance_1500);
                $('[name="furance_3500"]').val(data.furance_3500);
                $('[name="tel"]').val(data.tel);
                $('[name="service"]').val(data.service);
                $('[name="image"]').val(data.image);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Branch'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
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
            url = "<?php echo site_url('Branch/ajax_add')?>";
        }
        else
        {
            url = "<?php echo site_url('Branch/ajax_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data:new FormData($("#form")[0]),
            async : false,
            cache : false,
            contentType : false,
            processData : false,
            success: function(data)
            {
                //if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                swal(
                    'Good job!',
                    'Data has been save!',
                    'success'
                )
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_person(b_id)
    {

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm) {

                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('Branch/ajax_delete')?>/"+b_id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        reload_table();
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                    }
                });


            }
        })

    }

    function view_person(b_id)
    {
        $.ajax({
            url : "<?php echo site_url('Branch/list_by_id')?>/" + b_id,
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


    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });



// $('#form').submit(function(e){
//     e.preventDefault(); 
//          $.ajax({
//              url:'<?php echo site_url('Branch/ajax_add')?>',
//              type:"post",
//              data:new FormData(this),
//              processData:false,
//              contentType:false,
//              cache:false,
//              async:false,
//               success: function(data){
//                    $('#modal_form').modal('hide');
//                 reload_table();
//                 swal(
//                     'Good job!',
//                     'Data has been save!',
//                     'success'
//                 )
//            }
//          });
//     }); 

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Branch Form</h3>
            </div>
            <div class="modal-body form">
                <form  action="#" enctype="multipart/form-data" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="b_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Branch Name</label>
                            <div class="col-md-9">
                                <input name="b_name" placeholder="Branch Name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <input type="address" name="address" placeholder="Address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Location</label>
                            <div class="col-md-9">
                                <input type="text" name="location" placeholder="paste embed link here" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Incharge</label>
                            <div class="col-md-9">
                                <input name="incharge" placeholder="branch manager name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Petrol(octane 92)</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "petrol_92" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Petrol(octane 95)</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "petrol_95" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Auto diesel</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "auto_diesel" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Super diesel</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "super_diesel" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kerosene</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "kerosene" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Industrial kerosene</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "industrial_kerosene" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Furance oil 800</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "furance_800" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Furance oil 1500</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "furance_1500" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Furance oil 3500</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "furance_3500" style="height: 50px">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact no</label>
                            <div class="col-md-9">
                                <input name="tel" placeholder="Contact no" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Service time</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "service" style="height: 50px">
                                    <option value="24 hours">24 hours</option>
                                    <option value="8 a.m - 10 p.m">8 a.m - 10 p.m</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label id="image1" class="control-label col-md-3">Image</label>
                            <div class="col-md-9">
                                <input id="image" type="file" class="form-control" name ="file_name" placeholder="Image">
                            </div>
                        </div>
                         
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>