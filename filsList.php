<?php
function ScanDirectory($Directory){

  $MyDirectory = opendir($Directory) or die('Erreur');
  while($File = @readdir($MyDirectory)) {
    if(is_dir($Directory.'/'.$File)&& $File != '.' && $File != '..' ) {

      echo '<ul><img src= "..//assets/images/FBI-LOGO2.png" style="width:2%;height:2%" >
'.$File.'</br>';
      ScanDirectory($Directory.'/'.$File);
      echo '</ul>';
    }
    elseif ($File != '.' && $File != '..') {
      echo '<a href="?f='.$Directory.'/'.$File.'">';
      echo '<li>'.$File.'</li>';
      echo '</a>';
    }
  }
  closedir($MyDirectory);
}
ScanDirectory('../php_files_handling_ressources/files');

?>
