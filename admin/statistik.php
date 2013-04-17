<?PHP
include("session_admin.php");
include("header.php");
include("../class/statistik.php");
if (empty($nama_admin)){
header("location:index.php");
}
?>
<div id="wrapper">
	<div id="leftBar">
	<?PHP include("menu-kanan.php"); ?> <!-- For menu on right bar -->
	</div>
	<div id="rightContent">
	<h3>Statistik</h3>
	<table class="data">
			<tr class="data">
				<th class="data" width="30px">No</th>
				<th class="data">Date</th>
				<th class="data">File Di Download</th>
				<th class="data">Page Hits</th>
			</tr>
			<?PHP
			#get data from mysql
			
			$no = 1;
			$query = mysql_query("select * from statistik ORDER BY statistik.date DESC") or die(mysql_error());
			while ($data = mysql_fetch_array($query)){
			$s_date=$data['date'];
			$s_down=$data['down'];
			$s_hits=$data['hits'];
			?>
			<tr class="data">
				<td class="data" width="30px"><?PHP echo $no; ?></td>
				<td class="data"><?PHP echo $s_date; ?></td>
				<td class="data"><?PHP echo $s_down; ?></td>
				<td class="data"><?PHP echo $s_hits; ?></td>
			</tr>
			<?PHP
			$no++;
			}
			?>
		</table>
	</div>
<div class="clear"></div>
<?PHP include("../footer.php"); ?>
</div>
</body>
</html>
	