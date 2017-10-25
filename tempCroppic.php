<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$tempImage=isset($_POST['image'])?$_POST['image']:'';
if($tempImage!=''){
    if(!is_dir('tmp')){
        mkdir('tmp',0777);
    }
    $imageName=strtotime(date('y-m-d h:i:s')).'image'; 
    $source = fopen($tempImage, 'r');
    $rootPath='tmp/'.$imageName.'.png';
    $outRootPath='../tmp/'.$imageName.'.png';
    $destination = fopen($rootPath, 'w');
    stream_copy_to_stream($source, $destination);
    fclose($source);
    fclose($destination);
   echo $outRootPath;
}