<?
session_start();

if($_SESSION['role']=='') {
    header('Location: http://wjrnl.esy.es/');
}
/*
if($_SESSION['role']=='2') {
    header('Location: http://wjrnl.esy.es/parent');
}
if($_SESSION['role']=='3') {
    header('Location: http://wjrnl.esy.es/teacher');
}
*/
$login = $_POST['login'];
$password = md5($_POST['pass']);
$host="YOUR_DB_HOST";
$dbname="YOUR_DB_NAME";
$user="YOUR_DB_USER";
$pass="YOUR_DB_PASS";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
}  
catch(PDOException $e) {  
    echo $e->getMessage();  
}

//$week_id = $_SESSION['week_id'];

$d_sunday = date("d.m", strtotime('-'.date("w").' day'));
$d_monday = date("d.m", strtotime('-'.date("w").' day'.' +1 day'));
$d_tuesday = date("d.m", strtotime('-'.date("w").' day'.' +2 day'));
$d_wednesday = date("d.m", strtotime('-'.date("w").' day'.' +3 day'));
$d_thursday = date("d.m", strtotime('-'.date("w").' day'.' +4 day'));
$d_friday = date("d.m", strtotime('-'.date("w").' day'.' +5 day'));
$d_saturday = date("d.m", strtotime('-'.date("w").' day'.' +6 day'));
$week_id = 0;
$id = $_SESSION['id'];

function getForumContent($forum) {
    global $db, $id, $week_id, $d_date;
}

$date = date('Y-m-d');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--[if lt IE 9]> 
    <script>
    document.createElement("week");
    document.createElement("forum-container");
    document.createElement("forum-inner");
    document.createElement("forum-head");
    document.createElement("flip");
    document.createElement("front-wrap");
    document.createElement("back-wrap");
    document.createElement("front");
    document.createElement("back");
    document.createElement("card");
    document.createElement("marks");
    document.createElement("l-section");
    document.createElement("l-name");
    document.createElement("l-theme");
    document.createElement("l-cab");
    document.createElement("l-mark");
    document.createElement("l-count");
    document.createElement("l-hw");

    </script>
    <![endif]--> 
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link href='http://fonts.googleapis.com/css?family=Exo+2:200,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="forums.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Diary</title>
</head>
<? echo '<body>'; ?>
    <menu>
        <menu-item-list>
            <menu-list-item>
                <menu-item class="menu-list">What's first?</menu-item>
                <menu-item class="menu-list">Account Settings</menu-item>
                <menu-item class="menu-list"><? echo $classv," Class" ?></menu-item>
            </menu-list-item>
        </menu-item-list>
        <menu-item class="menu-list-name"><? echo $_SESSION['first']," ",$_SESSION['last'];?></menu-item>
        <menu-item>Diary</menu-item>
        <menu-item>Forums</menu-item>
        <menu-item>Chats</menu-item>
        <menu-item>All Marks</menu-item>
        <menu-item>Sumary Marks</menu-item>
    </menu>
    <nomenu style="display: block;margin: 0;padding: 0;border: 0;overflow-x: hidden;">
        <div class="menu">
            <div class="mhead"><img src="hambuger.svg" alt="Open left menu"></div>
            <div class="logo">Journal</div>
            <div id="quit-btn"><img src="quit.svg" alt="Quit" height="30px" width="30px"></div>
        </div>
        <div class="mob_menu">
            <div class="mhead"><img src="hambuger.svg" alt="Open left menu"></div>
        </div>
        <?
           // echo '<div id="wid">'.$week_id.'</div>';
        ?>
        <div id="loader" style="z-index:9999;">Загрузка...</div>
        <forums id="mixedContent">
            <forum-container>
                <?
                echo '<forum-inner id="counter">';
                echo '<forum-head class="counter">Статистика</forum-head>';
                echo '<counter class="forums">8 Форумов</counter>';
                echo '<counter class="threads">19 Веток</counter>';
                echo '<counter class="topics">19 Топиков</counter>';
                echo '<counter class="comments">153 Комментария</counter>';
                echo '<counter class="last-comment">Последний: Ситуация понятна, ...</counter>';
                echo '</forum-inner>';
                ?>
            </forum-container>
            
            <forum-container>
                <?
                echo '<forum-inner id="forum">';
                echo '<forum-head class="forum">Форум 1</forum-head>';
                echo '</forum-inner>';
                ?>
            </forum-container>

            <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
            <script src="jquery.easing.min.js"></script>
            <script src="prism.min.js"></script>
            <script src="jquery.flip.js"></script>
            <script src="jquery.afterlag.min.js"></script>
            <script src="forums.js"></script>
        </forums>
    </nomenu>
</body>
</html>
