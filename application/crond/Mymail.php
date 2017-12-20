<?php

/* 
 * 计划任务 定时发送邮件
 */

// 引入必须的文件
require_once EXTEND_PATH.'PHPMailer/src/PHPMailer.php';
require_once EXTEND_PATH.'PHPMailer/src/SMTP.php';
require_once EXTEND_PATH.'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

class Mymail {
    
    //接收方邮箱信息
     private $receive_email = [
         ['email'=>'1574732159@qq.com','email_name'=>'陈健'],
         ['email'=>'510495783@qq.com','email_name'=>'袁海波'],
     ];
     
     /*
     * @param string $send 发送方邮箱
     * @paran string $send_name 发送方名字
     * @param string $pwd  发送方邮箱验证密码
     * @param array  $receive 接收方邮箱
     * @param string $reply 回复人邮箱
     * @param string $reply_name 回复人邮箱显示的名字
     * @param string $title 邮件标题
     * @param string $content 邮件内容
     */
    public function sendEmail($send,$send_name,$pwd,$receive,$reply,$reply_name,$title,$content){
        $mail = new PHPMailer();
        try {
            
            //$mail->SMTPDebug = true;         // Enable verbose debug output
            //$mail->addCC('cc@example.com');  // 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址
            //$mail->addBCC('bcc@example.com'); // 设置秘密抄送人
            //$mail->addAttachment('/var/tmp/file.tar.gz');  //添加附件
            
            
            $mail->isSMTP();               // 使用SMTP服务
            $mail->Host = 'smtp.qq.com';  // 发送方的SMTP服务器地址
            $mail->SMTPAuth = true;       // 开启验证
            $mail->CharSet = 'UTF-8';    // 设置编码
            $mail->SMTPSecure = 'ssl';   // 使用ssl协议方式
            $mail->Port=465;             //ssl协议方式端口号
            
            
            
            //设置时区
            date_default_timezone_get("Asia/Shanghai");
            
            // 发送方的邮箱用户名
            $mail->Username = $send;
            
            // smtp的验证密码，在邮箱中开启smtp服务时会得到
            $mail->Password = $pwd;                     
          
            // 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
            $mail->setFrom($send, $send_name);
            
            if ($receive && is_array($receive)){
                foreach($receive as $receive_email){
                    // 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
                    $mail->addAddress($receive_email['email'], $receive_email['email_name']);  
                }
            }
            
            // 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
            $mail->addReplyTo($send, $send_name);
      
            //Content 使用HTML格式发送邮件
            $mail->isHTML(true);   

            // 邮件标题
            $mail->Subject = $title;
            
            // 邮件正文
            $mail->Body    = $content;
            
            // 发送邮件
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
           echo 'Message could not be sent.';
           echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
         
    }
    
    public function doSendMail(){
        $reply = $send = '564272996@qq.com';
        $reply_name = $send_name = 'cjFree';
        $pwd = 'hmszrygdsbwgbeij';
        $receive = $this->receive_email;
        $title = '租庸调-牛头都是国家的';
      
        $content = 
        <<<EOD
                <strong>Hello All！<strong>
                <br/>
                牛头都是国家的，记得关注公共项目情况 ：https://www.zybuluo.com/cjFree/note/805594。
                <br/>
                说明：此邮件会每周一上午会发送到各位的邮箱，给各位老板报告一下情况
EOD;
        $this->sendEmail($send, $send_name, $pwd, $receive, $reply, $reply_name, $title, $content);
    }
    
    
    
}

$obj = new Mymail();
$obj->doSendMail();