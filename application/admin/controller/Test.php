<?php
namespace app\admin\controller;
use app\admin\model\Email as Email;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Test {
     public function wokao(){
        
         
        $reply = $send = 'cjfree2017@163.com';
        $reply_name = $send_name = 'cjFree';
        $pwd = '123456wo';
        $receive =  [
         ['email'=>'1574732159@qq.com','email_name'=>'陈健'],
        ];
        $title = '租庸调-牛头都是国家的';
        $content = '租庸调-牛头都是国家的';

         $res = (new Email())->sendEmail($send, $send_name, $pwd, $receive, $reply, $reply_name, $title, $content);
         var_dump($res);exit;
         
     }
}
