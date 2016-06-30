<?php
//unset($_COOKIE['userid']);
setcookie('userid',0,time()-3600);
header('Location:../logout.php');

?>