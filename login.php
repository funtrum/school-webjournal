<?
session_start();

header('Location: http://wjrnl.esy.es/');

$login = $_POST['login'];
$password = hash_hmac('sha256', md5($_POST['pass']), '9c664c119a68c5154bccbf1ee348a205');
$host="YOUR_DB_HOST";
$dbname="YOUR_DB_NAME";
$user="YOUR_DB_USER";
$pass="YOUR_DB_PASSWORD";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
}  
catch(PDOException $e) {  
    echo $e->getMessage();  
}

$date = date('Y-m-d');

$res = $db->prepare('SELECT `users` . * ,  `weeks`.`week_id` FROM `users` LEFT JOIN  `weeks` ON  `weeks`.`date` =  :d WHERE `login` = :l');
$res->execute(array(':d' => $date, ':l' => $login));
while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    //echo $password."/".$row['password'];
    if($row['password']==$password) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['first'] = $row['first'];
        $_SESSION['last'] = $row['last'];
        $_SESSION['alt'] = $row['alt'];
        $_SESSION['class'] = $row['class'];
        $_SESSION['birthday'] = $row['birthday'];
        $_SESSION['monday'] = $row['monday'];
        $_SESSION['tuesday'] = $row['tuesday'];
        $_SESSION['wednesday'] = $row['wednesday'];
        $_SESSION['thursday'] = $row['thursday'];
        $_SESSION['friday'] = $row['friday'];
        $_SESSION['saturday'] = $row['saturday'];
        $_SESSION['groups'] = $row['groups'];
        $_SESSION['week_id'] = $row['week_id'];
        echo $_SESSION['role'];
    } else {
        echo "0";
    }
}
?>