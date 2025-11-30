<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once 'config.php';

$type='0';
if (isset($_GET['gold']) && is_numeric($_GET['gold'])){
if (isset($cena_gold[$_GET['gold']])){
$summa=$cena_gold[$_GET['gold']];
}
}
if (isset($summa)){
include '../system/config.php';
include '../system/function.php';
$data=file_get_contents('http://worldkassa.ru/user/oplata.php?id_shop='.$id_shop.'&summa='.$summa.'&hash='.$hash);
if (is_numeric($data)){
mysql_query("INSERT INTO `worldkassa` (`id_user`, `id_bill`, `time`, `summa`, `referals`) values
                                     ('".$user['id']."', '".$data."', '".time()."', '".$summa."', '".$user['referals']."')");
header("Location: http://worldkassa.ru/user/oplata.php?uniq=".$data."&sposob=robokassa");
exit();
}else{
echo $data; //вывод ошибок WorldKassa, если есть
}
}
?>
