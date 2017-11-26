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
                    $this->display("zijin1");exit;
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
                            $this->display("zijin1");exit;
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

            $wher['referrerid'] = $compname['userid'];
            $teyue = M('user')->where($wher)->select();
            //循环查出自己下级的往下N级
            foreach ($teyue as $k=>$v)
            {
                //$teyue[$k]['compname'] = $compname['compname'];
                $w['_string'] = "FIND_IN_SET({$v['userid']},upuserid)";
                $a = M("user")->where($w)->select();
                $teyuecompname = M('user')->where(array("userid"=>$v['userid']))->getField("compname");
                if(!empty($a))
                {

                    foreach ($a as $kk=>$vv)
                    {
                        $a[$kk]['compname'] = $teyuecompname;
                    }
                    $u[$k] = $a;
                }
            }
            //将三维数组转换成二维数组
            foreach ($u as $k=>$v)
            {
                foreach ($v as $kk=>$vv)
                {
                    $uu[] = $vv;
                }
            }
            //将自己下级循环进入数组
            foreach ($teyue as $k=>$v)
            {
                $uu[] = $v;
            }

            $data = $uu;
        }


        $this->assign("form1data",$data);
        $this->display("zijin1");
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
                    $this->display("zijin2");exit;
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
                            $this->display("zijin2");exit;
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
                ->where(array('user.userid'=>$userinfo['userid'],'costrecord.dealtype'=>1))
                ->select();
        }else if($keyword)
        {
//            $where['_string'] = "FIND_IN_SET({$compname['userid']},user.upuserid)";
//            $where['costrecord.dealtype'] = 1;
//            $data = M('user')
//                ->join("costrecord on costrecord.userid=user.userid")
//                ->where($where)
//                ->field("user.usercode,user.compname,costrecord.topuptype,costrecord.money,costrecord.ts")
//                ->select();

            //$where['_string'] = "FIND_IN_SET({$compname['userid']},upuserid)";
            $where['referrerid'] = $compname['userid'];
            $where['costrecord.dealtype'] = 1;
            $teyue = M('user')
                ->join("costrecord on costrecord.userid=user.userid")
                ->where($where)
                ->field("user.userid,user.usercode,user.compname,costrecord.topuptype,costrecord.money,costrecord.ts")
                ->select();
            //循环查出自己下级的往下N级
            foreach ($teyue as $k=>$v)
            {
                //$teyue[$k]['compname'] = $compname['compname'];
                $w['_string'] = "FIND_IN_SET({$v['userid']},upuserid)";
                $a = M("user")->where($w)->select();
                $teyuecompname = M('user')->where(array("userid"=>$v['userid']))->getField("compname");
                if(!empty($a))
                {

                    foreach ($a as $kk=>$vv)
                    {
                        $a[$kk]['compname'] = $teyuecompname;
                    }
                    $u[$k] = $a;
                }
            }
            //将三维数组转换成二维数组
            foreach ($u as $k=>$v)
            {
                foreach ($v as $kk=>$vv)
                {
                    $uu[] = $vv;
                }
            }
            //将自己下级循环进入数组
            foreach ($teyue as $k=>$v)
            {
                $uu[] = $v;
            }

            $data = $uu;
        }

        $this->assign("form2data",$data);
        $this->display("zijin2");
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
                    $this->display("zijin3");exit;
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
                            $this->display("zijin3");exit;
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
                ->where(array('costrecord.userid'=>$userinfo['userid'],'costrecord.dealtype'=>2))
                ->select();
            //$user_compname = M("user")->where(array("userid"=>$userinfo['referrerid']))->getField("compname");
            //$this->assign('com',$user_compname);

        }else if($keyword)
        {
            //$where['_string'] = "FIND_IN_SET({$compname['userid']},user.upuserid)";
//            $where['costrecord.dealtype'] = 2;
//            $where['user.referrerid'] = $compname['userid'];
//            $data = M('user')
//                ->join("costrecord on costrecord.userid=user.userid")
//                ->where($where)
//                ->field("user.usercode,user.compname,costrecord.dealtype,costrecord.status,costrecord.money,costrecord.ts")
//                ->select();

            $where['user.referrerid'] = $compname['userid'];
            $where['costrecord.dealtype'] = 2;
            $teyue = M('user')
                ->join("costrecord on costrecord.userid=user.userid")
                ->where($where)
                ->field("user.userid,user.usercode,user.compname,costrecord.dealtype,costrecord.status,costrecord.account,costrecord.money,costrecord.ts")
                ->select();
            //循环查出自己下级的往下N级
            foreach ($teyue as $k=>$v)
            {
                //$teyue[$k]['compname'] = $compname['compname'];
                $w['_string'] = "FIND_IN_SET({$v['userid']},upuserid)";
                $a = M("user")->where($w)->select();
                $teyuecompname = M('user')->where(array("userid"=>$v['userid']))->getField("compname");
                if(!empty($a))
                {

                    foreach ($a as $kk=>$vv)
                    {
                        $a[$kk]['compname'] = $teyuecompname;
                    }
                    $u[$k] = $a;
                }
            }
            //将三维数组转换成二维数组
            foreach ($u as $k=>$v)
            {
                foreach ($v as $kk=>$vv)
                {
                    $uu[] = $vv;
                }
            }
            //将自己下级循环进入数组
            foreach ($teyue as $k=>$v)
            {
                $uu[] = $v;
            }

            $data = $uu;
        }
        //P($data);

        $this->assign("form3data",$data);
        $this->display("zijin3");
    }

}