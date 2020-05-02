<?php

namespace app\index\controller;

use \think\Db;

class Checkresults extends BaseController
{

    /**
     * 查看查寝记录
     */
    public function checkRecords()
    {   
        // 校验参数是否存在
        $parameter = array();
        $parameter = ['department', 'grade'];
        $result = $this->checkForExistence($parameter);
        if ($result) {
            return $result;
        }

        // 查询条件
        $where = array();
        $where['s.grade'] = $_POST['grade'];
        $where['s.department'] = $_POST['department'];
        $record = Db::table('record')
            ->field('start_time')   // 指定字段
            ->alias('r')    // 别名
            ->join('dorm d', 'd.id = r.dorm_id')
            ->join('student s', 's.id = d.student_id')
            ->distinct(true)   // 返回唯一不同的值
            ->where($where)
            ->where('r.deleted', 0)
            ->where('r.confirmed', 1)
            ->select();
        
        if ($record) {
            $return_data = array();
            $return_data['error_code'] = 0;
            $return_data['msg'] = '显示查寝记录';
            $return_data['data'] = $record;

            return json($return_data);
        } else {
            $return_data = array();
            $return_data['error_code'] = 2;
            $return_data['msg'] = '暂无查寝记录';

            return json($return_data);
        }
    }






}