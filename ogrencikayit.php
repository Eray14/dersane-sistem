<?php
session_start();
include('gereksinim/baglanti.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$ogrenciadi=$_POST['ogrenciadi'];
$ogrencino=$_POST['ogrencino'];
$veliadi=$_POST['veliadi'];
$odeme=$_POST['odeme'];
$ucret=$_POST['ucret'];
$ret=mysqli_query($con,"insert into ogrenciler(ogrenciAdi,ogrenciNo,veliadi,odeme,ucret,kalan) values('$ogrenciadi','$ogrencino','$veliadi','$odeme','$ucret','$ucret')");



if($ret)
{
$_SESSION['msg']="Öğrenci Başarıyla Kaydedildi!";
}
else
{
  $_SESSION['hatamsg']="Hata! Öğrenci Kayıt Edilemedi.";
}
}
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
            <li class="breadcrumb-item active">Öğrenci Kayıt</li>
          </ol>

         
          <h1>Öğrenci Kayıt</h1>
          <hr>
          
            
            
            
            
            
            <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                       
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<font color="red" align="center"><?php echo htmlentities($_SESSION['hatamsg']);?><?php echo htmlentities($_SESSION['hatamsg']="");?></font>



                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="ogrenciadi">Öğrenci Adı</label>
    <input type="text" class="form-control" id="ogrenciadi" name="ogrenciadi" placeholder="Öğrencinin adını girin" required />
  </div>


 <div class="form-group">
    <label for="ogrencino">Öğrenci Numarası</label>
    <input type="text" class="form-control" id="ogrencino" name="ogrencino" onBlur="userAvailability()" placeholder="Öğrenci numarasını girin" required />
     <span id="user-availability-status1" style="font-size:12px;"></span>
  </div>

 <div class="form-group">
    <label for="veliadi">Veli Adı</label>
    <input type="text" class="form-control" id="veliadi" name="veliadi" placeholder="Velinin adını girin" required />
  </div>

  <div class="form-group">
    <label for="odeme">Ödeme Türü</label>
    <input type="text" class="form-control" id="odeme" name="odeme" placeholder="Nakit-Peşin, Kart-Peşin, Elden-Taksit-Senet, Kart-Taksit" required />
  </div>

  <div class="form-group">
    <label for="ucret">Anlaşılan Ücret</label>
    <input type="text" class="form-control" id="ucret" name="ucret" onBlur="userAvailability()" placeholder="Ücret Girin" required />
     <span id="user-availability-status1" style="font-size:12px;"></span>
  </div>



 


 <button type="submit" name="submit" id="submit" class="btn btn-info">Kaydet</button>
</form>
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
      

      <script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "kontrol.php",
data:'regno='+$("#ogrencino").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
      
      
   

  </body>

</html>
<?php } ?>
