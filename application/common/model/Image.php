<?php
namespace app\common\model;
/* 
 * 图片处理
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Image {
    
    /*
     * 从网页获取并下载图片
     */
    public function getPicFromUrl($url){
        //获取网页的全部内容
        $content = file_get_contents($url);
     
        //正则匹配图片地址
        preg_match_all('/<img.*?src="([^"]*)"[^>]*>/i', $content, $matches);

        $num = 0;
        $total = 0;
        $fail_pic = [];
        if (!empty($matches[1])){
            //获取图片内容，写入本地文件
            foreach ($matches[1] as $pic_url){
                //检查图片url的合法性
                if (!filter_var($pic_url,FILTER_VALIDATE_URL)){
                    continue;
                }
                //获取图片的扩展名
                $img_info = pathinfo($pic_url);
                //初始化连接句柄
                $ch = curl_init();
                //设置选项
                curl_setopt($ch, CURLOPT_URL, $pic_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                //执行操作 得到图片二进制流内容
                $img_content = curl_exec($ch);
                curl_close($ch);
                $dir = ROOT_PATH.'/public/curl_image/';
                if (!file_exists($dir)){
                    mkdir($dir,0777);
                }
                //新的图片名称,注意这里前面要加上文件夹的路径
                $file_name = $dir.md5(uniqid(time())).'.'.$img_info['extension'];
                $hd = fopen($file_name, 'w+');
                if (fwrite($hd, $img_content)){
                    $num++;
                }else{
                    $fail_pic[] = $pic_url;
                }
                fclose($hd);
                //循坏的总次数
                $total++;
            }
        }
       return ['success'=>$num,'total'=>$total,'fail_pic'=>$fail_pic];
    }
}

