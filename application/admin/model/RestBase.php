<?php
namespace app\admin\model;
/* 
 * restful 基类
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use app\admin\model\ErrorCode as ErrorCode;
class RestBase extends Base{
   //合法的请求资源
   protected $allow_source_name = ['restful'];
   //合法的请求方法
   protected $allow_request_method = ['GET','POST','PUT','DELETE'];
   
   /*
    * 检测资源 是否在可请求的资源之列
    */
   public function checkSourceStup(){
       $request = \think\Request::instance();
       //当前的控制器（也就是资源名）
      $source_name = strtolower($request->controller());
       if (!in_array($source_name,$this->allow_source_name)){
           return ['type'=>'error','msg'=>ErrorCode::errorCode(2001)];
       }
       return ['type'=>'success'];
   }
   
   /*
    * 检测请求方法类型
    */
   public function checkMethodStup(){
       $request = \think\Request::instance();
       $request_method = $request->method();
       if (!in_array($request_method,$this->allow_request_method)){
           return ['type'=>'error','msg'=>ErrorCode::errorCode(2002)];
       }
                
       return ['type'=>'success'];
   }
   
   /*
    * restful检测
    */
   public function checkRestful(){
       $check_source = $this->checkSourceStup();
       $check_method = $this->checkMethodStup();
       $request = \think\Request::instance()->header();
       $this->setHttpHeader($request['content-type'], 403, ErrorCode::httpStatus(403));
       if ($check_source['type'] == 'error'){
           echo json_encode($check_source);
           exit;
       }
       if ($check_method['type'] == 'error'){     
           echo json_encode($check_method);
           exit;
       }
   }
   
   /*
    * 设置http头想信息
    * @param string $content_type
    * @param int $status_code
    * 
    * @return 
    */
   public function setHttpHeader($content_type, $status_code,$status_message){
        header("HTTP/1.1 {$status_code} {$status_message}");
        header("Content-Type:". $content_type);
   }
   
}
