<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Readings</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>sources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>sources/css/modern-business.css" rel="stylesheet">

    <!-- bootstrap 4.1.3 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="position: fixed;">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>index.php/Controller_Main/viewPage/index.php">Fuel</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          
        </div>
      </div>
    </nav>