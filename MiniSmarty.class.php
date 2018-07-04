<?php

class MiniSmarty
{
    private $tpl_var = array();

    public function assign($name, $value)
    {
        $this->tpl_var[$name] = $value;
    }

    public function display($tpl)
    {
        //global $title;
        ////global $content;

        //1.获取数据(模板内容)
        $text = file_get_contents($tpl);
        //var_dump($content);
        //echo $content; //html代码被解析丢弃
        //2.制定内容替换
        $text = str_replace('{$', "<?php echo \$this->tpl_var['", $text);
        $text = str_replace('}', "'];?>", $text);


        //var_dump($content);
        //echo $content; //php脚本被当成字符串输出，不解析变量
        //3.把替换后的字符串写成文件
        file_put_contents($tpl . ".php", $text);

        //4.引入混编文件
        require_once $tpl . ".php";
    }

}