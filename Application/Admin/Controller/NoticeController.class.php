<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 15:46
 */
namespace Admin\Controller;
use Admin\Controller\PublicController;
class NoticeController extends PublicController
{
    public function noticeList()
    {

        $data = M("notice")->order('ts desc')->select();
        $this->assign('data',$data);

        $this->display('newList');
    }

    public function noticeDel()
    {
        $id = I("post.id");
        $result = M('notice')->where(array('id'=>$id))->delete();
        if($result)
        {
            $array['result'] = 1;
            $array['msg'] = '删除成功';
            echo json_encode($array);
        }else{
            $array['result'] = 0;
            $array['msg'] = '删除失败';
            echo json_encode($array);
        }
    }
    public function notice()
    {
        $this->display();
    }
    public function addNotice()
    {
        if($_POST['title'] != null && $_POST['content'] != null)
        {
            $result = M('notice')->data($_POST)->add();
        }

        if($result)
        {
            $this->redirect('Notice/noticeList');
        }else{
            $this->redirect('Notice/noticeList');
            //$this->redirect('Notice/notice',array('title'=>$_POST['title'],'content'=>$_POST['content']),'1','添加失败');
        }

    }
}