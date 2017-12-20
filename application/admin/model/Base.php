<?php
namespace app\admin\model;
/* 
 * 数据模型基类
 */
class Base extends \think\Model {
    
     protected $conn = null;


     /*
     * 获取pdo实例
     * @param array $db_config 数据库配置信息
     */
    public function getPdo($db_config = []){
        if (!$this->conn){
            $db_info = $db_config ? $db_config : config('database');
            if ($db_info){
                 $this->conn = new \PDO($db_info['dsn'],$db_info['username'],$db_info['password']);
            }
        }
        return $this->conn;                
    }
        
}

