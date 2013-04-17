<?PHP
include("koneksi.php"); #for connection into database ($nama==userlogin)
if (empty($nama)){ #jika $nama kosong alihkan saja ke halaman  index.php
header("Location:index.php"); #proses pengalihan
}
$id_file = $_GET['id']; #mendapatkan id file yang ingin di hapus dari url
$sql = mysql_query("select * from file where id='$id_file'"); #dapatkan info filenya dulu sebelum di hapus
$data = mysql_fetch_array($sql); #dapatkan info pemilik aslinya
$pemilik = $data['pemilik']; #info pemilik aslinya
$nama_file = $data['nama'];
if ($pemilik==$nama){ #jika pemilik asli == user yang sedang login maka hapus filenya
$sql = mysql_query("delete from file where id='$id_file'"); #delete info filenya dari database
unlink("downloads/files/$nama_file"); #delete file from disk
header("location:myfiles.php?success=1"); #alihkan ke link ini
}
else{ #jika user login tdak sama dengan user pemilik file asli maka munculkan pesan ini
echo "Anda Di larang menghapus file milik orang lain!"; #munculkan tulisan
}
?>