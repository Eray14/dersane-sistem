<?php
session_start();
include('gereksinim/baglanti.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{



if(isset($_GET['sil']))
      {
              mysqli_query($con,"delete from ogrenciler where ogrenciNo = '".$_GET['no']."'");
                  $_SESSION['delmsg']="Öğrenci Kaydı Silindi!";
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
            <li class="breadcrumb-item active">Öğrenci Yönetim</li>
          </ol>

          
          <h1>Öğrenci Yönetim</h1>
          <hr>
          
            
            
            
            
            
           <div class="row" >
                 
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                       
                        
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sıra Numarası</th>
                                            <th>Öğrenci Numarası</th>
                                            <th>Öğrenci Adı</th>
                                             <th>Kayıt Tarihi</th>
                                             <th>Eylem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from ogrenciler");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['ogrenciNo']);?></td>
                                            <td><?php echo htmlentities($row['ogrenciAdi']);?></td>
                                            <td><?php echo htmlentities($row['olusturmaTarihi']);?></td>
                                            <td>
                                            <a href="ogrenciduzenle.php?id=<?php echo $row['ogrenciNo']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i>Ödeme Yap</button> </a>                                        
<a href="ogrenciyonetim.php?no=<?php echo $row['ogrenciNo']?>&sil=silgardasim" onClick="return confirm('Öğrenci kaydını silmek istediğinize emin misiniz?')">
                                            <button class="btn btn-danger">Sil</button>
</a>

                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
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