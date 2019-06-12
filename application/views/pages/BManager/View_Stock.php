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
        <h3 class="box-title">Stock Details</h3>
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
            <label for="" class="col-sm-2 control-label">Stock ID : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->stock_id; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Fuel Type : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->fuel_type; ?></h5>
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Fuel ID : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->fuel_id; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Height : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->height; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Volume : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->volume; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Date : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->date; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Time : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->time; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Branch ID : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->branch_id; ?></h5>
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
                url : "<?php echo base_url();?>BManagerPagers/Stock_Count",
                success: function (result) {
                    $('#haha').empty().html(result).fadeIn('slow');
                }});
        })
    })
</script>

