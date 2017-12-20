<?php

namespace app\admin\controller;

use app\common\model\Dir as Dir;

/*
 * 文件目录操作控制器
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dirs extends Base
{
    /*
     * 循环读取目录中的所有文件，并按修改时间排序
     */

    public function getFileList()
    {
        $do = $this->getVar('do');
        if ($do) {
            $dir_path = ROOT_PATH . 'application/common';
            $data = (new Dir())->getFileList($dir_path);
            var_dump($data);
        } else {
            echo "请开启执行参数do=1";
        }
    }

}
