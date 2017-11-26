<?php

function P($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function qrcode($url='http://www.tjnl.com/',$level=3,$size=4,$filepath = false)
{
    Vendor('phpqrcode.phpqrcode');
    $errorCorrectionLevel = intval($level);//容错级别
    $matrixPointSize = intval($size);//生成图片大小
//生成二维码图片
    //echo $_SERVER['REQUEST_URI'];
    $object = new \QRcode();
    $object->png($url, $filepath, $errorCorrectionLevel, $matrixPointSize, 2);
}

/**
 *日志记录，按照"Ymd.log"生成当天日志文件
 * 日志路径为：入口文件所在目录/logs/$type/当天日期.log.php，例如 /logs/error/20120105.log.php
 * @param string $type 日志类型，对应logs目录下的子文件夹名
 * @param string $content 日志内容
 * @return bool true/false 写入成功则返回true
 */
function writelog($type="",$step=0,$content=""){
    header("Content-type:text/html;charset=utf-8");
    if(!$content || !$type){
        return FALSE;
    }
    $dir=getcwd().DIRECTORY_SEPARATOR.'Logs'.DIRECTORY_SEPARATOR.$type;
    if(!is_dir($dir)){
        if(!mkdir($dir)){
            return false;
        }
    }
    $filename=$dir.DIRECTORY_SEPARATOR.date("Ymd",time()).'.log.php';
    $logs=include $filename;
    if($logs && !is_array($logs)){
        unlink($filename);
        return false;
    }
    //$content = is_array($content)?http_build_query($content): $content;

    $logs[]=array("step"=>$step,"time"=>date("Y-m-d H:i:s"),"content"=>$content);
    $str="<?php \r\n return ".var_export($logs, true).";";
    if(!$fp=@fopen($filename,"wb")){
        return false;
    }
    if(!fwrite($fp, $str))return false;
    fclose($fp);
    return true;
}


