<?php
if(isset($_POST['path'])){
   $path = $_POST['path']; 
   $complete_path = "../" . $path;
   // Check file exist or not 
   if( file_exists($complete_path) ){ 
      // Remove file 
      unlink($complete_path); 
      // Set status 
      echo 1; 
   }else{ 
      // Set status 
      echo 0; 
   } 
   die;
}

die;