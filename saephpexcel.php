<?php
/**
 * Created by PhpStorm.
 * User: ct
 * Date: 2015/6/15
 * Time: 19:19
 */
file_put_contents( SAE_TMP_PATH . '/mycode.txt' , 'gwolf dummy test' );
echo file_get_contents( SAE_TMP_PATH . '/mycode.txt' ); // will echo dummy test;
$s = new SaeStorage();
$domain = "gwolf";
echo '<br>';
echo SAE_TMP_PATH .'mycode.txt';
echo '<br>';
echo 'domain='.$domain;
//$s->upload($domain,'gwolf.txt',SAE_TMP_PATH . '/mycode.txt');//写入成功。
$s->upload($domain,'gwolf1.txt',SAE_TMP_PATH . 'mycode.txt');//写入成功。