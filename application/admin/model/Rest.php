<?php

namespace app\admin\model;

/*
 * Restful模型
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use \app\admin\model\ErrorCode as ErrorCode;
class Rest extends RestBase
{
     protected $connection = [
          // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'test2',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => '',
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
          // 连接dsn
        'dsn'         => 'mysql:host=127.0.0.1;dbname=test2',
     ];
    /*
     * 用户注册
     */
    public function signUp($user_name, $pwd)
    {
        if (!$user_name || !$pwd) {
            return ['type'=>false,'msg'=>ErrorCode::errorCode(1001)];
        }
        $sql = 'INSERT INTO `user`(user_name,pwd,time) VALUES(:user_name,:pwd,:time)';
        $sth = $this->getPdo($this->connection)->prepare($sql);
        $res = $sth->execute([':user_name'=>$user_name,':pwd'=>md5($pwd),':time'=>time()]);
        if ($res){
            return [
                'id'=>$this->getPdo()->lastInsertId(),
                'user_name'=>$user_name
            ];
        }
        return false;
    }

}
