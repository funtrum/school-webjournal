<?
session_start();

//header('Location: http://wjrnl.esy.es/');

$login = $_POST['login'];
$password = hash_hmac('sha256', $_POST['pass'], '9c664c119a68c5154bccbf1ee348a205');
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

$date = date('Y-m-d');

$res = $db->query("SELECT `users` . * ,  `weeks`.`week_id` FROM `users` LEFT JOIN  `weeks` ON  `weeks`.`date` =  '$date' WHERE `login`='$login'");
while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    if($row['password']==$password) {
        $arr = array("id" => $row['id'], "role" => $row['role'], "first" => $row['first'], "last" => $row['last'], "alt" => $row['alt'], "class" => $row['class'], "birthday" => $row['birthday'], "groups" => $row['groups']);
        echo json_encode($arr);
    } else {
        echo "Error";
    }
}
?>
