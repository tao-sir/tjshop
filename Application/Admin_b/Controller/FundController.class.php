<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 17:47
 */
namespace Admin\Controller;
use Admin\Controller\PublicController;
class FundController extends PublicController
{
    public function fundSelect()
    {

        $this->display("zijin");
    }

    public function fundquery()
    {
        $tel = I("post.tel");
        $keyword = I("post.keyword");
        $is_admin = $_SESSION['admin']['usercode'];
        //查询该用户是否存在
        if ($tel) {
            $this->assign('form1tel', $tel);
            $userinfo = M("user")->where(array('usercode' => $tel))->find();
            //判断是否是用户下级，不是则停止继续执行
            if (preg_match("/^1[34578]{1}\d{9}$/", $is_admin)) {
                $where['userid'] = $userinfo['userid'];
                $where["_string"] = "FIND_IN_SET({$_SESSION['admin']['userid']},upuserid)";
                $is_member = M('user')->where($where)->find();
                if (empty($is_member)) {
                    exit('不是自己下级');
                }
            }

            if (empty($userinfo)) {
                exit('用户不存在');
            }
        } else {
            //查询所属机构是否存在
            if ($keyword) {
                $this->assign('form1keyword', $keyword);
                $compname = M("user")->where(array('compname' => $keyword))->find();
                //判断是否是用户下级，不是则停止继续执行
                if (preg_match("/^1[34578]{1}\d{9}$/", $is_admin)) {
                    if($compname['userid'] != $_SESSION['admin']['userid']) {

                        $where['userid'] = $compname['userid'];
                        $where["_string"] = "FIND_IN_SET({$_SESSION['admin']['userid']},upuserid)";
                        //$where["_string"] = "FIND_IN_SET({$compname['userid']},upuserid)";
                        $is_member = M('user')->where($where)->find();

                        if (empty($is_member)) {
                            exit('不是自己下级');
                        }
                    }
                }
                if (empty($compname)) {
                    exit('所属机构不存在');
                }
            }
        }
        if($tel)
        {
            $data = M('user')->where(array('userid'=>$userinfo['userid']))->select();
        }else if($keyword)
        {
            $where['_string'] = "FIND_IN_SET({$compname['userid']},upuserid)";
            $data = M('user')->where($where)->select();
        }

        $this->assign("form1data",$data);
        $this->display("zijin");
    }

    public function enterFund()
    {
        $tel = I("post.tel");
        $keyword = I("post.keyword");
        $is_admin = $_SESSION['admin']['usercode'];
        //查询该用户是否存在
        if ($tel) {
            $this->assign('form2tel', $tel);
            $userinfo = M("user")->where(array('usercode' => $tel))->find();
            //判断是否是用户下级，不是则停止继续执行
            if (preg_match("/^1[34578]{1}\d{9}$/", $is_admin)) {
                $where['userid'] = $userinfo['userid'];
                $where["_string"] = "FIND_IN_SET({$_SESSION['admin']['userid']},upuserid)";
                $is_member = M('user')->where($where)->find();
                if (empty($is_member)) {
                    exit('不是自己下级');
                }
            }

            if (empty($userinfo)) {
                exit('用户不存在');
            }
        } else {
            //查询所属机构是否存在
            if ($keyword) {

                $this->assign('form2keyword', $keyword);
                $compname = M("user")->where(array('compname' => $keyword))->find();
                //判断是否是用户下级，不是则停止继续执行
                if (preg_match("/^1[34578]{1}\d{9}$/", $is_admin)) {
                    if($compname['userid'] != $_SESSION['admin']['userid']) {

                        $where['userid'] = $compname['userid'];
                        $where["_string"] = "FIND_IN_SET({$_SESSION['admin']['userid']},upuserid)";
                        //$where["_string"] = "FIND_IN_SET({$compname['userid']},upuserid)";
                        $is_member = M('user')->where($where)->find();

                        if (empty($is_member)) {
                            exit('不是自己下级');
                        }
                    }
                }
                if (empty($compname)) {
                    exit('所属机构不存在');
                }
            }
        }

        if($tel)
        {
            $data = M('user')
                ->join("costrecord on costrecord.userid=user.userid")
                ->where(array('user.userid'=>$userinfo['userid']))
                ->select();
        }else if($keyword)
        {
            $where['_string'] = "FIND_IN_SET({$compname['userid']},user.upuserid)";
            //$where['costrecord.dealtype'] = 1;
            $data = M('user')
                ->join("costrecord on costrecord.userid=user.userid")
                ->where($where)
                ->field("user.usercode,user.compname,costrecord.dealtype,costrecord.money,costrecord.ts")
                ->select();
        }

        $this->assign("form2data",$data);
        $this->display("zijin");
    }

    public function fundSel()
    {
        $tel = I("post.tel");
        $keyword = I("post.keyword");
        $is_admin = $_SESSION['admin']['usercode'];
        //查询该用户是否存在
        if ($tel) {
            $this->assign('form3tel', $tel);
            $userinfo = M("user")->where(array('usercode' => $tel))->find();
            //判断是否是用户下级，不是则停止继续执行
            if (preg_match("/^1[34578]{1}\d{9}$/", $is_admin)) {
                $where['userid'] = $userinfo['userid'];
                $where["_string"] = "FIND_IN_SET({$_SESSION['admin']['userid']},upuserid)";
                $is_member = M('user')->where($where)->find();
                if (empty($is_member)) {
                    exit('不是自己下级');
                }
            }

            if (empty($userinfo)) {
                exit('用户不存在');
            }
        } else {
            //查询所属机构是否存在
            if ($keyword) {

                $this->assign('form3keyword', $keyword);
                $compname = M("user")->where(array('compname' => $keyword))->find();
                //判断是否是用户下级，不是则停止继续执行
                if (preg_match("/^1[34578]{1}\d{9}$/", $is_admin)) {
                    if($compname['userid'] != $_SESSION['admin']['userid']) {

                        $where['userid'] = $compname['userid'];
                        $where["_string"] = "FIND_IN_SET({$_SESSION['admin']['userid']},upuserid)";
                        //$where["_string"] = "FIND_IN_SET({$compname['userid']},upuserid)";
                        $is_member = M('user')->where($where)->find();

                        if (empty($is_member)) {
                            exit('不是自己下级');
                        }
                    }
                }
                if (empty($compname)) {
                    exit('所属机构不存在');
                }
            }
        }
    }

}