<?php
	include_once "Classes/shout.php";
	$shout = new Shout();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Basic Shout Box</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="wrapper clr">
			<header class="headsection clr">
				<h2>Basic Shoutbox with PHP OOP & MySQLi</h2>
			</header>
			<section class="content clr">
			<div class="box">
				
				<ul>
			<?php
				$getData = $shout->getAllData();
					if ($getData) {
						while ( $data = $getData->fetch_assoc()) {?>

					<li>
						 <span><?php echo $data['tim'];?> </span><b><?php echo $data['name'];?></b> <?php echo $data['body']; ?> 
					</li>
			<?php }} ?>
				</ul>
		
				</div>
				<div class="shoutform clr">
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$shoutdata = $shout->inserData($_POST);
		}
	?>
					<form action="" method="post">
						<table>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td><input type="text" name="name" placeholder="Please enter your Name" required="1"></td>
							</tr>
							<tr>
							<td>body</td>
							<td>:</td>
							<td><input type="text" placeholder="Please enter your text" name="body"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" value="Shout It"></td>
						</tr>
						</table>
					</form>
				</div>
			</section>
			<div class="footsection clr">
				<h2>&copy; Copyright Training with live project.</h2>
			</div>
		</div>
	</body>
</html>