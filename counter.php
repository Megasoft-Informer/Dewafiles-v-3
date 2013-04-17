<?PHP
$open=fopen('counter.txt','r');
$lama=fgets($open,255);
$tutup=fclose($open);
$lama++;
$open=fopen('counter.txt','w');fputs($open,$lama);
$tutup=fclose($open);
?>