<?php
session_start();
session_destroy();
session_unset();

header("Location: index.php")



// if($_SESSION['username'])
// 	{echo "Sussesfully logged out! <br/>";
// 	echo "<br/><a href='loginform.php'>SignIn</a>";
// }
// else{
// 	echo "Error Occured!!!<br/>";

// }
?>