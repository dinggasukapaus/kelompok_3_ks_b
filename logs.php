<?php
include 'chiper.php';
require("db/db.php");

$result = mysqli_query($con, "SELECT * FROM logs ORDER BY id DESC LIMIT 0, 10");
while($row=mysqli_fetch_array($result)){
	// $cipherText = Decipher($plainText, 3);
	// $cipherText2 = $cipherText ;
	
	echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'>" . Decipher($row['msg'],3) . "</span></br></br>";
}
mysqli_close($con);
?>