<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/images/a.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p style="font-weight: 100"><?php echo $username ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a class = "ayam" href="<?php echo base_url(); ?>welcome/aboutus1">
                    <i class="fa fa-dashboard"></i> <span>Home</span>
                </a>
            </li>
            <li>
                <a class = "ayam" href="<?php echo base_url(); ?>Admin_dashboard/addAdmin">
                    <i class="fa fa-user-plus"></i> <span>Add Administrator</span>
                </a>
            </li>

            <!--
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-square-o"></i> <span>Selections</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class = "ayam" href="<?php echo base_url(); ?>Admin_dashboard/selection_interns"><i class="fa fa-circle-o"></i> Interns Selection</a></li>
                    <li><a class = "ayam" href="<?php echo base_url(); ?>Admin_dashboard/selection_jobapplicants"><i class="fa fa-circle-o"></i> Job Applicants Selection</a></li>
                </ul>
            </li>

            -->
            <li>
                <a class = "ayam" href="<?php echo base_url(); ?>Admin_dashboard/addBranch">
                    <i class="fa fa-building"></i> <span>Branches</span>
                </a>
            </li>
            <li>
                <a class = "ayam" href="<?php echo base_url(); ?>Admin_dashboard/addBmanager">
                    <i class="fa fa-building"></i> <span>Branch managers</span>
                </a>
            </li>
            <li>
                <a class = "ayam" href="<?php echo base_url(); ?>Admin_dashboard/addSupplier">
                    <i class="fa fa-building"></i> <span>suppliers</span>
                </a>
            </li>
            <li>
                <a class = "ayam" href="<?php echo base_url(); ?>Admin_dashboard/reports">
                    <i class="fa fa-file-pdf-o"></i> <span>Branch reports</span>
                </a>
            </li>
            <li>
                <a class = "ayam" href="<?php echo base_url(); ?>Admin_dashboard/notifications">
                    <i class="fa fa-bell-o"></i> <span>fuels</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<script type="text/javascript">


    $(document).on('click','.ayam',function(){

        var href = $(this).attr('href');
        $('#haha').empty().load(href).fadeIn('slow');
        return false;

    });


</script>






<script type="text/javascript">

    $('.ayam').removeClass('active');

</script>


<script>


    $(document).ready(function(){

        $( "body" ).on( "click", ".ayam", function() {

            $('.ayam').each(function(a){
                $( this ).removeClass('selectedclass')
            });
            $( this ).addClass('selectedclass');
        });

    })


</script>

<style type="text/css">


    li a.selectedclass
    {
        color: forestgreen !important;
        font-weight: bold;
    }

</style>