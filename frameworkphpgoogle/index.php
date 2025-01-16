<?php 
include("includes/a_config.php");
include("includes/dbconnection.php");
include("includes/googleconnect.php")
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>
<main>
<?php 

//Si hay sesión de Google iniciada, pero no tenemos $_SESSION['iduser']
//quiere decir que el usuario no está registrado, en cuyo caso mostraremos
//el modal para el registro. 

if (($login_button == '') && (!isset($_SESSION['iduser']))){
  include("includes/registermodal.php");
}

?>

<section class="content">
  <div class="full-bleed cool-photo">
  </div>
</section>
</main>

<?php include("includes/footer.php");?>

</body>
</html>