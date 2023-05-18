<?php if (isset($_GET["re"]) && isset($_GET["time"]))
    header("Refresh: " . $_GET["time"] . "; url=https://" . $_GET["re"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"><link rel="icon" href="lock.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body <?php if (isset($_GET["color"])) {
    echo 'style=background-color:' . $_GET["color"] . ';"';
} ?>>
    <div class="middle">
        <div class="forms">
            <div class="form login">
                <div style="display: flex; justify-content: center; align-items: center; margin-top: 50px">
        <h1 <?php if (isset($_GET["color"])) {
            echo 'style=color:' . $_GET["color"] . ';"';
        } ?>><?php if (isset($_GET["response"])) {
                echo $_GET["response"];
            } ?></h1>
                </div>
        <h1 class="title">Type in your credentials</h1>
        <form method="post" action="login.php">
    <div class="input-field">
        <input type="email" placeholder="Username" name="usr">
    </div>
    <div class="input-field">
        <input type="password" required="" placeholder="Password" name="pw"
            oninvalid="this.setCustomValidity('pw helye :)')">
    </div>
    <div class="input-field button">
        <input <?php if (isset($_GET["color"])) {
            echo 'style=color:' . $_GET["color"] . ';"';
        } ?>value="Login" type="submit">
    </div>
    <div style="margin-top: 20px">
        <p <?php if (isset($_GET["color"])) {
            echo 'style=color:' . $_GET["color"] . ';"';
        } ?>>Juhász
            Patrik</p>
        <p <?php if (isset($_GET["color"])) {
            echo 'style=color:' . $_GET["color"] . ';"';
        } ?>>BNRAFP</p>
        <img src="ehtpatrik.png" style="width: 50px; height: 50px; border-radius: 10px;">
    </div>
        </form>
            </div>
        </div>
    </div>
</body>

</html>