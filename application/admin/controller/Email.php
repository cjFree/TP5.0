<?php
namespace app\admin\controller;
/* 
 * 邮件控制器
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Email extends Base{
    /*
     * 发送邮件
     * 
     */
    public function sendEmail(){
        $do = $this->getVar('do');
        if ($do){
            $reply = $send = 'cjfree2017@163.com';
            $reply_name = $send_name = 'cjFree';
            $pwd = '123456wo';
            $receive =  [
             ['email'=>'1574732159@qq.com','email_name'=>'陈健'],
            ];
            $title = '租庸调-牛头都是国家的';
            $content = '租庸调-牛头都是国家的';
             $res = (new \app\admin\model\Email())->sendEmail($send, $send_name, $pwd, $receive, $reply, $reply_name, $title, $content);
             var_dump($res);exit;
        }else{
            echo "请开启执行参数do=1";
        }
    }
}
