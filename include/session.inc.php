<?php
if (!isset($_SESSION['userId'])){
header("Location: inlog.php?error=inlog");
exit;
}
?>