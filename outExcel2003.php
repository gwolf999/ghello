<?php
/**
 * Created by PhpStorm.
 * User: ct
 * Date: 2015/6/15
 * Time: 16:32
 */
//define("TOKEN","DX");
define("TOKEN","SINA");
//载入PHPExcel类
echo '-1'.'<br>';
require 'myphpexcel/PHPExcel.php';
echo '-2'.'<br>';
//创建一个excel对象实例
$objPHPExcel = new PHPExcel();
echo '-3'.'<br>';
//设置文档基本属性
$oper="zjg";
echo '1'.'<br>';
$objProps = $objPHPExcel->getProperties();
//$objProps->setCreator("Lao Mao");
$objProps->setCreator("{$oper}");//文档创建者
$objProps->setLastModifiedBy("{$oper}");//最后一次修改者
$objProps->setTitle("Office XLS Test Document");//文档标题
$objProps->setSubject("Office XLS Test Document, Demo");
$objProps->setDescription("Test document, generated by PHPExcel.");
$objProps->setKeywords("office excel PHPExcel");
$objProps->setCategory("Test");
echo '2'.'<br>';
//设置当前的sheet索引，用于后续的内容操作。
//一般只有在使用多个sheet的时候才需要显示调用。
//缺省情况下，PHPExcel会自动创建第一个sheet被设置SheetIndex=0
$objPHPExcel->setActiveSheetIndex(0);
//设置当前活动sheet的名称
$objActSheet = $objPHPExcel->getActiveSheet();
$objActSheet->setTitle('测试Sheet');
echo '3'.'<br>';
//设置单元格内容www.111cn.net
//这里的数据可以从数据库中读取，然后再做循环处理
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'gwolf');
$objPHPExcel->getActiveSheet()->SetCellValue('A2', 'a2');
$objPHPExcel->getActiveSheet()->SetCellValue('A3', 'a3');
$objPHPExcel->getActiveSheet()->SetCellValue('A4', 'a4');
$objPHPExcel->getActiveSheet()->SetCellValue('A5', 'a5');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'b1');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'b2');
$objPHPExcel->getActiveSheet()->SetCellValue('B3', 'b3');
$objPHPExcel->getActiveSheet()->SetCellValue('B4', 'b4');
$objPHPExcel->getActiveSheet()->SetCellValue('B5', 'b5');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'c1');
$objPHPExcel->getActiveSheet()->SetCellValue('C2', 'c2');
$objPHPExcel->getActiveSheet()->SetCellValue('C3', 'c3');
$objPHPExcel->getActiveSheet()->SetCellValue('C4', 'c4');
$objPHPExcel->getActiveSheet()->SetCellValue('C5', 'c5');
//输出文档
echo '4'.'<br>';
$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
//设置header头部信息，并输出到浏览器
//header('Content-Type: application/vnd.ms-excel');
//header("Content-Disposition:attachment; filename=demo.xls");
//header('Cache-Control: max-age=0');
//$objWriter->save('php://output');
//保存至某一位置
echo '5'.'<br>';
IF(!TOKEN=="SINA") {//sae不允许本地建立目录
    /*上传文件到指定目录
    filename为Excelmysql.php中设定的file类型的name值*/
    if (!is_dir("./download/")) {                //判断指定目录是否存在
        mkdir("./download/");                    //创建目录
        $objWriter->save(dirname(__FILE__) . '/demo2003.xls');
    }else{
        $domain = "gwolf";
        //$download_dir = "saestor://" . $domain . "/qiao1/2/3/4/5/";
          $download_dir = "saestor://" . $domain;
        if(!is_dir($download_dir))
        {
            mkdir($download_dir , 0777);
        }
        /*使用sae tmpFS*/
        $s = new SaeStorage();
       // $s->writer( $domain,'gwolf.xls',$objWriter->save($download_dir.'/demo2003.xls'));
         $objWriter->save( SAE_TMP_PATH .'demo2003.xls');//使用临时路径 就可以了。没使用
        echo SAE_TMP_PATH .'demo2003.xls';
        $s->upload($domain,'gwolf.xls',SAE_TMP_PATH .'demo2003.xls');//写入成功。

    }
}
