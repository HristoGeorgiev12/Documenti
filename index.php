<?php
session_start();
ob_start();

require_once('classes/autoloader.class.php');

try{
    $loadClass = "TPLindex";
    if(isset($_GET['page']) && !empty($_GET['page'])) {
        $loadClass = "TPL{$_GET['page']}";
    }

    if(!class_exists($loadClass)){
        $loadClass = 'TPLerror';
    }

    $template = new $loadClass();
    $template->setParams(array_merge($_GET,$_POST));
    $template->HTML();

}
catch(Exception $e){
    var_dump($e);
//    ob_clean();
//    echo 'error';
}

$content = ob_get_contents();
ob_end_clean();

echo $content;