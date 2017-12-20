<?php

namespace app\admin\controller;
use think\Controller;
use app\admin\model\FunctionList as FunctionList;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Index extends Base{
    
    /*
     * 首页 功能列表页
     */
    public function index(){
        
      
        $data = (new FunctionList())->getList(1,10);
        if ($data){
            foreach($data as $key=>&$value){
                $value['function_url'] = DOMAIN_NAME.'/'.$value['function_url'];
                $function_type = FunctionList::$function_type[$value['function_type']];
                $value['function_type'] = isset($function_type) ? $function_type : "";
            }
        }
        $this->assign('data',$data);
        $this->assign('function_type',FunctionList::$function_type);
        return $this->fetch('index');
    }
    
    /*
     * 首页 添加功能
     */
    public function addFunction(){
        $this->assign('function_type',FunctionList::$function_type);
        return $this->fetch('add');
    }
    
     /*
     * 首页 执行添加功能
     */
    public function doAdd(){
        $name = $this->getVar('name');
        $desc = $this->getVar('desc');
        $url = $this->getVar('url');
        $type = $this->getVar('type');
        if (!$name || !$desc || !$url || !$type){
            echo json_encode(['type'=>'error','msg'=>'参数错误']);
            exit;
        }
        //获取模块/控制器/方法
        $need_url = stristr($url,'admin');
        if (!$need_url){
            echo json_encode(['type'=>'error','msg'=>'url地址有误']);
        }
        $res = (new FunctionList())->addFunction($name, $desc,$need_url, $type);
        if ($res){
            echo json_encode(['type'=>'success','msg'=>'增加成功']);
             exit;
        }
        echo json_encode(['type'=>'error','msg'=>'增加失败']);
    }
}
