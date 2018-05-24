<?php
function ScanDirectory($Directory){

  $MyDirectory = opendir($Directory) or die('Erreur');
  while($File = @readdir($MyDirectory)) {
    if(is_dir($Directory.'/'.$File)&& $File != '.' && $File != '..' ) {

      echo '<a style="color:white" href="?d='.$Directory.'/'.$File.'">';
      echo '<ul style="font-size:20px;text-transform:uppercase"><img src= "..//assets/images/FBI-LOGO2.png" style="width:2%;height:2%" >
'.$File;
      ScanDirectory($Directory.'/'.$File);
      echo '</a></ul>';
    }
    elseif ($File != '.' && $File != '..') {
      echo '<a href="?f='.$Directory.'/'.$File.'">';
      echo '<li style="font-size:15px;text-transform:lowercase">'.$File.'</li>';
      echo '</a>';
    }
  }
  closedir($MyDirectory);
}
ScanDirectory('../php_files_handling_ressources/files');

?>
