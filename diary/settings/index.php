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

$week_id = $_SESSION['week_id'];

$d_r = $db->query("SELECT `date`, `day_id` FROM `weeks` WHERE week_id = '".$week_id."'");
$i = 0;
while ($ds[$i] = $d_r->fetch(PDO::FETCH_ASSOC)){
    $d[$i] = explode('-', $ds[$i]['date']);
    $dmonth[$i] = $d[$i][1];
    $dday[$i] = $d[$i][2];
    $i = $i+1;
}

$id = $_SESSION['id'];

function getDayContent($day) {
    global $db, $id, $week_id;

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

    $query = "SELECT schedule.subject_count AS sc, subjects.subject AS s FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN subjects ON subjects.subject_id = schedule.subject_id LEFT JOIN users ON schedule.class = users.class WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND groups.student_id = '".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($subjs[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $subject[$subjs[$i]['sc']] = $subjs[$i]['s'];
        $i++;
    }

    $query = "SELECT weeks.date AS d, schedule.subject_count AS sc, themes.theme AS th FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN themes ON themes.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = '".$week_id."' WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND themes.`date` = weeks.`date` AND weeks.day_id = '".$day."' AND groups.student_id='".$id."'";
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

    $query = "SELECT schedule.subject_count AS sc, homework.hw AS h FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN homework ON homework.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = '".$week_id."' WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND homework.`date` = weeks.`date` AND weeks.day_id = '".$day."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($homeworks[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $homework[$homeworks[$i]['sc']] = $homeworks[$i]['h'];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, marks.mark AS m, weeks.`date` FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN marks ON marks.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = '".$week_id."' WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND marks.`date` = weeks.`date` AND weeks.day_id = '".$day."' AND groups.student_id='".$id."'";
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
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Exo+2:400,100,200,300,500,600,700,800,900&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="settings.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Diary - Settings</title>
</head>
<? echo '<body>'; ?>
    <div class="spinner-box">
    </div>
    <nav id="main-nav" class="left-menu" data-direction="left" data-distanceX="225px" data-clickSelector=".mhead" data-touchSelector=".mhead">

        <div id="left-panel">
            <a href="#">What's first?</a>
            <a href="//wjrnl.esy.es/diary/settings">Account Settings</a>
            <a href="#"><? echo $classv," Class"?></a>
        </div>

        <a href="" class="toggle-left-panel"><? echo $_SESSION['first']," ",$_SESSION['last'];?></a>
        <a href="//wjrnl.esy.es/diary">Diary</a>
        <a href="//wjrnl.esy.es/forums">Forums</a>
        <a href="//wjrnl.esy.es/chats">Chats</a>
        <a href="//wjrnl.esy.es/marks">All Marks</a>
        <a href="//wjrnl.esy.es/summary">Sumary Marks</a>
    </nav>
    <div class="menu">
        <div class="mhead"><img src="hambuger.svg" alt="Open left menu"></div>
        <div class="logo">Journal</div>
            <div class="item" id="week-dates">Settings</div>
        <div id="quit-btn"><img src="quit.svg" alt="Quit" height="30px" width="30px"></div>
    </div>
    
    <div class="mob_menu">
        <div class="mhead"><img src="hambuger.svg" alt="Open left menu"></div>
    </div>
    	Here is the
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>
        <script src="jquery.flip.js"></script>
        <script src="settings.js"></script>
        <script src="scotchPanels.js"></script>
        <script src="power.js"></script>
</body>
</html>
