<?PHP
include("koneksi.php");
###############Maximal filesize#########################
$max="3000"; #3mb mximal
$size=$_FILES['uploaded']['size'];
$size=$size/1024;
 #untuk menjadikannya dalam satuan MB
########################################################
###############for Extension file#######################
 function get_ext($key) { #function get extension file
	$key=strtolower(substr(strrchr($key, "."), 1));
	$key=str_replace("jpeg","jpg",$key);
	return $key;
	}
#get extension file
$file_ext=get_ext($_FILES['uploaded']['name']);
#extension allowed
$allow_types=array("pdf","xls","xlsx","ppt","pptx","mp4","mkv","vob","midi","avi","mp3","jpg","gif","png","bmp","zip","txt","doc","rar","jpeg","exe","dew","psd","ico","docx","ocx","dll");
############################################################

###############For get name file############################
$mypath="http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);#getting mypath example http://dewafiles.p.ht/
$folder = "downloads/files/"; #folder to upload files
$namafilenya = basename($_FILES['uploaded']['name']); #get filename of files
$namafilenya = strtolower($namafilenya);
$namafilenya = str_replace(' ','-',$namafilenya);
$target = $folder.$namafilenya;
############################################################
include("header.php");
?>
<div id="wrapper">
	<div id="leftBar">
		<?PHP include("menu-kanan.php"); ?> <!-- For menu on right bar -->
	</div>
	<div id="rightContent">
	<?PHP
	if(!in_array($file_ext, $allow_types)){ #typefile tidak d perbolehkan munculkan pesan ini
	$stop = 1;
	echo "<h3>Extension File Not Have Permision</h3>
	<title>Uploader File | Failed</title>
	<center>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	Maaf typefile/extensi file yang anda upload tidak di Perbolehkan untuk di upload di Hosting ini";
	echo "</br><a href='javascript:history.back()'>BACK</a>";
	}
	else{ #jika file type di perbolehkan cek sudah ada apa belum di directory
		if (file_exists($target)){ #jika filenya udah ada di hosting ini 
		echo "<h3>File Is Exist in this hosting</h3>
		<title>Uploader File | Failed</title>
		<center>
		<p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
		File yang anda upload telah ada di hosting ini...</br>Silahkan ganti namafile yang anda upload dengan nama yang lainnya";
        echo "</br><a href='javascript:history.back()'>BACK</a>";
		$stop==1;
		}
		else{
			if ($size>$max){ #maksimal filesize
			echo "<h3>File Is to large</h3>
			<title>Uploader File | Failed</title>
			<center>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			File Yang anda upload terlalu besar...</br>maksimal file size : 3MB per file";
			echo "</br><a href='javascript:history.back()'>BACK</a>";
			$stop=="1";}
			else {
			if ($size>1024){
			$size=$size/1000;
			$me=substr($size,0,4);
			$size="$me MB";}
			else{
			$size="$size";
			$me=substr($size,0,4);
			$size="$me KB";
			}
			if($stop==0){
			$waktu=date("H:i d M Y");
			$pesan=$_POST['pesan'];
			$path="$mypath/$target";
			#insert into Database
			$sql="insert into file values('' , '$namafilenya' , '$path' , '$pesan' , '$size' , '$nama', '0', '$waktu')";
			#pemasukan pathnya & upload
			$qry=mysql_query($sql) or die("query salah ". mysql_error());}
			if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){ #proses upload filenya
			if ($stop==0){
			$query = mysql_query("select * from file where nama='$namafilenya'") or die(mysql_error());
			while ($data = mysql_fetch_array($query)){
			$id=$data['id'];
			}}}
			else {
			echo "Maaf File Yang Ingin Anda Upload Tidak Bisa Terupload untuk Saat ini.";
			$stop==1;
			}
		
	
	?>
	<h3>Success Uploading File</h3>
	<center>
	<a target="_blank" href='<?PHP echo "$mypath/downloads.php?id=$id"; ?>'><img src='images/down_2.png' title='View File on Hosting'></a><p>
	</br>Simple Link</br>
	<a target="_blank" href="<?PHP echo "$mypath/downloads.php?id=$id"; ?>"><?PHP echo "$mypath/downloads.php?id=$id"; ?></a>
	</br>General Link</br>
	<a target="_blank" href="<?PHP echo "$mypath/download-$namafilenya.htm"; ?>"><?PHP echo "$mypath/downloads-$namafilenya.htm"; ?></a>
	</center>
<?PHP
}
}
}
?>
</div>
<div class="clear"></div>
<?PHP include("footer.php"); ?>
</div>
</body>
</html>