<?php
ob_end_flush();
ob_implicit_flush(1);
sleep(1);
echo "后台正在扫描，请稍等～～～</br>";
$type=$_POST['type'];
if($type=='1'){
  $ip=$_POST['ip'];
  $iface=$_POST['interface'];
  $thread=$_POST['thread'];
  system("sudo python ./scan.py -link $ip $iface $thread");
}
if($type=='2'){
  $ip=$_POST['ip'];
  $iface=$_POST['interface'];
  $thread=$_POST['thread'];
  system("sudo python ./scan.py -ip $ip $iface $thread");
}
if($type=='3'){
  $ip=$_POST['ip'];
  $port=$_POST['port'];
  $iface=$_POST['interface'];
  $thread=$_POST['thread'];
  system("sudo python ./scan.py -transport $ip $port $iface $thread");
}
echo "扫描请求为： ip--->".$ip."     port--->".$port."     iface--->".$iface."     thread--->".$thread;
?>
