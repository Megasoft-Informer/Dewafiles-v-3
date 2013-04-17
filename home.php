<?PHP
include("header.php");
include("class/statistik.php");

?>
<div id="wrapper">
	<div id="leftBar">
	<?PHP include("menu-kanan.php"); ?> <!-- For menu on right bar -->
	</div>
	<div id="rightContent">
	<h3>Home</h3>
	<div class="quoteOfDay">
	<b>News : </b><br>
	<i style="color: #5b5b5b;">Add Your News On Here</i>
	</div>
		<div class="shortcutHome">
		<a href="home.php"><img src="images/icon/home.png"><br>Home Page</a>
		</div>
		<div class="shortcutHome">
		<a href="upload.php"><img src="images/icon/file-manager.png"><br>Upload File</a>
		</div>
		<div class="shortcutHome">
		<a href="allusers.php"><img src="images/icon/alluser.png"><br>All Users</a>
		</div>
		<div class="shortcutHome">
		<a href="allfiles.php"><img src="images/icon/all.png"><br>All Files</a>
		</div>
		<div class="shortcutHome">
		<a href="account.php"><img src="images/icon/user-info.png"><br>My Profiles</a>
		</div>
		<div class="shortcutHome">
		<a href="http://www.facebook.com/dewa.bagass.3"><img src="images/icon/fb.png"><br>Facebook</a>
		</div>
		<div class="clear"></div>
		<div id="smallRight"><h3>Informasi Anda</h3>
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
		    <tr><td style="border: none;padding: 4px;">Rank Anda</td><td align="right"  style="border: none;padding: 4px;"><b><?PHP echo"<font color='blue'>$ranking</font> of $jumlah_user"; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah Poin Anda</td><td style="position:relative;float:right;"><b><?PHP echo "$ ".$my_poin; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah File Anda</td><td style="position:relative;float:right;"><b><?PHP echo $jumlah_my_file; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah File Anda Di Download</td><td style="position:relative;float:right;"><b><?PHP echo $jumlah_file_download; ?></b></td></tr>
		</table>
		</div>
		<div id="smallRight"><h3>Informasi Web Ini</h3>
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">Jumlah Pengunjung</td><td style="position:relative;float:right;"><b><?PHP echo $all_hits + 1; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah Pengunjung Hari Ini</td><td style="position:relative;float:right;"><b><?PHP echo $hits_today; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah Pengunjung Kemarin</td><td style="position:relative;float:right;"><b><?PHP echo $hits_yesterday; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah File Di Download</td><td style="position:relative;float:right;"><b><?PHP echo $all_unduh; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah File Di Download Hari Ini</td><td style="position:relative;float:right;"><b><?PHP echo $down_today; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah File Di Kemarin</td><td style="position:relative;float:right;"><b><?PHP echo $down_yesterday; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah Semua User</td><td style="position:relative;float:right;"><b><?PHP echo $jumlah_user; ?></b></td></tr>
		    <tr><td style="border: none;padding: 4px;">Jumlah User Online</td><td style="position:relative;float:right;"><b><?PHP echo $jumlah_user_online; ?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah Semua File</td><td style="position:relative;float:right;"><b><?PHP echo $jumlah_all_file; ?></b></td></tr>
		</table>
		</div>
	</div>
<div class="clear"></div>
<?PHP include("footer.php"); ?>
</div>
</body>
</html>