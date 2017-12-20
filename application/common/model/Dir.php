<?php
namespace app\common\model;
/* 
 * 目录文件操作类
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Dir {
    /*
     * 遍历目录下所有的文件,按修改时间降序排列
     * 
     * array_multisort函数用法资料https://www.cnblogs.com/WuNaiHuaLuo/p/5794669.html
     * array_multisort()这个函数可以对多个PHP数组进行排序，排序结果是所有的数组都按第一个数组的顺序进行排列
     * 
     * @param string $dir_path 目录路径
     */
    public function getFileList($dir_path){
        if (is_dir($dir_path)){
            $file_array = [];
            $mtime = [];
            $file_array2 = [];
            $i = 0;
            //目录资源句柄
            $hd = opendir($dir_path);
            //循环读取目录中的内容
            while (($file = readdir($hd)) !== false){
                if (!in_array($file,['.','..'])){
                    if (is_file($dir_path.'/'.$file)){
                        $file_array[$i]['name'] = $file;
                        $file_array[$i]['time'] = date('Y-m-d H:i:s',filemtime($dir_path.'/'.$file));
                        $mtime[] = filemtime($dir_path.'/'.$file);
                        $i ++;
                    }else{
                        $file_array2[] = $this->getFileList($dir_path.'/'.$file);
                    }
                }
            }
            array_multisort($mtime,SORT_DESC,SORT_NUMERIC,$file_array);
             closedir($hd);
            return array_merge($file_array,$file_array2);
        }
        return false;
    }
}

