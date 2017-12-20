<?php

namespace app\admin\controller;

/*
 * Restful 控制器
 * 2017.12.5
 * and open the template in the editor.
 */

class Restful extends \think\Controller
{
    /*
     * 用户注册
     */

    public function signUp()
    {
        $rest_model = new \app\admin\model\Rest();
        $res = $rest_model->checkRestful();
    }

}
