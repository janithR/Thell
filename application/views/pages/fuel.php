<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Readings</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="<?php echo base_url() ?>sources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <!-- <link href="<?php echo base_url() ?>sources/css/modern-business.css" rel="stylesheet"> -->

    <!-- bootstrap 4.1.3 -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

    <style type="text/css">
      /* Using rems to easily scale these gauges */
      html {
        
      }

      .gauge {
        display:inline-block;
        position:relative;
        width:10rem;
        height:5rem;
        overflow:hidden;
        margin:2rem;              
      }

      .gauge:before, .gauge:after, .meter {
        position:absolute;
        display:block;
        content:"";
      }

      .gauge:before, .meter { width:10rem; height:5rem; }
      .gauge:before { border-radius:5rem 5rem 0 0; background:#F0F0F0; }

      .gauge:after {
        position:absolute;
        bottom:0;
        left:2.5rem;
        width:5rem;
        height:2.5rem;
        background:#ffffff;
        border-radius:2.5rem 2.5rem 0 0;
      }

      .meter {
        top:100%;
        transition:10s;
        transform-origin:center top;
        border-radius:0 0 6rem 6rem;
        background:deepskyblue;
      }

      .gauge .meter { transform:rotate(.5turn); }
      
      .meter { animation:empty 1s linear both; }
        @keyframes empty { 0%{ transform:rotate(0deg); } }
      .overload .meter { animation-delay:.4s; }
      .percentage .meter { animation-delay:.8s; }

       figcaption { display:block; font:15pt monospace; color:#444; user-select:none;}
    </style>

  </head>

<body>    

<!-- Page Content -->
<div  style="min-height: 80%;min-height: 90vh;display: flex;align-items: center;background-color:#ffffff">
  <div class="container"> 
    <div class="row my-0">

      <div class="table-responsive" id="yourDiv">    
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col-md-3"></th>
              <td scope="col-md-3" style="font-size: 25px" align="center"><?php echo $name?></td>
              <td scope="col-md-3" style="font-size: 25px" align="center">Tank B</td>
              <td scope="col-md-3" style="font-size: 25px" align="center">Tank C</td>
            </tr>
          </thead>
          <tbody> 
            <tr>
              <td style="font-size: 18px" style="vertical-align: bottom"></td>
              <td align="center">
                <figure>
                  <div class="gauge" >
                      <div class="meter" style="transform:rotate(<?php echo (($maxHeight-$height)/$maxHeight)*0.5 ?>turn)"></div>               
                  </div>
                  <figcaption><?php echo (($maxHeight-$height)/$maxHeight)*100 ?>%</figcaption>
                </figure> 
              </td>
              <td align="center">
                <figure>
                  <div class="gauge">
                      <div class="meter" style="transform:rotate(.2turn)"></div>               
                  </div>
                  <figcaption>80%</figcaption>
                </figure> 
              </td>
              <td align="center">
                <figure>
                  <div class="gauge">
                      <div class="meter" style="transform:rotate(.4turn)"></div>               
                  </div>
                  <figcaption>80%</figcaption>
                </figure> 
              </td>
            </tr>       
            <tr>
              <td style="font-size: 18px">Fuel Type</td>
              <td><?php echo $fuel ?></td>
              <td>Desal</td>
              <td>Kesosine</td>
            </tr>
            <tr>
              <td style="font-size: 18px">Fuel Height</td>
              <td><?php echo ($maxHeight-$height) ?>cm <lable style="color: #AFADAD">/ <?php echo $maxHeight ?>cm</lable></td>
              <td>20cm <lable style="color: #AFADAD">/ 100cm</lable></td>
              <td>20cm <lable style="color: #AFADAD">/ 100cm</lable></td>
            </tr>
            <tr>
              <td style="font-size: 18px">Live Volume</td>
              <td><?php echo (($maxHeight-$height)/$maxHeight)*$maxVolume ?>m<sup>3</sup> <lable style="color: #AFADAD">/ <?php echo $maxVolume ?>m<sup>3</sup></lable></td>
              <td>10m<sup>3</sup> <lable style="color: #AFADAD">/ 100m<sup>3</sup></lable></td>
              <td>10m<sup>3</sup> <lable style="color: #AFADAD">/ 100m<sup>3</sup></lable></td>
            </tr>
            <tr>
              <td style="font-size: 18px">Checked At</td>
              <td>Time : <?php echo $record_time?> | Date : <?php echo $record_date ?></td>
              <td>Time : 16:09:49 | Date : 2018-07-02</td>
              <td>Time : 16:09:49 | Date : 2018-07-02</td>
            </tr>
            <tr>
              <td style="font-size: 18px">Record</td>
              <form action="<?php echo base_url(); ?>Controller_Main/recordHeight/<?php echo $idTank?>" method="POST">
                <td align="center"><button type="submit" class="btn btn-outline-success btn-sm">Save</button></td>
              </form>
              <td align="center"><button type="button" class="btn btn-outline-danger btn-sm">Save</button></td>
              <td align="center"><button type="button" class="btn btn-outline-danger btn-sm">Save</button></td>
            </tr>            
          </tbody>
        </table>
      </div>
    </div>
  </div>  
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url() ?>sources/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>sources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- bootstrap  js-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>


    