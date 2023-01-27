<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("header.php"); 
$con = mysql_connect("localhost","root","","trpmanagement");
 $page = 'five';
 include("includes/config.php");
 mysql_select_db("trpmanagement");
 $query=mysql_query("SELECT * FROM `buyerfiles`");
 $rowcount=mysql_num_rows($query);
 
  ?>

<!DOCTYPE html>
<html>
<head>
<title>Embed PHP in a .html File</title>
</head>
<body><div class="row">
		<table border="2">
			<theard>
				<th>buyerfileId</th>
				<th>buyerfileBid</th>
				<th>buyerfilePath</th>
				<th>date</th>
				<th>Action</th>
</thead>
<tbody>
<?php
for($i=1;$i<=$rowcount;$i++)
{
	$row=mysql_fetch_array($query);

?>
<tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>
		<td><?php echo $row[3];?></td>
<td><a href="download.php?file_id = <?php echo $row[2] ?>">Downloadfile</a></td>

</tr>
<?php	
}

?>
</tbody>
</div>

</table>

<?php
if(isset($_GET['file_id']))
{
	$var_1 = $_GET['file_id'];
//    $file = $var_1;

$dir = "images/buyer"; // trailing slash is important
$file = $dir . $var_1;

	if(file_exists($file))
			{
				
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($id);
				exit;
	
	}
else
	{
		echo "<h1>Content error</h1><p>The file does not exist!</p>";
	}
}
	?>
<?php include("footer.php");
  ?>