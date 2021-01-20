<?php
session_start();
include('gereksinim/baglanti.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

date_default_timezone_set('Europe/Istanbul');
$currentTime = date( 'd-m-Y H:i:s A', time () );

if(isset($_POST['submit']))
{

if(isset($_POST['submit']))
{
$regid=intval($_GET['id']);
$ogrenciadi=$_POST['ogrenciadi'];
$tutar=$_POST['tutar'];
$odeme=$_POST['odeme'];
$ucret=$_POST['ucret'];
$kalan=0;
$git=mysqli_query($con,"Select kalan from ogrenciler where ogrenciNo='$regid'");

$arad = mysqli_fetch_array($git);

$kalan = $arad["kalan"];
$kalan -= $tutar;



$ret=mysqli_query($con,"update ogrenciler set ogrenciAdi='$ogrenciadi', tutar='$tutar', odeme='$odeme', ucret='$ucret', kalan='$kalan',guncellemeTarihi='$currentTime' where ogrenciNo='$regid'");

}

if ($kalan<0) {
  
   $_SESSION['hatamsg']="Borcunuz Yok Ya Da Fazla Miktar Girdiniz";
}

elseif($ret)
{  
$_SESSION['msg']="Ödeme yapıldı!";
}
else
{
  $_SESSION['hatamsg']="Ödeme yapılamadı";
}

}
?>


<!DOCTYPE html>
<html lang="tr">

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
            <li class="breadcrumb-item active">Öğrenci Yönetim</li>
          </ol>

          
          <h1>Öğrenci Düzenle</h1>
          <hr>
          
            <div class="content-wrapper">
        <div class="container">
           
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<font color="red" align="center"><?php echo htmlentities($_SESSION['hatamsg']);?><?php echo htmlentities($_SESSION['hatamsg']="");?></font>

<?php



$ogrid=intval($_GET['id']);

$sql=mysqli_query($con,"select * from ogrenciler where ogrenciNo='$ogrid'");
$cnt=1;
while($row=mysqli_fetch_array($sql))

{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="ogrenciadi">Adı</label>
    <input type="text" class="form-control" id="ogrenciadi" name="ogrenciadi" value="<?php echo htmlentities($row['ogrenciAdi']);?>" placeholder="" readonly />
  </div>

 <div class="form-group">
    <label for="ogrencino">Numarası</label>
    <input type="text" class="form-control" id="ogrencino" name="ogrencino" value="<?php echo htmlentities($row['ogrenciNo']);?>"  placeholder="" readonly />
  </div>

  <div class="form-group">
    <label for="odeme">Ödeme Türü</label>
    <input type="text" class="form-control" id="odeme" name="odeme" value="<?php echo htmlentities($row['odeme']);?>" placeholder="" readonly  />
  </div>

  <div class="form-group">
    <label for="ucret">Anlaşılan Ücret</label>
    <input type="text" class="form-control" id="ucret" name="ucret" value="<?php echo htmlentities($row['ucret']);?>"  placeholder="" readonly />
  </div>

  <div class="form-group">
    <label for="kalan">Kalan Toplam Borcunuz</label>
    <input type="text" class="form-control" id="kalan" name="kalan" value="<?php echo htmlentities($row['kalan']);?>"  placeholder="" readonly />
  </div>

 <div class="form-group">
    <label for="tutar">Tutar</label>
    <input type="text" class="form-control" id="tutar" name="tutar" onBlur="userAvailability()" placeholder="Tutar girin" required />
     <span id="user-availability-status1" style="font-size:12px;"></span>
  </div>





  <?php } ?>

 <button type="submit" name="submit" id="submit" class="btn btn-info">Ödeme Yap</button>
</form>
                            </div>
                            </div>
                    </div>
                  
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