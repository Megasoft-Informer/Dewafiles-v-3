<?PHP
include("header.php");
include("class/statistik.php");
?>
<div id="wrapper">
	<div id="leftBar">
		<?PHP include("menu-kanan.php"); ?> <!-- For menu on right bar -->
	</div>
	<div id="rightContent">
	<h3>Upload Your File</h3>
	<form enctype="multipart/form-data" action="proses_upload.php" method="POST" required="required">
	Select File</br>
	<input name="uploaded" size="90%" type="file" required/>
	</br>
	Description File
    <textarea name="pesan" style="width:98%;height:23%;" required></textarea>
	<p>
	<button type="submit"  class="button add">Upload Now</button>
	<p><h2>Note</h2>
	1. File Extension => xls,xlsx,ppt,pptx,mp4,mkv,vob,midi,avi,mp3,jpg,gif,png,bmp,zip,txt,doc,rar,jpeg,exe,dew,psd,ico,docx,ocx,dll
	</br>2. Max File Size => 3 MB/file
	</form>
	</div>
<div class="clear"></div>
<?PHP include("footer.php"); ?>
</div>
</body>
</html>
	