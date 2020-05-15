<?php 
$id  = $_POST['id'];
$name  = $_POST['name'];

$local_file = 'link local .txt file here';
$server_file = 'link to server whitelist.txt file here';

$write_to = file_get_contents($local_file);
$write_to .= $name.$id."\n";
file_put_contents($local_file, $write_to);

$ftp_server="ftp host name";
$ftp_user_name="ftp user name";
$ftp_user_pass="ftp password";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_pasv($conn_id, true);


if (!ftp_put($conn_id, $server_file, $local_file, FTP_BINARY)) {
    echo "Sorry there was a problem, try again";
}
ftp_close($conn_id);