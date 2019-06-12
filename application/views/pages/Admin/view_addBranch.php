<style type="text/css">

    #buangLine{
        border: none;
        background-color: transparent;
        resize: none;
        outline: none;
    }

</style>

<?php foreach ($output as $data): ?>
<!-- Horizontal Form -->
<div class="box-header with-border">
    <div class="col-md-6">
        <h3 class="box-title">Profile</h3>
    </div>

    <div class="col-md-6">
      <span class="pull-right">

        <button class="btn btn-default" id = "butangBack"><i class="fa fa-arrow-left"> </i> Back</button>

      </span>
    </div>
</div>
<!-- /.box-header -->
<!-- form start -->


<form class="form-horizontal" id="dataCryo" method="post" enctype="multipart/form-data">

    <div class="box-body">

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Branch name : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->b_name; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Address : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->address; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Location : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->location; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">incharge : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->incharge; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Petrol (octane 92) : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->petrol_92; ?></h5>
            </div>
        </div>

         <div class="form-group">
            <label for="" class="col-sm-2 control-label">Petrol (octane 95) : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->petrol_95; ?></h5>
            </div>
        </div>

         <div class="form-group">
            <label for="" class="col-sm-2 control-label">Auto diesel : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->auto_diesel; ?></h5>
            </div>
        </div>

         <div class="form-group">
            <label for="" class="col-sm-2 control-label">Super diesel : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->super_diesel; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Kerosene : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->kerosene; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Industrail Kerosene : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->industrial_kerosene; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Furance 800 oil : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->furance_800; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Furance 1500 oil : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->furance_1500; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Furance 3500 oil : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->furance_3500; ?></h5>
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Conatact no : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->tel; ?></h5>
            </div>
        </div>

         <div class="form-group">
            <label for="" class="col-sm-2 control-label">Service time : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->service; ?></h5>
            </div>
        </div>



        <?php endforeach; ?>


    </div>
</form>
<!-- /.box -->



<script>
    $(document).ready(function () {

        $('#butangBack').unbind('click').click(function () {
            $.ajax({
                url : "<?php echo base_url();?>Admin_dashboard/addBranch",
                success: function (result) {
                    $('#haha').empty().html(result).fadeIn('slow');
                }});
        })
    })
</script>

