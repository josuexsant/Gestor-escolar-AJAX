
<?php

if(isset($_POST['nrc'])){
  echo "Inscribiendo curso con nrc: ".$_POST['nrc'];
}else{
  echo "No se ha seleccionado un curso";
}
?>