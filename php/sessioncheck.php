<?php
require 'functions.php';

print_r("asdf");
if ( isset( $_SESSION['user_id'] ) ) {
    $user_id = $_SESSION['user_id'];
    $user = Userexists($user_id, $users);
		print_r($user);
}
?>