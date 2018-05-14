<?php include('inc/head.php'); ?>
<?php

if (isset($_POST["contenu"])) {
  $fichier = $_GET["f"];
  $file= fopen($fichier,"w");
  fwrite($file,$_POST["contenu"]);
  fclose($file);
}

if(isset($_POST['delete'])) {
    unlink($_GET["f"]);
    var_dump($_GET);
    header('location: index.php');
}

if (isset($_GET["f"])) {
$extension = pathinfo($_GET["f"],PATHINFO_EXTENSION);

if (isset($_GET["f"]) && $extension != "jpg") {
  $fichier = $_GET["f"];
  $contenu = file_get_contents($fichier);
  ?>

  <form action="" method="post" role="form">
    <textarea name="contenu" style="width:100%;height:200px"><?php echo$contenu; ?></textarea>
    <input type="submit" class="btn btn-primary" name="save" value="SAVE">
    <input type="hidden"  name="image" value='.$_GET["f"].' >
		<input type="submit" class="btn btn-danger" name="delete" value="Delete">
  </form>

<?php

}

elseif (isset($_GET["f"]) && $extension = "jpg") {
  $imageAdresse = substr($_GET["f"], 32, -1);
  $done = "..".$imageAdresse."g";
  ?>

  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <div class="thumbnail">
      <img src= "<?php echo$done ?>" >
    </div>
    <form action="" method="post" role="form">
		<input type="hidden"  name="image" value='.$_GET["f"].' >
		<input type="submit" class="btn btn-danger" name="delete" value="Delete">
  </div>
  </form>

<?php
}
}
?>

<?php include('inc/foot.php'); ?>
