<?php 
function check_administrator($user) {
	return (isset($_SESSION['user']) && ($_SESSION['user'] === $user)); 
}
?>