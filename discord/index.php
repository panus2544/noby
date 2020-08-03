<?php require_once('includes/config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <!-- website meta tags -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title><?php echo $website['name'];?></title>

   </head>
   <body>

      <?php
      
      header("Refresh: 0; url=../?page=home");

      ?>

   </body>
</html>
