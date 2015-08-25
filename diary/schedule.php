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
$day = $_POST['day'];
$func_id = $_POST['func']; //1 - prev, 0 - next
$multiply = 7;

$id = $_SESSION['id'];
    function getDayInfo()
    {
    global $db, $id, $week_id, $day, $multiply, $func_id;

    if ($func_id == 0) 
    {
        $d_date[0] = date("d.m", strtotime('-'.date("w").' day'.' +'.$multiply*$week_id.' day'));
        $d_date[1] = date("d.m", strtotime('-'.date("w").' day'.' +1 day'.' +'.$multiply*$week_id.' day'));
        $d_date[2] = date("d.m", strtotime('-'.date("w").' day'.' +2 day'.' +'.$multiply*$week_id.' day'));
        $d_date[3] = date("d.m", strtotime('-'.date("w").' day'.' +3 day'.' +'.$multiply*$week_id.' day'));
        $d_date[4] = date("d.m", strtotime('-'.date("w").' day'.' +4 day'.' +'.$multiply*$week_id.' day'));
        $d_date[5] = date("d.m", strtotime('-'.date("w").' day'.' +5 day'.' +'.$multiply*$week_id.' day'));
        $d_date[6] = date("d.m", strtotime('-'.date("w").' day'.' +6 day'.' +'.$multiply*$week_id.' day'));
    }
    if ($func_id == 1)
    {
        $d_date[0] = date("d.m", strtotime('-'.date("w").' day'.' -'.$multiply*$week_id.' day'));
        $d_date[1] = date("d.m", strtotime('-'.date("w").' day'.' +1 day'.' -'.$multiply*$week_id.' day'));
        $d_date[2] = date("d.m", strtotime('-'.date("w").' day'.' +2 day'.' -'.$multiply*$week_id.' day'));
        $d_date[3] = date("d.m", strtotime('-'.date("w").' day'.' +3 day'.' -'.$multiply*$week_id.' day'));
        $d_date[4] = date("d.m", strtotime('-'.date("w").' day'.' +4 day'.' -'.$multiply*$week_id.' day'));
        $d_date[5] = date("d.m", strtotime('-'.date("w").' day'.' +5 day'.' -'.$multiply*$week_id.' day'));
        $d_date[6] = date("d.m", strtotime('-'.date("w").' day'.' +6 day'.' -'.$multiply*$week_id.' day'));
    }


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

    if ($func_id == 0) 
    {
        $f_date[0] = date("Y-m-d", strtotime('-'.date("w").' day'.' +'.$multiply*$week_id.' day'));
        $f_date[1] = date("Y-m-d", strtotime('-'.date("w").' day'.' +1 day'.' +'.$multiply*$week_id.' day'));
        $f_date[2] = date("Y-m-d", strtotime('-'.date("w").' day'.' +2 day'.' +'.$multiply*$week_id.' day'));
        $f_date[3] = date("Y-m-d", strtotime('-'.date("w").' day'.' +3 day'.' +'.$multiply*$week_id.' day'));
        $f_date[4] = date("Y-m-d", strtotime('-'.date("w").' day'.' +4 day'.' +'.$multiply*$week_id.' day'));
        $f_date[5] = date("Y-m-d", strtotime('-'.date("w").' day'.' +5 day'.' +'.$multiply*$week_id.' day'));
        $f_date[6] = date("Y-m-d", strtotime('-'.date("w").' day'.' +6 day'.' +'.$multiply*$week_id.' day'));
    }
    if ($func_id == 1)
    {
        $f_date[0] = date("Y-m-d", strtotime('-'.date("w").' day'.' -'.$multiply*$week_id.' day'));
        $f_date[1] = date("Y-m-d", strtotime('-'.date("w").' day'.' +1 day'.' -'.$multiply*$week_id.' day'));
        $f_date[2] = date("Y-m-d", strtotime('-'.date("w").' day'.' +2 day'.' -'.$multiply*$week_id.' day'));
        $f_date[3] = date("Y-m-d", strtotime('-'.date("w").' day'.' +3 day'.' -'.$multiply*$week_id.' day'));
        $f_date[4] = date("Y-m-d", strtotime('-'.date("w").' day'.' +4 day'.' -'.$multiply*$week_id.' day'));
        $f_date[5] = date("Y-m-d", strtotime('-'.date("w").' day'.' +5 day'.' -'.$multiply*$week_id.' day'));
        $f_date[6] = date("Y-m-d", strtotime('-'.date("w").' day'.' +6 day'.' -'.$multiply*$week_id.' day'));
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
    $query = "SELECT schedule.subject_count AS sc, themes.theme AS th FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN themes ON themes.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND themes.`date` = '".$f_date[$day]."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($themes = $result->fetch(PDO::FETCH_ASSOC)){
        $cn = $themes['sc'];
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

    $query = "SELECT schedule.subject_count AS sc, homework.hw AS h FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN homework ON homework.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND homework.`date` = '".$f_date[$day]."' AND groups.student_id='".$id."'";
    $result = $db->query($query);
    $i = 0;
    while ($homeworks = $result->fetch(PDO::FETCH_ASSOC)){
        $homework[$homeworks['sc']] = $homeworks['h'];
        $i++;
    }

    $query = "SELECT schedule.subject_count AS sc, marks.mark AS m FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN marks ON marks.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND marks.`date` = '".$f_date[$day]."' AND groups.student_id='".$id."'";
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

    $ret = array($day_n => array('subjects' => array($subject), 'themes' => array($theme), 'cabinets' => array($cabinet), 'homework' => array($homework), 'mark' => array($mark), 'date' => $d_date[$day]), 'weekdates' => $d_date[1].' - '.$d_date[6]);
    echo json_encode($ret);
}
getDayInfo();
?>