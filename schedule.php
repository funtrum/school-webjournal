<?
session_start();

if($_SESSION['role']=='' AND empty($_GET['week'])) {
    header('Location: http://wjrnl.esy.es/');
}
if($_SESSION['role']=='1' AND empty($_GET['week'])) {
    header('Location: http://wjrnl.esy.es/diary');
}
if($_SESSION['role']=='2' AND empty($_GET['week'])) {
    header('Location: http://wjrnl.esy.es/parent');
}
if($_SESSION['role']=='3' AND empty($_GET['week'])) {
    header('Location: http://wjrnl.esy.es/teacher');
}

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
$login = $db->quote($_POST['login']);
/*$week_id = $db->quote($_GET['week']);
$d_r = $db->prepare("SELECT `date`, `day_id` FROM `weeks` WHERE week_id = ?");
$d_r->execute([$week_id]);
$i = 0;
while ($ds[$i] = $d_r->fetch(PDO::FETCH_ASSOC)){
    $d[$i] = explode('-', $ds[$i]['date']);
    $dmonth[$i] = $d[$i][1];
    $dday[$i] = $d[$i][2];
    $i = $i+1;
}*/

$d_sunday = date("d.m", strtotime('-'.date("w").' day'));
$d_monday = date("d.m", strtotime('-'.date("w").' day'.' +1 day'))
$week_id = date("W");

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

    $query = 'SELECT schedule.subject_count AS sc, subjects.subject AS s FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN subjects ON subjects.subject_id = schedule.subject_id LEFT JOIN users ON schedule.class = users.class WHERE schedule.group_id = groups.group_id AND schedule.day_id = :day AND groups.student_id = :id';
    $result = $db->prepare($query);
    $result->execute(array(':day' => $day, ':id' => $id));
    $i = 0;
    while ($subjs[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $subject[$subjs[$i]['sc']] = $subjs[$i]['s'];
        $i++;
    }
    $subject = json_encode($subject);

    $query = 'SELECT weeks.date AS d, schedule.subject_count AS sc, themes.theme AS th FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN themes ON themes.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = :week_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = :day AND themes.`date` = weeks.`date` AND weeks.day_id = :day AND groups.student_id = :id';
    $result = $db->prepare($query);
    $result->execute(array(':week_id' => $week_id, ':day' => $day, ':id' => $id));
    $i = 0;
    while ($themes[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $theme[$themes[$i]['sc']] = $themes[$i]['th'];
        $date = explode('-', $themes[0]['d']);
        $date_d = $date[2];
        $date_m = $date[1];
        $i++;
    }

    $theme = json_encode($theme);

    $query = 'SELECT schedule.subject_count AS sc, cabinets.cabinet AS cab FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN cabinets ON cabinets.subject_id = schedule.subject_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = :day AND groups.student_id = :id';
    $result = $db->prepare($query);
    $result->execute(array(':day' => $day, ':id' => $id));
    $i = 0;
    while ($cabinets[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $cabinet[$cabinets[$i]['sc']] = $cabinets[$i]['cab'];
        $i++;
    }
    $cabinet = json_encode($cabinet);

    $query = 'SELECT schedule.subject_count AS sc, homework.hw AS h FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN homework ON homework.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = :week_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = :day AND homework.`date` = weeks.`date` AND weeks.day_id = :day AND groups.student_id = :id';
    $result = $db->prepare($query);
    $result->execute(array(':week_id' => $week_id,':day' => $day, ':id' => $id));
    $i = 0;
    while ($homeworks[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $homework[$homeworks[$i]['sc']] = $homeworks[$i]['h'];
        $i++;
    }
    $homework = json_encode($homework);

    $query = 'SELECT schedule.subject_count AS sc, marks.mark AS m, weeks.`date` FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN marks ON marks.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = :week_id WHERE schedule.group_id = groups.group_id AND schedule.day_id = :day AND marks.`date` = weeks.`date` AND weeks.day_id = :day AND groups.student_id = :id';
    $result = $db->prepare($query);
    $result->execute(array(':week_id' => $week_id,':day' => $day, ':id' => $id));
    $i = 0;
    while ($marks[$i] = $result->fetch(PDO::FETCH_ASSOC)){
        $mark[$marks[$i]['sc']] = $marks[$i]['m'];
        $i++;
    }
    $mark = json_encode($mark);

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
        }
    }
}
        ?>
        <div class="day-container">
            <?
            echo '<div class="day" id="monday">';
            echo '<div class="dhead" id="monday">Monday - '.$d_monday.'</div>';
                getDayContent(1);
            echo '</div>';
            ?>
        </div>
        <div class="day-container">
            <?
            echo '<div class="day" id="tuesday">';
            echo '<div class="dhead" id="tuesday">Tuesday - '.$dday[1].'.'.$dmonth[1].'</div>';
                getDayContent(2);
            echo '</div>';
            ?>
        </div>
        <div class="day-container">
            <?
            echo '<div class="day" id="wednesday">';
            echo '<div class="dhead" id="wednesday">Wednesday - '.$dday[2].'.'.$dmonth[2].'</div>';
                getDayContent(3);
            echo '</div>';
            ?>
        </div>
        <div class="day-container">
            <?
            echo '<div class="day" id="thursday">';
            echo '<div class="dhead" id="thursday">Thursday - '.$dday[3].'.'.$dmonth[3].'</div>';
                getDayContent(4);
            echo '</div>';
            ?>
        </div>
        <div class="day-container">
            <?
            echo '<div class="day" id="friday">';
            echo '<div class="dhead" id="friday">Friday - '.$dday[4].'.'.$dmonth[4].'</div>';
                getDayContent(5);
            echo '</div>';
            ?>
        </div>
        <div class="day-container">
            <?
            echo '<div class="day" id="saturday">';
            echo '<div class="dhead" id="saturday">Monday - '.$dday[5].'.'.$dmonth[5].'</div>';
                getDayContent(6);
            echo '</div>';
            ?>
        </div>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>
        <script src="jquery.flip.js"></script>
        <script src="diary.js"></script>
        <script src="scotchPanels.js"></script>
        <script src="power.js"></script>