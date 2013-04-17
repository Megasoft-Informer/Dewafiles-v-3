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
	<h3>Home</h3>
		<div class="shortcutHome">
		<a href="home.php"><img src="../images/icon/home.png"><br>Home Page</a>
		</div>
		<div class="shortcutHome">
		<a href="upload.php"><img src="../images/icon/file-manager.png"><br>Upload File</a>
		</div>
		<div class="shortcutHome">
		<a href="allusers.php"><img src="../images/icon/alluser.png"><br>All Users</a>
		</div>
		<div class="shortcutHome">
		<a href="allfiles.php"><img src="../images/icon/all.png"><br>All Files</a>
		</div>
		<div class="shortcutHome">
		<a href="account.php"><img src="../images/icon/user-info.png"><br>My Profiles</a>
		</div>
		<div class="shortcutHome">
		<a href="http://www.facebook.com/dewa.bagass.3"><img src="../images/icon/fb.png"><br>Facebook</a>
		</div>
		<div class="clear"></div>
		
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
<?PHP include("../footer.php"); ?>
</div>
</body>
</html>