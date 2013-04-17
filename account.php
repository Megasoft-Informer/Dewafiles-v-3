<?PHP
include("header.php");
include("class/statistik.php");
?>
<div id="wrapper">
	<div id="leftBar">
		<?PHP include("menu-kanan.php"); ?> <!-- For menu on right bar -->
	</div>
	<div id="rightContent">
	<h3>My Account</h3>
	<?PHP
	if ($_GET['success']==1){
	echo "<center><div class='sukses'>Succes Update your account!</div></center>";
	}
	if ($_GET['error']==1){
	echo "<center><div class='gagal'>Failed To Update your account!</div></center>";
	}
	?>
	<form enctype="multipart/form-data" action="proses_edit_profile.php" method="POST">
	<input type="hidden" name="id" value="<?PHP echo $id; ?>">
	<p><me>Username</me></br>
	<input type="text" style="width:100%" required name='username' value="<?PHP echo $_SESSION['my_name']; ?>">
	<p><me>Email</me></br>
	<input type="text" style="width:100%" required name='email' value="<?PHP echo $email; ?>">
	<p><me>Password</me></br>
	<input type="password" style="width:100%" required name='pswd' value="<?PHP echo $pswd; ?>">
	<p><me>Gender</me></br>
	<select style="width:100%" required name="gender">
		<option><?PHP echo $gender; ?></option>
		<option>Male</option>
		<option>Female</option>
	</select>
	<p><me>Your Avatar</me></br>
	<img src="<?PHP echo $photo ?>" width="60" height="60"></br>
	Default Avatar : "<?PHP echo $photo; ?>"</br>
	Change => <input style="width:200px" type="file" name="photo">
	<p>
	<input type="submit" class="button" value="Save">
	</form>
	</div>
<div class="clear"></div>
<?PHP include("footer.php"); ?>
</div>
</body>
</html>
	