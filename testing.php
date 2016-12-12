<?php

session_start();

$_SESSION['test'] = ":)";
echo "<script type='text/javascript'>window.top.location='index.php';</script>"; exit();

?>