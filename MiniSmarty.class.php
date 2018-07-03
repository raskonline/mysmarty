<?php

class MiniSmarty
{
    public function display($tpl)
    {
        //1.获取数据(模板内容)
        $content=file_get_contents($tpl);
        //var_dump($content);
        //echo $content; //html代码被解析丢弃
        //2.制定内容替换
        str_replace("{","<?php echo",$content);
        str_replace("?","?>",$content);

        var_dump($content);
    }

}