
<?php
session_start();

include 'chiper.php';

$username = $_SESSION['username'];

$kunci = 1;
$msg = $_REQUEST['msg'];
$plainText = $msg;
$chiperkeyText = enkripsi($plainText, $kunci);
$cipherText = Encipher($chiperkeyText, 3);

require("db/db.php");

mysqli_query($con, "INSERT INTO logs(username, msg) VALUES('$username','$cipherText')");

$result = mysqli_query($con, "SELECT * FROM logs ORDER BY id DESC LIMIT 0, 10");
while($row=mysqli_fetch_array($result)){

$cipherText = Decipher($plainText, 3);
$cipherText2 = $cipherText ;
echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'> " . $row['cipherText2'] . "</span></br></br>";

}
mysqli_close($con);
?>
