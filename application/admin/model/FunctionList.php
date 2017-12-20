<?php
namespace app\admin\model;
use think\Db as Db;
/* 
 * 功能模型类
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class FunctionList extends Base{
    
    public static $function_type = [
        1 => 'PHP',
        2 => 'MySQL',
        3 => 'Linux',
        4 => 'weixin',
        5 => '三方登录'
    ];






    /*
     * 功能列表
     * 
     * @param int $page 当前页码数
     * @param int $limit 条数
     * 
     * @return array
     */
   public function getList($page,$limit){
       $page = max(intval($page),1);
       $limit = min(intval($limit),50);
       $page_size = ($page-1)*$limit;
       $sql = "SELECT `function_name`,`function_url`,`function_type`,`function_desc` FROM `function_list` LIMIT {$page_size},{$limit}";
       return Db::query($sql);
   }
   
   /*
    *  添加功能
    * @param string $name 功能名称
    * @param string $desc 功能描述
    * @param string $url  访问地址
    * @param string $type  功能类别
    * 
    * @return array
    */
   public function addFunction($name,$desc,$url,$type){
       if (!$name || !$desc || !$type){
           return ['type'=>'error','message'=>'参数错误'];
       } 
       $sql = 'INSERT INTO `function_list` (function_name,function_desc,function_url,function_type) VALUES(:name,:desc,:url,:type)';
       $ment_pdo = $this->getPdo()->prepare($sql);
       return $ment_pdo->execute([':name'=>$name,':desc'=>$desc,':url'=>$url,':type'=>$type]);
        
   }
}
