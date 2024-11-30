<?php
$admin_password = 'admin';
$user_password = 'user';

$hashed_admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
$hashed_user_password = password_hash($user_password, PASSWORD_DEFAULT);

echo "Admin hashed password: " . $hashed_admin_password . "<br>";
echo "User hashed password: " . $hashed_user_password;
?>
