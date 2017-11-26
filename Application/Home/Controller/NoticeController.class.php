<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 14:26
 */
namespace Home\Controller;
use Home\Controller\PublicController;
class NoticeController extends PublicController
{
    public function noticeList()
    {
        $data = M("notice")->order('ts desc')->select();
        foreach ($data as $k=>$v)
        {
            $date = explode(" ",$v['ts']);
            $data[$k]['ts'] = $date[0];
        }

        $this->assign('data',$data);
        $this->display('notice');
    }
}