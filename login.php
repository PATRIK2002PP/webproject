<?php
function getColor($Username)
{
    $con = new mysqli("127.0.0.1", "root", "", "adat");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $result = $con->query("select Color from tabla where Username = '$Username'");
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            return $row["Color"];
    return "NULL";
}
function decoding($filename, $key)
{
    $coded = file_get_contents($filename);
    $result = '';
    $pass = '';
    foreach (explode("\n", $coded) as $line) {
        if (empty($line)) {continue;}
        $pass = '';
        for ($i = 0; $i < strlen($line); $i++) {
            $ascii = ord($line[$i]);
            $decoded = ($ascii - $key[$i % count($key)]) % 256;
            if ($decoded < 0) {
                $decoded += 256;
            }
            $pass .= chr($decoded);
        }
        $result .= $pass . "\n";
    }
    return $result;
}
$decoded = decoding('password.txt', array(5, -14, 31, -9, 3));
$goodemail = false;
$goodpw = false;
$username = $_POST['usr'];
$password = $_POST['pw'];
foreach (explode("\n", $decoded) as $line) {
    if (empty($line)) {
        continue;
    }
    list($lineUsername, $linePassword) = explode('*', $line);
    if ($lineUsername === $username) {
        $goodemail = true;
        if ($linePassword === $password) {
            $goodpw = true;
            break;
        }
    }
}
if ($goodpw) {
    echo "Login successfully!";
    $Color = array(
        "piros" => "red",
        "zold" => "green",
        "sarga" => "yellow",
        "kek" => "blue",
        "fekete" => "black",
        "feher" => "white",
    );
    $color = $Color[getColor($username)];
    header("Location: index.php?response=Login successfully!&color=$color");
} else {
    if ($goodemail) {
        header("Location: index.php?response=Incorrect password!&re=police.hu&time=3");
    } else if (!isset($username) || $username == '') {
        header("Location: index.php?response=No user given!");
    } else {
        header("Location: index.php?response=Invalid username!&re=police.hu&time=3");
    }
}
?>