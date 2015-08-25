<link rel="stylesheet" href="diary.css">
<?

$host="mysql.hostinger.ru";
	$dbname="u377256951_new";
	$user="u377256951_s";
	$pass="x25P#eGz]E:Qr5jHk9";
	$id = 1;//$_SESSION['id'];

	try {
	    $db = new PDO("mysql:host=mysql.hostinger.ru;dbname=u377256951_new", $user, $pass);  
	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}

	$query = "SELECT weeks.week_id AS id FROM weeks WHERE weeks.`date` = '2014-12-01'";
	$result = $db->query($query);
	while ($week_res = $result->fetch(PDO::FETCH_ASSOC)) {
		$week_id = $week_res['id'];
	}

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
		global $date_d, $date_m;
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

	$query = "SELECT schedule.subject_count AS sc, homework.hw AS hw FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN homework ON homework.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = '".$week_id."' WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND homework.`date` = weeks.`date` AND weeks.day_id = '".$day."' AND groups.student_id='".$id."'";
	$result = $db->query($query);
	$i = 0;
	while ($homework[$i] = $result->fetch(PDO::FETCH_ASSOC)){
		$hw[$homework[$i]['sc']] = $homework[$i]['hw'];
		$i++;
	}

	$query = "SELECT schedule.subject_count AS sc, marks.mark AS m, weeks.`date` FROM schedule LEFT JOIN groups ON schedule.subject_id = groups.subject_id LEFT JOIN marks ON marks.subject_id = schedule.subject_id LEFT JOIN weeks ON weeks.week_id = '".$week_id."' WHERE schedule.group_id = groups.group_id AND schedule.day_id = '".$day."' AND marks.`date` = weeks.`date` AND weeks.day_id = '".$day."' AND groups.student_id='".$id."'";
	$result = $db->query($query);
	$i = 0;
	while ($marks[$i] = $result->fetch(PDO::FETCH_ASSOC)){
		$mark[$marks[$i]['sc']] = $marks[$i]['m'];
		$i++;
	}
	for ($i=0; $i<10; $i++) {
		if(empty($hw[$i])){$hw[$i] = 'No homework';}
		if(empty($subject[$i])){$subject[$i] = 'No lesson';}
		if($subject[$i] == 'No lesson'){
            echo '<div class="nocard"> <img src="window.svg" alt="No lesson" class="window"><br>Time to read books</div>';
        } else {
            echo '<div id="card'.$i.'">';
            echo '<div class="front">';
            echo '<div class="lmarks" id='.$day_n.'>';
            if(!empty($cabinet[$i])){
            	echo '<div class="lcab">'.$cabinet[$i].'</div>';
        	}
            echo '</div>';
            echo '<div class="section" id='.$day_n.'>'.'<div class="lname" id='.$day_n.'>'.'<span class="lcount">'.$i.'</span> '.$subject[$i].'</div>'.'</div>';
            echo '<div class="ltheme" id='.$day_n.'>'.$theme[$i].'</div>';
            echo '</div>';
            echo '<div class="back">';
            echo '<div class="lmarks" id='.$day_n.'>';
            if(!empty($mark[$i])){
            echo '<div class="lmark" id="'.$mark_t[$i].'">'.$mark[$i].'</div>';
            }
            elseif(empty($mark[$i])){
            echo '<div class="lmark" id="'.'mgreen'.'" style="opacity:0;">'.'0'.'</div>';
            }
            echo '</div>';
            echo '<div class="section" id='.$day_n.'>'.'<div class="lname" id='.$day_n.'>'.$subject[$i].'</div>'.'</div>';
            echo '<span class="lhw" id='.$day_n.'>'.$hw[$i].'</span>';
            echo "</div>";
            echo '</div>';
		}
	}
}
echo '<div class="day-container">';
echo '<div class="day" id="'.$day_n.'">';
echo '<div class="dhead" id="'.$day_n.'">'.$day_n.' - '.$date_d.'.'.$date_m.'</div>';
getDayContent(1);
echo "</div>";
echo "</div>";
echo "</div>";
?>