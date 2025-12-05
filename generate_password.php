<?php
$password = 'ball_security'; // Replace this with your desired password
echo crypt($password, '$1$' . bin2hex(random_bytes(8)));
?>
