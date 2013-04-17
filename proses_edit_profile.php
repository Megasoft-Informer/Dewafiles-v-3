<?PHP
include("koneksi.php"); #including file koneksi.php for connection to database mysql
if (empty($_POST['id'])){
header("location:index.php");
}
##################################Get Submit Data POST###############################
$id = $_POST['id'];
$username = $_POST['username']; #get username from account.php
$password = $_POST['pswd'];
$email = $_POST['email']; #get email from account.php
$gender = $_POST['gender']; #get gender from account.php
$photo = basename($_FILES['photo']['name']); #get photo name from account.php
#####################################################################################

######################Make A function if photo change################################
Function photo_change($photo_name, $id_user){
$target = "user/$photo_name"."-$id_user.png";
if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)){ #jika benrhasil di upload
$sql = mysql_query("update anggota set photo='$target' where id='$id_user'");
header('location:account.php?succes=1');
}
else{
header("location:account.php?error=1");
}
}
#####################################################################################

#######################update account into database mysql############################
$sql = mysql_query("update anggota set nama='$username', email='$email', pswd='$password', gender='$gender' where id='$id'"); #query untuk update data ke database
$sql = mysql_query("update file set pemilik='$username' where pemilik='$nama'"); #jika username di ganti maka ganti juga keterangan pemilik filenya menjadi pemilik nama baru
$_SESSION['my_name'] = $username; #buat session my_name jadi $username
if (!empty($photo)){ #jika fotonya di ganti maka panggl function photo_change
photo_change($photo, $id); #pemangilan function photo_change
}
else{ #jika tidak di ganti fotonya maka alihkan aja ke acccout.php
header("Location:account.php?success=1"); #proses pengalihan
}
#####################################################################################
?>