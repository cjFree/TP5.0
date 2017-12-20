<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Image as Image;

/*
 * 图片操作控制器
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Images extends Controller
{
    /*
     * 从给定的网址中读取网页图片，并存储在本地
     */

    public function getPicFromUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "";
        $do = isset($_GET['do']) ? strtolower($_GET['do']) : "";
        if (in_array($do, ['yes', 1])) {
            if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
                exit("<script>alert('URL地址有误')</script>");
            }
            $result = (new Image())->getPicFromUrl($url);
            echo "一共{$result['total']}张图片，成功保存{$result['success']}张";
        }else{
            echo "请开启执行参数do=1";
        }
    }

}
