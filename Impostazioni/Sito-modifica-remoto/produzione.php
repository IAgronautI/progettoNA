<?php
	session_start();
	if($_SESSION["autorizzato"] == 0)
	{
		echo '<script language=javascript>window.location.href="nonautorizzato.html";</script>';
	}
?>


<!DOCTYPE html >
<html >
	<head>
		<meta charset="UTF-8">
		<link href="stileproduzione.css" rel="stylesheet" type="text/css">
		<title></title>
	</head>
	 
	<body>
	 
		<?php 
			header('Content-Type: text/html; charset=utf-8');
			//connect to mysql server with host,username,password
			//if connection fails stop further execution and show mysql error
			$connection=mysql_connect('localhost','root','PASSWORD') or die(mysql_error());
			//select a database for given connection
			//if database selection  fails stop further execution and show mysql error
			mysql_select_db('dati_produzione',$connection) or die(mysql_error());
	
			mysql_query("SET character_set_results=utf8;") or die(mysql_error());

			//execute a mysql query to retrieve all the users from users table
			//if  query  fails stop further execution and show mysql error
			$query=mysql_query("SELECT * FROM dati_produzione.output_catena;") or die(mysql_error());
			 
			//if we get any results we show them in table data
			if(mysql_num_rows($query)>0):	 
		?>
		 
		<table>
			<tr>
				<th align="center">Linea Produzione</th>
				<th align="center">Barcode Prodotto</th>
				<th align="center">Nome Prodotto</th>
				<th align="center">Descrizione</th>
				<th align="center">Quantita'</th>
			</tr>
			<?php 
				// looping 
				while($row=mysql_fetch_object($query)):
			?>
			<tr>
				<td align="center"><?php echo $row->Linea;  //row id ?></td>
				<td align="center"><?php echo $row->ID_prodotto; // row first name ?></td>
				<td align="center"><?php echo $row->Nome; //row last name  ?></td>
				<td align="center"><?php echo $row->Descrizione; //row contact number ?></td>
				<td align="center"><?php echo $row->numProdotti; //row created time ?></td>
			</tr>
			<?php endwhile;?>
		</table>
		<?php 
			// no result show 
			else: 
		?>
		<h3>No Results found.</h3>
		<?php endif; ?>
		<br></br>
		<a href="logout.php">Logout</a>
	</body>
</html>
