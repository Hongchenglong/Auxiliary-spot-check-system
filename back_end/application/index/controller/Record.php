<?php

namespace app\index\controller;

use think\Db;
use think\Validate;
use \think\Request;

class Record extends BaseController
{
    /**
     * 提交照片
     */
    public function uploadPhoto()
    {
        $parameter = array();
        $parameter = ['id', 'file'];
        foreach ($parameter as $key => $value) {
            if (!empty($_POST[$value]) || !empty($_FILES[$value])) {
                
            } else {
                $return_data = array();
                $return_data['error_code'] = 1;
                $return_data['msg'] = '参数不足: ' . $value;
                return json($return_data);
            }
        }
        $type = array("gif", "jpeg", "jpg", "png", "bmp");  // 允许上传的图片后缀
        $temp = explode(".", $_FILES['file']['name']);  // 拆分获取图片名
        $extension = $temp[count($temp) - 1];     // 获取文件后缀名

        if (in_array($extension, $type) && $_FILES["file"]["size"] < 5242880) {

            if ($_FILES["file"]["error"] > 0) {

                $return_data = array();
                $return_data['error_code'] = 3;
                $return_data['msg'] = '文件上传错误！';
                return json($return_data);

            } else {

                //随机取文件名
                $day = date('Y-m-d');
                $new_file_name = $day.'_'. $_POST['id'];
                $new_name = $new_file_name . '.' . $extension; //新文件名
                $path = 'upload/' . $new_name;        //upload为保存图片目录
                if (file_exists("upload/" . $path)) {   //判断是否存在该文件

                    $return_data = array();
                    $return_data['error_code'] = 4;
                    $return_data['msg'] = '文件已存在！';
                    return json($return_data);

                } else {

                    // 如果不存在该文件则将文件上传到 upload 目录下（将临时文件移动到 upload 下以新文件名命名）
                    //move_uploaded_file($_FILES['file']['tmp_name'], "upload/" .$day.'/'. $new_name); 

                    //本地测试
                    // $file = request()->file('file'); 
                    // $info = $file->move('/home/www/upload/'.$day.'/', $new_name);
                    // print_r($info);

                    // 上传到数据库
                    $uploadTime = date('Y-m-d H:i:s', time());
                    
                    $data = array('photo' => "upload/" .$day.'/'. $new_name, 'uploadTime' => $uploadTime);
                    $result = Db('record')->where(['id' => $_POST['id']])->setField($data);

                    $return_data = array();
                    $return_data['error_code'] = 0;
                    $return_data['msg'] = '文件上传成功！';
                    $return_data['data']['id'] = $_POST['id'];
                    $return_data['data']['photo'] = 'upload/' . $day . '/'. $new_name;
                    $return_data['data']['uploadTime'] = $uploadTime;
                    return json($return_data);
                }
            }
        } else {
            $return_data = array();
            $return_data['error_code'] = 2;
            $return_data['msg'] = '文件格式错误！';
            return json($return_data);
        }
    }
}