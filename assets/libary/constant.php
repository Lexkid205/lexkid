<?php
$db = mysqli_connect('localhost', 'root', '', 'book_keeper');


function alert($message, $count = 0)
{
	$type = ($count > 0) ? 'alert-danger' : 'alert-success';
	$alert_string = ' <div id="aalert" class="alert ' . $type . '" style="position:fixed; top:10px; right:15px; z-index:999999999999999999"><i>' . $message . '</i></div>
		<script>
			setTimeout(() => {
			  const box = document.getElementById("aalert");

			  box.style.display = "none";
			}, 3000);
		</script>

	';
	return $alert_string;
}

function user($col){
	global $db;
	$id = $_SESSION['user_id'];
	$sql = $db->query("SELECT * FROM users WHERE id = '$id'");
	$row = mysqli_fetch_array($sql);
	return $row[$col];
}
