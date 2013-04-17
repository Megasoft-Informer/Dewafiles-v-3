<?PHP
include("header.php");
include("class/statistik.php");
?>
<div id="wrapper">
	<div id="leftBar">
		<?PHP include("menu-kanan.php"); ?> <!-- For menu on right bar -->
	</div>
	<div id="rightContent">
	<h3>All Users</h3>
	<table class="data">
			<tr class="data">
				<th class="data" width="30px">No</th>
				<th class="data">Username</th>
				<th class="data">Email</th>
				<th class="data">Gender</th>
				<th class="data">Birth</th>
				<th class="data">Status</th>
				<th class="data" width="25px">Action</th>
			</tr>
			<?PHP
			#get data from mysql
			
			$no = 1;
			$query = mysql_query("select * from anggota ORDER BY anggota.id ASC") or die(mysql_error());
			while ($data = mysql_fetch_array($query)){
			$id=$data['id'];
			$namanya=$data['nama'];
			$email=$data['email'];
			$gender=$data['gender'];
			$lahir=$data['lahir'];
			$photo=$data['photo'];
			$online=$data['online'];
			if ($online=="Y"){ #jika online dari si user Y maka (Y=online / N=offline)
			$image_status = "user/online.png";
			}
			else{ #jika hasil online = N
			$image_status = "user/offline.png";
			}
			?>
			<tr class="data">
				<td class="data" width="30px"><?PHP echo $no; ?></td>
				<td class="data"><?PHP echo $namanya; ?></td>
				<td class="data"><?PHP echo $email; ?></td>
				<td class="data"><?PHP echo $gender; ?></td>
				<td class="data"><?PHP echo $lahir; ?></td>
				<td class="data"><?PHP echo "<img src='$image_status' width='16' height='16'/>"; ?></td>
				<td class="data" width="25px">
				<center>
				<a target="_blank" href="info.php?nama=<?PHP echo $namanya; ?>" title="view details"><img src="css/img/detail.png"></a>
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
	