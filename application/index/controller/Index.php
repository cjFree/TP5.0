<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        $model = new \app\admin\model\Email();
        
        $reply = $send = '564272996@qq.com';
        $reply_name = $send_name = 'cjFree';
        $pwd = 'hmszrygdsbwgbeij';
        $receive = [['email'=>'1574732159@qq.com','email_name'=>'']];
        $title = '测试';
        $url = 'https://www.zybuluo.com/cjFree/note/805594';
        

        $content = 
        <<<EOD
                <strong>Hello All！<strong>
                <br/>
                牛头都是国家的，记得关注公共项目情况 ：https://www.zybuluo.com/cjFree/note/805594。
                <br/>
                说明：此邮件会每周一上午会发送到各位的邮箱，给各位老板报告一下情况
EOD;
        $return = $model->sendEmail($send, $send_name, $pwd, $receive, $reply, $reply_name, $title, $content);
        var_dump($return);

    }
}
