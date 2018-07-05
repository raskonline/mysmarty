<?php

class MiniSmarty
{
    private $tpl_var = array();

    //优化2：混编文件和模板文件分开存放
    public $template = "template/";//模板文件
    public $template_c = "template_c/";//混编文件

    public function assign($name, $value)
    {
        $this->tpl_var[$name] = $value;
    }

    public function display($tpl)
    {
        //混编文件路径名称
        $c_file = $this->template_c.$tpl . ".php";
        //当前模板文件路径名称
        $tpl=$this->template.$tpl;

        //判断是否创建混编目录
        if(!file_exists($this->template_c)){
            mkdir($this->template_c);
        }

        //优化1：混编文件的创建时间：
        //文件已经存在，不创建；文件编辑时间和创建时间不一致，说明模板已经发生修改，需要重新创建混编文件
        if (!file_exists($c_file) || filectime($c_file) < filemtime($c_file)) {
            //1.获取数据(模板内容)
            $text = file_get_contents($tpl);
            //2.制定内容替换
            $text = str_replace('{$', "<?php echo \$this->tpl_var['", $text);
            $text = str_replace('}', "'];?>", $text);
            //3.把替换后的字符串写成文件
            file_put_contents($c_file, $text);
        }
        //4.引入混编文件
        require_once $c_file;
    }

}