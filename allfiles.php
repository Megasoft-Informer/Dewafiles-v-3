<?PHP
include("header.php");
include("class/statistik.php");
?>
<div id="wrapper">
	<div id="leftBar">
		<?PHP include("menu-kanan.php"); ?> <!-- For menu on right bar -->
	</div>
	<div id="rightContent">
	<h3>All Files</h3>
	<table class="data">
			<tr class="data">
				<th class="data" width="30px">No</th>
				<th class="data">Filename</th>
				<th class="data">Description</th>
				<th class="data">Owner</th>
				<th class="data">Size</th>
				<th class="data">hits</th>
				<th class="data" width="50px">Action</th>
			</tr>
			<?PHP
			#get data from mysql
			
			$no = 1;
			$query = mysql_query("select * from file ORDER BY file.hits DESC") or die(mysql_error());
			while ($data = mysql_fetch_array($query)){
			$id=$data['id'];
			$namafile=$data['nama'];
			$pesanfile=$data['komen'];
			$hits=$data['hits'];
			$alamat=$data['path'];
			$size=$data['size'];
			$pemilik=$data['pemilik'];
			?>
			<tr class="data">
				<td class="data" width="30px"><?PHP echo $no; ?></td>
				<td class="data"><?PHP echo $namafile; ?></td>
				<td class="data"><?PHP echo $pesanfile; ?></td>
				<td class="data"><a target="_blank" href="info.php?nama=<?PHP echo $pemilik ?>"><u><?PHP echo $pemilik; ?></u></td>
				<td class="data"><?PHP echo $size; ?></td>
				<td class="data"><?PHP echo $hits." Times"; ?></td>
				<td class="data" width="25px">
				<center>
				<a target="_blank" href="downloads.php?id=<?PHP echo $id; ?>" title="view details"><img src="css/img/detail.png"></a>
				</center>
				</td>
			</tr>
			<?PHP
			$no++;
			}
			?>
		</table>
	</div>
<div class="clear"></div>
<?PHP include("footer.php"); ?>
</div>
</body>
</html>
	