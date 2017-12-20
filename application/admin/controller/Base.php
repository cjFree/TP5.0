<?php
namespace app\admin\controller;
use think\Controller;
/* 
 * 控制器基类
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Base extends Controller{
    
    //请求类型
    protected static $allow_request_method = ['POST','GET'];
    
    /*
     * 获取表单值
     * @param string $param 要接收的参数名
     * @param string $default_val 默认值
     * 
     */
    public function getVar($param,$default_val = ""){
        //获取请求类型
        $request = \think\Request::instance();
        $request_method = strtoupper($request->method());
        if (in_array($request_method,self::$allow_request_method)){
            if ($request_method == 'POST'){
                return isset($_POST[$param]) ? $_POST[$param] : $default_val;
            }
            if ($request_method == 'GET'){
                return isset($_GET[$param]) ? $_GET[$param] : $default_val;
            }
        }
        return $default_val;
    }
}