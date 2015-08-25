<?
    session_start();
    if($_SESSION['role']=='1') {
    header('Location: http://wjrnl.esy.es/diary');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Journal - Sign In</title>
</head>
<body>
    <div class="sign-in-parent">
        <img src="diary2.svg" class="mob-icon">
        <div class="sign-in">
            <img src="diary2.svg" class="icon">
            <div id="status" class="sign-in-header">Sign in to Journal</div>
            <form id="login" action="login.php" method="post" class="form">
                <input type="text" name="login" class="field" placeholder="Client ID"><br>
                <input type="password" name="pass" class="field" placeholder="Password"><br>
                <input type="submit" value="" class="btn">
            </form>
            <span class="signup-btn">Sign up</span>
            <span class="recoverin-btn">I forgot</span>
        </div>
        <div class="helper"></div>
    </div>
    
    <div class="sign-up-parent">
        <img src="diary2.svg" class="mob-icon">
        <div class="sign-up">
            <img src="diary2.svg" class="icon">
            <div id="status" class="sign-in-header">Sign up in Journal</div>
            <form id="signup" method="post" action="signup.php" class="form">
                <input type="text" name="sid" class="field" placeholder="School ID"><br>
                <input type="password" name="email" class="field" placeholder="Contact E-Mail"><br>
                <input type="submit" value="" class="btn-plus">
            </form>
            <span class="signin-btn">Sign in</span>
            <span class="recoverup-btn">I forgot</span>
        </div>
        <div class="helper"></div>
    </div>
    <div class="recover-parent">
        <img src="diary2.svg" class="mob-icon">
        <div class="recover">
            <img src="diary2.svg" class="icon">
            <div id="status" class="sign-in-header">Recover Password</div>
            <form id="signup" action="recover.php" method="post" class="form">
                <input type="text" name="login" class="field" placeholder="Client ID"><br>
                <input type="text" name="email" class="field" placeholder="or E-mail"><br>
                <input type="submit" value="" class="btn-email">
            </form>
            <span class="recover-signin-btn">Sign in</span>
            <span class="recover-signup-btn">Sign up</span>
        </div>
        <div class="helper"></div>
    </div>
</body>
<script src="jquery-1.11.1.min.js"></script>
<script src="login.js"></script>
</html>