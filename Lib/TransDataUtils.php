<?php
//报文体转化工具类，仅供参考，目前统一使用json
namespace iqg\BaofooPayBundle\Lib;

 class TransDataUtils{


	public static function __array2Xml($trans_content)
	{
		$doc = new DOMDocument('1.0','UTF-8');
		$doc->formatOutput = true;
		$root = $doc->createElement('trans_content');
		$root = $doc->appendChild($root);
		foreach($trans_content as $content_child=>$content_child_value){
		   //trans_content子节点
		   $content_child = $doc->createElement($content_child);
		   $content_child = $root->appendChild($content_child); 
			if(is_array($content_child_value)){
				//创建trans_content子节点
			   foreach($content_child_value as $child_key=>$child_value){
				   //trans_reqDatas 
				   if(is_array($child_value)){
						foreach($child_value as $trans_reqDatas=>$trans_reqData){
						   //创建trans_reqDatas子节点trans_reqData
						   $trans_reqDatas = $doc->createElement($trans_reqDatas);
						   $trans_reqDatas = $content_child->appendChild($trans_reqDatas); 
						   //遍历trans_reqData子节点并创建属性和值 
						   foreach($trans_reqData as $reqData_key=>$reqData_value){
							   $reqData_key = $doc->createElement($reqData_key);
							   $reqData_key = $trans_reqDatas->appendChild($reqData_key);
							   $text = $doc->createTextNode($reqData_value);
							   $text = $reqData_key->appendChild($text);
						   } 
						} 
				   }else{
					   $child_key = $doc->createElement($child_key);
					   $child_key = $content_child->appendChild($child_key);
					   $text = $doc->createTextNode($child_value);
					   $text = $child_key->appendChild($text);
				   }
			   } 
		   }else{
			   $text = $doc->createTextNode($content_child_value);
			   $text = $title->appendChild($text);
		   }
		}
		return $doc->saveXML();
	}

	//
	function __array2Json($array)
	{
		return json_encode($array,JSON_UNESCAPED_UNICODE);
	}


 }
