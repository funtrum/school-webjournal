<?
session_start();

if($_SESSION['role']=='') {
    header('Location: http://wjrnl.esy.es/');
}
if($_SESSION['role']=='2') {
    header('Location: http://wjrnl.esy.es/parent');
}
if($_SESSION['role']=='3') {
    header('Location: http://wjrnl.esy.es/teacher');
}

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
/*
$d_r = $db->query("SELECT `date`, `day_id` FROM `weeks` WHERE week_id = '".$week_id."'");
$i = 0;
while ($ds[$i] = $d_r->fetch(PDO::FETCH_ASSOC)){
    $d[$i] = explode('-', $ds[$i]['date']);
    $dmonth[$i] = $d[$i][1];
    $dday[$i] = $d[$i][2];
    $i = $i+1;
}
*/
$id = $_SESSION['id'];

function getDayContent($day) {
    global $db, $id, $week_id, $d_date;

    if ($day == 1) {
        global $day_n;
        $day_n = 'monday';
    } elseif ($day == 2) {
        $day_n = 'tuesday';
    } elseif ($day == 3) {
        $day_n = 'wednesday';
    } elseif ($day == 4) {
        $day_n = 'thursday';
    } elseif ($day == 5) {
        $day_n = 'friday';
    } elseif ($day == 6) {
        $day_n = 'saturday';
    }

    $f_date[0] = date("Y-m-d", strtotime('-'.date("w").' day'));
    $f_date[1] = date("Y-m-d", strtotime('-'.date("w").' day'.' +1 day'));
    $f_date[2] = date("Y-m-d", strtotime('-'.date("w").' day'.' +2 day'));
    $f_date[3] = date("Y-m-d", strtotime('-'.date("w").' day'.' +3 day'));
    $f_date[4] = date("Y-m-d", strtotime('-'.date("w").' day'.' +4 day'));
    $f_date[5] = date("Y-m-d", strtotime('-'.date("w").' day'.' +5 day'));
    $f_date[6] = date("Y-m-d", strtotime('-'.date("w").' day'.' +6 day'));

    $query = "SELECT schedule.subject_count AS sc, subjects.subject AS s FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN subjects ON subjects.subject_id = schedule.subject_id LEFT JOIN users ON schedule.class = users.class WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND groups.student_id = '".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($subjs[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $subject[$subjs[$i]['sc']] = $subjs[$i]['s'];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, themes.theme AS th FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN themes ON themes.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND themes.`date` = '".$f_date[$day]."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($themes[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $theme[$themes[$i]['sc']] = $themes[$i]['th'];
        $date = explode('-', $themes[0]['d']);
        $date_d = $date[2];
        $date_m = $date[1];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, cabinets.cabinet AS cab FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN cabinets ON cabinets.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($cabinets[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $cabinet[$cabinets[$i]['sc']] = $cabinets[$i]['cab'];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, homework.hw AS h FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN homework ON homework.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND homework.`date` = '".$f_date[$day]."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($homeworks[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $homework[$homeworks[$i]['sc']] = $homeworks[$i]['h'];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, marks.mark AS m FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN marks ON marks.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND marks.`date` = '".$f_date[$day]."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($marks[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $mark[$marks[$i]['sc']] = $marks[$i]['m'];
        $i++;
    }
    for ($i=1; $i<11; $i++) {
        if ($day == 1) {
                $n = $i+1;
            } elseif ($day == 2) {
                $n = $i+10;
            } elseif ($day == 3) {
                $n = $i+20;
            } elseif ($day == 4) {
                $n = $i+30;
            } elseif ($day == 5) {
                $n = $i+40;
            } elseif ($day == 6) {
                $n = $i+50;
            }
        if(empty($homework[$i])){$homework[$i] = 'No homework';}
        if(empty($subject[$i])){$subject[$i] = 'No lesson';}
        if($subject[$i] == 'No lesson'){
            echo '<card id="nc'.$n.'" class="nocard"> <img src="window.svg" alt="No lesson" class="window"><br>Time to read books</card>';
            echo '<card id="c'.$n.'" style="display:none">';
            echo '<div class="ncc"> <img src="window.svg" alt="No lesson" class="window"><br>Lol </div>';
            echo '<front>';
            echo '<l-marks id="marks'.$i.'" class='.$day_n.'>';
            if(!empty($cabinet[$i])){
                echo '<l-cab id="cab'.$i.'" class='.$day_n.'>'.$cabinet[$i].'</l-cab>';
            }
            echo '</l-marks>';
            echo '<l-section class='.$day_n.'>'.'<l-name id="name'.$i.'" class='.$day_n.'>'.$subject[$i].'</l-name>'.'</l-section>';
            echo '<l-theme id="theme'.$i.'" class='.$day_n.'>'.$theme[$i].'</l-theme>';
            echo '</front>';
            echo '<back>';
            echo '<l-marks id="marks'.$i.'" class='.$day_n.'>';
            if(!empty($mark[$i])){
            echo '<l-mark id="mark'.$i.'" class="'.$day_n.'">'.$mark[$i].'</l-mark>';
            }
            elseif(empty($mark[$i])){
            echo '<l-mark id="mark'.$i.'" style="opacity:0;">'.'0'.'</l-mark>';
            }
            echo '</l-marks>';
            echo '<l-section class='.$day_n.'>'.'<l-name id="name'.$i.'" class='.$day_n.'>'.$subject[$i].'</l-name>'.'</l-section>';
            echo '<l-hw id="hw'.$i.'" class='.$day_n.'>'.$homework[$i].'</l-hw>';
            echo "</back>";
            echo '</card>';
        } else {
            echo '<card id="c'.$n.'">';
            echo '<div class="ncc" style="display:none"> <img src="window.svg" alt="No lesson" class="window"><br>Lol </div>';
            echo '<front>';
            echo '<l-marks id="marks'.$i.'" class='.$day_n.'>';
            if(!empty($cabinet[$i])){
                echo '<l-cab id="cab'.$i.'" class='.$day_n.'>'.$cabinet[$i].'</l-cab>';
            }
            echo '</l-marks>';
            echo '<l-section class='.$day_n.'>'.'<l-name id="name'.$i.'" class='.$day_n.'>'.$subject[$i].'</l-name>'.'</l-section>';
            echo '<l-theme id="theme'.$i.'" class='.$day_n.'>'.$theme[$i].'</l-theme>';
            echo '</front>';
            echo '<back>';
            echo '<l-marks id="marks'.$i.'" class='.$day_n.'>';
            if(!empty($mark[$i])){
            echo '<l-mark id="mark'.$i.'" class="'.$day_n.'">'.$mark[$i].'</l-mark>';
            }
            elseif(empty($mark[$i])){
            echo '<l-mark id="mark'.$i.'" style="opacity:0;">'.'0'.'</l-mark>';
            }
            echo '</l-marks>';
            echo '<l-section class='.$day_n.'>'.'<l-name id="name'.$i.'" class='.$day_n.'>'.$subject[$i].'</l-name>'.'</l-section>';
            echo '<l-hw id="hw'.$i.'" class='.$day_n.'>'.$homework[$i].'</l-hw>';
            echo "</back>";
            echo '</card>';
        }
    }
}

$date = date('Y-m-d');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--[if lt IE 9]> 
    <script>
    document.createElement("week");
    document.createElement("day-container");
    document.createElement("day-inner");
    document.createElement("day-head");
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
    <link rel="stylesheet" href="diary.css">
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
                <div class="item week-controls" id="control-p"><img src="prev.svg" alt="Preview week" height="20px" width="20px"></div>
                <div class="item" id="week-dates"><? echo $d_monday.' - '.$d_saturday; ?></div>
                <div class="item week-controls" id="control-n"><img src="next.svg" alt="Next week" height="20px" width="20px"></div>
            <div id="quit-btn"><img src="quit.svg" alt="Quit" height="30px" width="30px"></div>
        </div>
        <div class="mob_menu">
            <div class="mhead"><img src="hambuger.svg" alt="Open left menu"></div>
        </div>
        <?
           // echo '<div id="wid">'.$week_id.'</div>';
        ?>
        <div id="loader" style="z-index:9999;">Загрузка...</div>
        <week id="mixedContent">
            <day-container>
                <?
                echo '<day-inner id="monday">';
                echo '<day-head class="monday">Понедельник - '.$d_monday.'</day-head>';
                    getDayContent(1);
                echo '</day-inner>';
                ?>
            </day-container>
            <day-container>
                <?
                echo '<day-inner class="tuesday">';
                echo '<day-head class="tuesday">Вторник - '.$d_tuesday.'</day-head>';
                    getDayContent(2);
                echo '</day-inner>';
                ?>
            </day-container>
            <day-container>
                <?
                echo '<day-inner class="wednesday">';
                echo '<day-head class="wednesday">Среда - '.$d_wednesday.'</day-head>';
                    getDayContent(3);
                echo '</day-inner>';
                ?>
            </day-container>
            <day-container>
                <?
                echo '<day-inner class="thursday">';
                echo '<day-head class="thursday">Четверг - '.$d_thursday.'</day-head>';
                    getDayContent(4);
                echo '</day-inner>';
                ?>
            </day-container>
            <day-container>
                <?
                echo '<day-inner class="friday">';
                echo '<day-head class="friday">Пятница - '.$d_friday.'</day-head>';
                    getDayContent(5);
                echo '</day-inner>';
                ?>
            </day-container>
            <day-container>
                <?
                echo '<day-inner class="saturday">';
                echo '<day-head class="saturday">Суббота - '.$d_saturday.'</day-head>';
                    getDayContent(6);
                echo '</day-inner>';
                ?>
            </day-container>
            <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
            <script src="jquery.easing.min.js"></script>
            <script src="prism.min.js"></script>
            <script src="jquery.flip.js"></script>
            <script src="jquery.afterlag.min.js"></script>
            <script src="diary.js"></script>
        </week>
    </nomenu>
</body>
</html>
