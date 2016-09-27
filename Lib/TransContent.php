<?php
/**
 * Created by PhpStorm.
 * User: wpp
 * Date: 16-9-27
 * Time: 下午2:42
 */
namespace dwddevops\BaofooPayBundle\Lib;

class TransContent{

    private $trans_content = array();

    // 保存属性名称和值
    function __set($name, $value)
    {
        $this -> trans_content[$name] = $value;
    }
    // 取得属性名称对应的值
    function __get($name)
    {
        echo "GET:[".$name."]=".$this -> trans_content[$name]."<br>";
        return array_key_exists($name, $this->trans_content) ? $this -> trans_content[$name] : null;
    }

    function __getArray2Json()
    {
        return json_encode($this->trans_content,JSON_UNESCAPED_UNICODE);
    }

    function __getTransContent()
    {
        return $this->trans_content;
    }
}