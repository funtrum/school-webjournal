<?
session_start();

header('Content-Type: application/x-javascript; charset=utf8');

if($_SESSION['role']=='' AND empty($_GET['week'])) {
    header('Location: http://wjrnl.esy.es/');
}
/*if($_SESSION['role']=='1' AND empty($_GET['week'])) {
    header('Location: http://wjrnl.esy.es/diary');
}*/
if($_SESSION['role']=='2' AND empty($_GET['week'])) {
    header('Location: http://wjrnl.esy.es/parent');
}
if($_SESSION['role']=='3' AND empty($_GET['week'])) {
    header('Location: http://wjrnl.esy.es/teacher');
}

$login = $_POST['login'];
$password = md5($_POST['pass']);
$host="mysql.hostinger.ru";
$dbname="u377256951_new";
$user="u377256951_s";
$pass="x25P#eGz]E:Qr5jHk9";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
}  
catch(PDOException $e) {  
    echo $e->getMessage();  
}

$week_id = $_POST['week'];
$d_r = $db->query("SELECT `date`, `day_id` FROM `weeks` WHERE week_id = '".$week_id."'");
$i = 0;
while ($ds[$i] = $d_r->fetch(PDO::FETCH_ASSOC)){
    $d[$i] = explode('-', $ds[$i]['date']);
    $dmonth[$i] = $d[$i][1];
    $dday[$i] = $d[$i][2];
    $i = $i+1;
}

$id = $_SESSION['id'];
    function getDayInfo()
    {
    global $db, $id, $week_id, $dday, $dmonth;

    $day = $_POST['day'];

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

	$db->query("SET CHARACTER SET 'utf8'");
    $query = "SELECT schedule.subject_count AS sc, subjects.subject AS s FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN subjects ON subjects.subject_id = schedule.subject_id LEFT JOIN users ON schedule.class = users.class WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND groups.student_id = '".$id."'";
    $result = $db->query($query);
    $i = 0;
    $subject = array();
    while ($subjs = $result->fetch(PDO::FETCH_ASSOC)){
        $subject[$subjs['sc']] = $subjs['s'];
        $i++;
    }

    $theme = array();
    $query = "SELECT weeks.date AS d, schedule.subject_count AS sc, themes.theme AS th FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN themes ON themes.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = '".$week_id."' WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND themes.`date` = weeks.`date` AND weeks.day_id = '".$day."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($themes = $result->fetch(PDO::FETCH_ASSOC)){
        $cn = 'theme_'.$themes['sc'];
        $theme[$cn] = $themes['th'];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, cabinets.cabinet AS cab FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN cabinets ON cabinets.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($cabinets = $result->fetch(PDO::FETCH_ASSOC)){
        $cabinet[$cabinets['sc']] = $cabinets['cab'];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, homework.hw AS h FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN homework ON homework.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = '".$week_id."' WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND homework.`date` = weeks.`date` AND weeks.day_id = '".$day."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($homeworks = $result->fetch(PDO::FETCH_ASSOC)){
        $homework[$homeworks['sc']] = $homeworks['h'];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, marks.mark AS m, weeks.`date` FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN marks ON marks.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = '".$week_id."' WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND marks.`date` = weeks.`date` AND weeks.day_id = '".$day."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($marks = $result->fetch(PDO::FETCH_ASSOC)){
        $mark[$marks['sc']] = $marks['m'];
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
        if(empty($theme[$i])){$theme[$i] = ' ';}
        if(empty($cabinet[$i])){$cabinet[$i] = ' ';}
        if(empty($homework[$i])){$homework[$i] = ' ';}
        if(empty($mark[$i])){$mark[$i] = ' ';}
    }

    $ret = array($day_n => array('subjects' => array($subject), 'themes' => array($theme), 'cabinets' => array($cabinet), 'homework' => array($homework), 'mark' => array($mark), 'date' => $dday[$day-1].'.'.$dmonth[$day-1]), 'weekdates' => $dday[0].'.'.$dmonth[0].' - '.$dday[6].'.'.$dmonth[6]);
    echo json_encode($ret);
}
getDayInfo();
?>