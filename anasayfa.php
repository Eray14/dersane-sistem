<?php
session_start();
include('gereksinim/baglanti.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pamukkale Yabancı Dil Dershanesi</title>

    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    
    <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet">

    
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="anasayfa.php">Pamukkale Yabancı Dil Dershanesi</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

    
     
        <?php include('gereksinim/ustcubukarama.php');?>
        
        
      
      <?php include('gereksinim/ustcubuk.php');?>

    </nav>

    <div id="wrapper">

      
      <?php include('gereksinim/kenarcubuk.php');?>

      <div id="content-wrapper">

        <div class="container-fluid">

          
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="anasayfa.php">Yönetici Paneli</a>
            </li>
            <li class="breadcrumb-item active">Ana Sayfa</li>
          </ol>

          
          <h1>Hoş Geldiniz <?php echo $_SESSION['alogin'] ?></h1>
          <hr>
          
            
            
            
            
            
           <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        



                      
                            </div>
                    </div>
                  
                </div>
                
                
            
            <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-school"></i>
                  </div>
                  <div class="mr-5">Raporla</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="rapor.php">
                  <span class="float-left">Gitmek İçin...</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user-graduate"></i>
                  </div>
                  <div class="mr-5">Öğrenci Yönetimi</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="ogrenciyonetim.php">
                  <span class="float-left">Gitmek İçin...</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            
            </div>
          
            
           
            
           
            
            
            
            
            
        </div>
        

        
        <?php include('gereksinim/altyazi.php');?>

      </div>
      

    </div>
    

    
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    
    <?php include('gereksinim/cikisuyari.php');?>

    
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    
    <script src="jquery-easing/jquery.easing.min.js"></script>
  
      

      
      
    

  </body>

</html>
<?php } ?>