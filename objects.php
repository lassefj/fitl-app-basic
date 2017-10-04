<?php  

$id = $_REQUEST['id'];

$object = array(
	'title' => '',
	'description' => '',
	'code' => '',
	'submitted_at' => '',
);

$servername = 'localhost';
$username = 'homestead';
$password = 'secret';

$connection = new mysqli ($servername, $username, $password);

if ($connection->connect_error) {
	echo 'Connection failed: ' . $connection->connect_error;
	exit;
}

echo 'Connection successfully';

$connection->select_db('fitl');

$connection->set_charset("utf8");

$sql = 'SELECT * FROM questions WHERE id = ' . $id;

$result = $connection->query($sql);

if ($result->num_rows > 0) {
	$object = $result->fetch_assoc();
	echo '<pre>';
	print_r($object);
	echo '</pre>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title><?php echo $object ['title']; ?></title>
</head>
<body>
<h1><?php echo $object ['title']; ?></h1>
<p><?php echo $object ['description']; ?></p>
<pre>
	<?php $object ['code']; ?>
</pre>

<p>Question submitted at: <?php echo $object ['submitted_at']; ?></p>

</body>
</html>