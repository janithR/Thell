<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Thel.LK</title>
    <link rel="shortcut icon" href="assets/images/gs.png" type="image/png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home.css">-->
    <style>
        * {
      padding: 0;
      margin: 0
    }

    body {
      background-color: #000000;
    }
    h1 { position:absolute; top:50px; width:100%; text-align:center; color:#fff; z-index:999; font-size: 45px}
    h2 { position:absolute; top:100px; width:100%; text-align:center; color:#fff; z-index:999; font-size: 35px}

    .crossfade > figure {
      animation: imageAnimation 30s linear infinite 0s;
      backface-visibility: hidden;
      background-size: cover;
      background-position: center center;
      color: transparent;
      height: 100%;
      left: 0px;
      opacity: 0;
      position: absolute;
      top: 0px;
      width: 100%;
      z-index: 0;
    }

    .crossfade > figure:nth-child(1) {
      background-image: url('<?php echo base_url(); ?>assets/images/img/a.png');
    }
    .crossfade > figure:nth-child(2) {
      animation-delay: 6s;
      background-image: url('<?php echo base_url(); ?>assets/images/img/b.jpg');
    }
    .crossfade > figure:nth-child(3) {
      animation-delay: 12s;
      background-image: url('<?php echo base_url(); ?>assets/images/img/c.jpg');
    }
    .crossfade > figure:nth-child(4) {
      animation-delay: 18s;
      background-image: url('<?php echo base_url(); ?>assets/images/img/d.jpg');
    }
    .crossfade > figure:nth-child(5) {
      animation-delay: 24s;
      background-image: url('<?php echo base_url(); ?>assets/images/img/e.jpg');
    }

    @keyframes imageAnimation {
      0% {
        animation-timing-function: ease-in;
        opacity: 0;
      }
      8% {
        animation-timing-function: ease-out;
        opacity: 1;
      }
      17% {
        opacity: 1
      }
      25% {
        opacity: 0
      }
      100% {
        opacity: 0
      }
}

    </style>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: lightgrey">
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color: forestgreen; font-size: 200%; font-weight: bolder" href="" >THEL.LK</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?php echo base_url(); ?>welcome/aboutus"> About us</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <a class="btn btn-success" href="<?php echo base_url(); ?>Bmanager/Index" role="button">For Branch managers</a>
                    <a class="btn btn-success" href="<?php echo base_url(); ?>Supplier/Index" role="button">For Suppliers</a>
                </form>
            </div>
        </div>
    </nav>

</header>
