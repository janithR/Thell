<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>


<html>
<head>

    <title>Thel.LK</title>
    <link rel="shortcut icon" href="../assets/images/gs.png" type="image/png">
    <style type="text/css">



        .un {text-decoration: none; }


    </style>


    <script src="<?php echo base_url();?>assets/crud-assets/js/jquery-1.11.2.min.js"></script>

    <script type = "text/javascript" src="<?php echo base_url('assets/crud-assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/crud-assets/datatables/js/dataTables.bootstrap.js')?>"></script>


    <link href="<?php echo base_url('assets/crud-assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/AdminLTE.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/skin-green.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/bootstrap.min.css" />

    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



</head>

<body class="skin-green">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">


        <!-- Logo -->
        <!-- <a href="" style="text-decoration:none"class="un logo"><b>Thel.LK</b></a>-->
        <br>
        <br>
        <br><br>

        <!-- Header Navbar -->
        
    </header>

    <div>
        <div class="container"> 
            
            <?php 
            $query = $this->db->query("select * from branch");

            foreach ($query->result_array() as $row)
            {  ?>
                <div class="row">
                <div class="panel panel-default">
                  <div class="panel-heading">

                    <h3 class="panel-title"><strong><?php echo $row['b_name']; ?></strong><br><br>

                        <div class="row">
                            <div class="col-md-10">
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $row['address'];?>
                            </div>
                            <div class="col-md-2">
                                <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> &nbsp;<?php echo $row['tel'];?>
                            </div>
                            
                        </div>
                    </h3><br>
                   
                  </div>

                  <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-md-2">
                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <strong>  Incharge </strong>
                          <br>
                          <?php echo $row['incharge'];?>
                        </div>
                        <div class="col-md-4">
                             <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <strong>  Services </strong>
                              <br><br>
                              <?php 

                                $petrol_92 =  $row['petrol_92'];
                                $petrol_95 =  $row['petrol_95'];
                                $auto_diesel =  $row['auto_diesel'];
                                $super_diesel =  $row['super_diesel'];
                                $kerosene =  $row['kerosene'];
                                $industrial_kerosene =  $row['industrial_kerosene'];
                                $furance_800 =  $row['furance_800'];
                                $furance_1500 =  $row['furance_1500'];
                                $furance_3500 =  $row['furance_3500'];
                                ?>
                                <table class="table">
                                    <tr>
                                        <td>Pertol(92)</td>
                                        <td>
                    
                                        <?php 
                                            if($petrol_92=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                        
                                        <td>Inds. Kerosene</td>
                                        <td>
                    
                                        <?php 
                                            if($industrial_kerosene=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pertol(95)</td>
                                        <td>
                    
                                        <?php 
                                            if($petrol_95=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                        
                                        <td>Furance(800)</td>
                                        <td>
                    
                                        <?php 
                                            if($furance_800=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Auto diesel</td>
                                        <td>
                    
                                        <?php 
                                            if($auto_diesel=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                        <td>furance(1500)</td>
                                        <td>
                    
                                        <?php 
                                            if($furance_1500=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>super diesel</td>
                                        <td>
                    
                                        <?php 
                                            if($super_diesel=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                        <td>furance(3500)</td>
                                        <td>
                    
                                        <?php 
                                            if($furance_3500=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>kerosene</td>
                                        <td>
                    
                                        <?php 
                                            if($kerosene=="yes"){
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                            }else{
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";

                                            }
                                        ?>

                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                                

                              
                        </div>
                        <div class="col-md-3">
                             <br><br>               
                            <img  class="img-responsive" src="<?php echo base_url(); ?>assets/images/img/<?php echo $row['image']; ?>" >
                        </div>
                        <div class="col-md-3">
                            <div >
                            <br><br>
                            <div class="embed-responsive embed-responsive-16by9">
                               
                                <iframe src="<?php echo $row['location'];?>" frameborder="0"></iframe>
                                <!-- <div class="mapouter"><div class="gmap_canvas"><iframe class="embed-responsive-item" id="gmap_canvas" src=" <?php echo $row['location'];?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de/webdesign-kiel/">webdesign von pure black gmbh</a></div><style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style><small>Google Map by <a href="https://www.embedgooglemap.net">EmbedGoogleMap.net</a></small></div> -->
                            </div>
                            </div>
                        </div>
                    </div>
                  </div>
               </div>
            </div>
            <?php
            }


            ?>
            
        </div>
        
    </div>


   

    <!-- Main Footer -->
    

</div><!-- ./wrapper -->



<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/js/adminlte.min.js"></script>

</body>
</html>