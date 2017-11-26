<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Controller\PublicController;
class IndexController extends PublicController
{
    /**
     * 认购总汇
     */
    public function subscriptionAll()
    {
        $tel = I("post.tel");
        $keyword = I("post.keyword");
        $starttime = I("post.starttime");
        $endtime = I('post.endtime');
        //echo "今天24点==".date("Y-m-d",strtotime("$endtime +1 dya"));
        $is_admin = $_SESSION['admin']['usercode'];
        if(IS_POST)
        {
            //查询该用户是否存在
            if ($tel) {
                $this->assign('tel', $tel);
                $userinfo = M("user")->where(array('usercode' => $tel))->find();
                //判断是否是用户下级，不是则停止继续执行
                if (preg_match("/^1[34578]{1}\d{9}$/", $is_admin)) {
                    //$where["_string"] = "FIND_IN_SET({$userinfo['userid']},upuserid)";
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
                    $this->assign('keyword', $keyword);
                    $compname = M("user")->where(array('compname' => $keyword))->find();
                    //判断是否是用户下级，不是则停止继续执行
                    if (preg_match("/^1[34578]{1}\d{9}$/", $is_admin)) {
                        $where["_string"] = "FIND_IN_SET({$compname['userid']},upuserid)";
                        $is_member = M('user')->where($where)->find();
                        if (empty($is_member)) {
                            exit('不是自己下级');
                        }
                    }
                    if (empty($compname)) {
                        exit('所属机构不存在');
                    }
                }
            }

            if($tel != null || $keyword != null || $starttime != null || $endtime != null) {

                if ($tel) {
                    if ($starttime != null || $endtime != null) {
                        $wOne["userstock.userid"] = $userinfo['userid'];
                        //elt 小于等于 egt 大于等于
                        if ($starttime != null && $endtime != null) {
                            $wOne['userstock.ts'] = array(array('elt', date("Y-m-d", strtotime("$endtime +1 dya"))), array('egt', $starttime));
                        } elseif ($starttime != null) {
                            $wOne['userstock.ts'] = array('egt', $starttime);
                        } elseif ($endtime != null) {
                            $wOne['userstock.ts'] = array('elt', date("Y-m-d", strtotime("$endtime +1 dya")));
                        }

                        $data = M('userstock')
                            ->join("user on user.userid=userstock.userid")
                            ->join("ttproduct on ttproduct.id=userstock.productid")
                            ->where($wOne)
                            ->field("user.usercode,user.compname,ttproduct.productname,ttproduct.openprice,userstock.num,userstock.summny,userstock.ts")
                            ->select();
                        $this->assign("starttime", $starttime);
                        $this->assign("endtime", $endtime);
                    } else {
                        $data = M('userstock')
                            ->join("user on user.userid=userstock.userid")
                            ->join("ttproduct on ttproduct.id=userstock.productid")
                            ->where(array('userstock.userid' => $userinfo['userid']))
                            ->field("user.usercode,user.compname,ttproduct.productname,ttproduct.openprice,userstock.num,userstock.summny,userstock.ts")
                            ->select();
                    }
                } else if($keyword != null && $tel == null) {
                    $wTwo['_string'] = "FIND_IN_SET({$compname['userid']},user.upuserid)";
                    if ($starttime != null || $endtime != null) {
                        //elt 小于等于 egt 大于等于
                        if ($starttime != null && $endtime != null) {
                            $wTwo['userstock.ts'] = array(array('elt', date("Y-m-d", strtotime("$endtime +1 dya"))), array('egt', $starttime));
                        } elseif ($starttime != null) {
                            $wTwo['userstock.ts'] = array('egt', $starttime);
                        } elseif ($endtime != null) {
                            $wTwo['userstock.ts'] = array('elt', date("Y-m-d", strtotime("$endtime +1 dya")));
                        }

                        $data = M('userstock')
                            ->join("user on user.userid=userstock.userid")
                            ->join("ttproduct on ttproduct.id=userstock.productid")
                            ->where($wTwo)
                            ->field("user.usercode,user.compname,ttproduct.productname,ttproduct.openprice,userstock.num,userstock.summny,userstock.ts")
                            ->order('userstock.ts desc')
                            ->select();
                        $this->assign("starttime", $starttime);
                        $this->assign("endtime", $endtime);
                    } else {
                        $data = M('userstock')
                            ->join("user on user.userid=userstock.userid")
                            ->join("ttproduct on ttproduct.id=userstock.productid")
                            ->where($wTwo)
                            ->field("user.usercode,user.compname,ttproduct.productname,ttproduct.openprice,userstock.num,userstock.summny,userstock.ts")
                            ->order('userstock.ts desc')
                            ->select();
                    }
                }
            }
            $this->assign('data',$data);
        }
        $this->display('subscription-all');
    }
    // 0.实现退出功能
    function logout()
    {
        unset($_SESSION['admin']);
        $this->redirect("User/login");
    }

    // 1.实现首页
    public function Index()
    {
        //P($_SESSION);
        $this->display();
    }

    // 2.实现客户管理的功能
    public function client()
    {
        $compname = I("compname");//客户归属
        $keyword = I('tel');//手机号

        $user = M('user');
        if ($keyword == NULL && $compname == NULL) {
            //无提交执行
            // $hy=$user->order('ts asc')->select();
            $result = $user->where(array('usercode' => $_SESSION['admin']['usercode']))->find();
            $upuserid1 = $result['userid'];
            // $result = M('user')->where(array('userid'=>$userid))->data($shuju)->save();
            $sql = "select * from user where find_in_set($upuserid1,upuserid)";
        } else {
            //存在提交执行
            // $hy = $user->where(array('usercode'=>$keyword))->select();

            if($keyword){
                //$result = $user->where(array('usercode' => $keyword))->getField('userid');
                $userid = $_SESSION['admin']['userid'];
                if(preg_match("/^1[34578]{1}\d{9}$/",$_SESSION['admin']['usercode']))
                {
                    $where['_string'] = "FIND_IN_SET($userid,upuserid)";
                }

                $where['usercode'] = $keyword;
                $data = M("user")->where($where)->select();
            }else{
                $result = $user->where(array('compname' => $compname))->getField('userid');
                $where['_string'] = "find_in_set($result,upuserid)";
                $data = M("user")->where($where)->select();
            }

            //P($data);
//            $upuserid1 = $result['userid'];
//            $sql = "select * from user where find_in_set($upuserid1,upuserid)";
//            $hy = $user->query($sql);
            $this->assign('keyword', $keyword);
            $this->assign('compname', $compname);
        }


        $this->assign('shuju', $data);
        $this->display();
    }

    // ajax  的信息
    public function userinfo()
    {
        $userid = I('userid');
        $data = M("user")->where(array("userid" => $userid))->find();
        if (!empty($data)) {
            $array['result'] = 1;
            $array['data'] = $data;
            echo json_encode($array);
        } else {
            $array['result'] = 0;
            $array['data'] = "";
            echo json_encode($array);
        }
    }

    // 实现权限修改功能
    public function upuser()
    {
        $user = D('user');
        $userid = I('get.userid');
        $keyword = I('tel');

        if (!empty($_POST)) {
            $shuju = I('post.');
            $result = M('user')->where(array('userid' => $userid))->data($shuju)->save();
            if ($result) {
                $this->redirect('Index/client', array('tel' => $keyword, 'is_succeed' => 1));
            } else {
                $this->success('修改失败', U('client', array('tel' => $keyword)));

            }
        } else {
            // 展示出来
            $info = $user->find($userid);

        }

    }

    // 实现客户管理删除功能
    public function upd()
    {
        $userid = I('get.userid');
        $info = D('user')->where(array('userid' => $userid))->delete();

    }

    /****
     **
     * //3.实现认购信息的功能
     **
     ***/
    // // 数据备注
    // public function client1()
    // {
    //     $keyword = I('tel');
    //     $user = M('user');
    //     if ($keyword == NULL) {
    //         //无提交执行
    //         // $hy=$user->order('ts asc')->select();
    //         $result = $user->where(array('usercode' => session('user_name')))->find();
    //         $upuserid1 = $result['userid'];
    //         // $result = M('user')->where(array('userid'=>$userid))->data($shuju)->save();
    //         $sql = "select * from user where find_in_set($upuserid1,upuserid)";
    //     } else {
    //         //存在提交执行
    //         // $hy = $user->where(array('usercode'=>$keyword))->select();
    //         $result = $user->where(array('usercode' => $keyword))->find();
    //         $upuserid1 = $result['userid'];
    //         $sql = "select * from user where find_in_set($upuserid1,upuserid)";
    //         $hy = $user->query($sql);
    //         $this->assign('keyword', $keyword);
    //     }

    //     $this->assign('shuju', $hy);
    //     $this->display();
    // }


    // 隔开数据
    public function subscription()
    {

        $keyword = I('get.compname');
        $keywordtel = I('get.tel');
        $startime = I('get.startime');
        $endtime = I('get.endtime');

        $user = M('user');
            if ($keyword == NULL && $keywordtel == NULL){

                //无提交执行
                // // $hy=$user->order('ts asc')->select();
                // $result = $user->where(array('usercode' => session('user_name')))->find();
                // $upuserid1 = $result['userid'];
                // // $result = M('user')->where(array('userid'=>$userid))->data($shuju)->save();
                // $sql = "select * from user where find_in_set($upuserid1,upuserid)";

            } else {
                //$result = $user->where(array('compname' => $keyword))->field('userid')->select();

                if($keyword != null)
                {
                    $upuserid1 = $user->where(array('compname' => $keyword))->getField("userid");
                    if(empty($upuserid1))
                    {
                        exit("所属机构不存在");
                    }
                }
                //P($result);//打印数据
                if($keywordtel != null)
                {
                    $resulttel = $user->where(array('usercode' => $keywordtel))->find();
                    if(empty($resulttel))
                    {
                        exit("手机号不存在");
                    }
                }

                // 通过公司得到userid
//                foreach ($result as $k=>$v)
//                {
//                    $userid[$k] = $v['userid'];
//                }
//                $upuserid1 = implode(",",$userid);
                //P($upuserid1);//打印数据
                // 通过电话得到userid
                $upuseridtel = $resulttel['userid'];

                //做逻辑判断
                //电话不为空
                if (NULL != $keywordtel) {
                    // echo "0";
                    $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid  
                      where subscribe.userid = $upuseridtel order by subscribe.ts desc";
                }else {
                    //电话为空 所属机构不为空 开始和结束时间都为空
                    if (NULL == $keywordtel && NULL != $keyword && NULL == $startime && NULL == $endtime) {
                        // echo "1";
//                        $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
//                                                   where find_in_set($upuserid1,user.upuserid) order by subscribe.ts desc";
                        $where['_string'] = "FIND_IN_SET($upuserid1,user.upuserid)";
                        $da = M('subscribe')
                            ->join("ttproduct on subscribe.productid=ttproduct.id")
                            ->join("user on subscribe.userid=user.userid")
                            ->where($where)
                            ->field("subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny")
                            ->order('subscribe.ts desc')
                            ->select();

//                        $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
//                                                   where user.referrerid IN($upuserid1) order by subscribe.ts desc";
                    }
                    //所属机构不为空 开始时间不为空 结束时间为空

                    if (NULL !== $keyword && NULL != $startime && NULL == $endtime) {
                        // echo "2";

                        $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
                                                  where find_in_set($upuserid1,user.upuserid) order by subscribe.ts desc";
//                        $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
//                                                  where user.referrerid IN($upuserid1) order by subscribe.ts desc";
                    }
                    //所属机构不为空 开始时间为空 结束时间不为空
                    if (NULL != $keyword && NULL != $endtime && NULL == $startime) {
                        // echo "3";

                        $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny  from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
                                                  where find_in_set($upuserid1,user.upuserid) order by subscribe.ts desc";
//                        $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny  from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
//                                                  where user.referrerid IN($upuserid1) order by subscribe.ts desc";
                    }
                    //所属机构不为空且开始时间和截止时间不为空
                    if (NULL != $keyword && NULL != $endtime && NULL != $startime) {
                        // echo "4";
//                        $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,user.upuserid,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
//                                                 where find_in_set($upuserid1,user.upuserid) and subscribe.ts >= '$startime' and subscribe.ts <= '$endtime' order by subscribe.ts desc";
                        $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,user.upuserid,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid  
                                                 where user.referrerid IN($upuserid1) and subscribe.ts >= '$startime' and subscribe.ts <= '$endtime' order by subscribe.ts desc";

                    }

                }
                                         // 电话为空且所属机构为空
             

                // if($upuserid1!==NULL&&$upuseridtel!==NULL){

                //   $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
                //            where subscribe.userid = $upuseridtel";
                // }else{
                //      if($upuserid1!==NULL){
                //      // 通过公司userid执行sql语句
                //    $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,user.upuserid from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
                //            where find_in_set($upuserid1,user.upuserid)";
                //        } else if($upuseridtel!==NULL){
                //          // 通过电话tel执行sql语句
                //           $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
                //            where subscribe.userid = $upuseridtel";
                //        }

                // }


                // if($upuserid1!==NULL){
                //     // 通过公司userid执行sql语句
                // $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,user.upuserid from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
                //           where find_in_set($upuserid1,user.upuserid)";
                //       } else if($upuseridtel!==NULL){
                //         // 通过电话tel执行sql语句
                //          $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
                //           where subscribe.userid = $upuseridtel";
                //       }


                // $sql = "select * from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid
                // where find_in_set($upuserid1,upuserid)";
                // 执行sql语句
                if($da){
                    $hy = $da;
                }else{
                    $hy = $user->query($sql);
                }

                // dump($hy);
                // die;
                foreach ($hy as $k => $v) {
                    $hy[$k]['num'] = (int)$v['num'];
                }
                $this->assign('keyword', $keyword);
                $this->assign('keywordtel', $keywordtel);
            }
        $this->assign('result', $hy);
        $this->display();
    }

    // 审核不通过
    public function delete()
    {    

        $keyword = I('tel');
        $compname = I('compname');
        // 申购记录id
         $id = I('get.id');
        // 连表查询
        $data = M("subscribe")
            ->join("user on subscribe.userid=user.userid")
            ->where(array("subscribe.id"=>$id))
            ->field("subscribe.num,subscribe.productid,subscribe.summny,user.userid,user.balance,user.freezebalance")
            ->find();
        //将拒绝的数量返还给系统仓库
        $supnums = M("ttproduct")->where(array('id'=>$data['productid']))->getField("supnum");
        M('ttproduct')->where(array('id'=>$data['productid']))->setField("supnum",(int)$supnums+$data['num']);
        // $id = I('get.id');
        // 还给账户钱
        $balance = $data['balance'] +$data['summny'];
        // 冻结金额减去表中的总金额
        $accounts = $data['freezebalance']-$data['summny'];
        $delete = M('subscribe')->where(array('id'=>$id))->setField("status",2);
        $result = M('user')->where(array('userid' => $data['userid']))->data(array("balance"=>$balance,"freezebalance"=>$accounts))->save();
        if ($result) {
                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
            } else {
                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
            }
        //dump($delete);
        //dump($data1);

    }

    // 实现审核的功能
    public function audit()
    {
        $keyword = I("get.tel");
        $compname = I('get.compname');
        //获取申购记录id
        $subid = I('get.userid');
        // 得到同意的数量
        $count = I('post.count');
        //首先判断是否属于自己的下级
        //$admin_userid = $_SESSION['admin']['userid'];
        //$sub_userid = M("subscribe")->where(array('id' => $subid))->getField('userid');
        //$is_member = M("user")->query("select userid from user where userid={$sub_userid} and find_in_set($admin_userid,upuserid)");
      //P($_GET);
        $is_admin = $_SESSION['admin']['usercode'];
        if(preg_match("/^1[34578]{1}\d{9}$/",$is_admin))
        {
            if (!$is_member) {
                echo "<h4>抱歉不属于自己的下级</h4>";
                exit;
            }
        }


        $data[0] = M("subscribe")
            ->join("user on subscribe.userid=user.userid")
            ->where(array("subscribe.id" => $subid))
            ->find();
			
        foreach ($data as $k => $v) {
            // 申购数量
            $num = $v['num'];
            $summny = $v['summny'];//单笔申购所需金额
            $freezebalance = $v['freezebalance'];//冻结金额
            $productid = $v['productid'];//申购的类型
            $usercode = $v['usercode'];//用户手机号（唯一标识）
        }

        //计算出剩下的冻结金额
        $currfreezebalance = $freezebalance-(($summny/$num)*$count);
	
        if($count < $num)
        {
            //新增一条被通过记录
            $subdata = M("subscribe")->where(array('id'=>$subid))->field("userid,productid,num,summny,ts")->find();
            $subdata['status'] = 1;
            $subdata['num'] = $count;
            $subdata['summny'] = $summny/$num*$count;
            $add = M("subscribe")->data($subdata)->add();
            //判断如果通过 将通过数量加入个人仓库中
            if($add)
            {
                unset($subdata['ts']);
                $re = M('userstock')->where(array("userid"=>$sub_userid,"productid"=>$productid))->find();
                if(!empty($re))
                {
                    $counts = $re['num']+$count;
                    $summnys = $re['summny']+$summny/$num*$count;
                    M("userstock")->where(array("userid"=>$sub_userid,"productid"=>$productid))->data(array("num"=>$counts,'summny'=>$summnys))->save();
                }else{
                    M("userstock")->data($subdata)->add();
                }

            }else{
                echo "<h3>同意失败</h3>";
                exit;
            }
            //原数据减去被通过数据
            $data1 = D('user')->where(array('usercode' => $usercode))->setField("freezebalance",$currfreezebalance);
            //获取剩余数量
            //获取剩余冻金额
            $money = ($num-$count)*($summny/$num);
            //剩余数量
            $result = M("subscribe")->where(array('id'=>$subid))->data(array("summny"=>$money,"num"=>$num-$count))->save();

        }else if($count == $num)
        {
		
            //申购数量全部通过
            $subdata = M("subscribe")->where(array('id'=>$subid))->field("userid,productid,num,summny")->find();
            $data = D('subscribe')->where(array('id' => $subid))->setField("status",1);
            if($data)
            {
                $re = M('userstock')->where(array("userid"=>$sub_userid,"productid"=>$productid))->find();
                if(!empty($re))
                {
                    $counts = $re['num']+$count;
                    $summnys = $re['summny']+$summny/$num*$count;
                    M("userstock")->where(array("userid"=>$sub_userid,"productid"=>$productid))->data(array("num"=>$counts,'summny'=>$summnys))->save();
                }else{
                    M("userstock")->data($subdata)->add();
                }

            }else{
                echo "<h3>同意失败</h3>";
                exit;
            }
            $m = $freezebalance - $summny;
            $result = D('user')->where(array('usercode' => $usercode))->setField("freezebalance",$m);
        }

		
        if ($result) {
            //R("Index/subscription", array('tel' => $keyword,"compname"=>$compname),'Index');
                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
            } else {
                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
            }
    }


//    public function audit()
//    {
//        $keyword = I("get.tel");
//        $compname = I('get.compname');
//        $subscribe = D('subscribe');
//        // 得到用户userid
//        $id = I('get.userid');
//        // 得到同意的数量
//        $value = I('post.count');
//        //首先判断是否属于自己的下级
//        $admin_userid = $_SESSION['admin']['userid'];
//        $is_member = M("user")->query("select userid from user where find_in_set($admin_userid,user.upuserid)");
//        if(empty($is_member))
//        {
//            echo "<h4>抱歉不属于自己的下级</h4>";
//            exit;
//        }
//        // 连表查询 得到申请数量
//        $info = "select * from subscribe inner join user on subscribe.userid=user.userid where subscribe.id = $id";
//        $result = $subscribe->query($info);
//
//
//        foreach ($result as $k => $v) {
//            // 申购数量
//            $num = $v['num'];
//            $summny = $v['summny'];//单笔申购所需金额
//            $freezebalance = $v['freezebalance'];//冻结金额
//            $usercode = $v['usercode'];//用户手机号（唯一标识）
//        }
//        if($value <= $num)
//        {
//
//            $currfreezebalance = $freezebalance-($summny/$num*$value);
//            if($currfreezebalance >= 0)
//            {
//                if($value == $num)
//                {
//                    $data = D('subscribe')->where(array('id' => $id))->setField("status",1);
//                }elseif($value < $num){
//                    $data = D('subscribe')->where(array('id' => $id))->setField("status",1);
//                }
//
//                $data1 = D('user')->where(array('usercode' => $usercode))->setField("freezebalance",$currfreezebalance);
//
//            }else{
//                echo "<h4>错误</h4>";
//            }
//        }
//        if ($num == $value) {
//
//            //$data = M("user")->where(array("userid"=>$userid))->find();
//            //$result = $summny - $freezebalance;
//            $shuju = array(
//                'status' => 1,
//                //'summny' => $result
//            );
//            $currfreezebalance = $freezebalance-$summny;
//            $shuju1 = array(
//                'freezebalance' => $currfreezebalance,//冻结的总额-审核通过的金额
//            );
//            $data = D('subscribe')->where(array('id' => $id))->save($shuju);
//            $data1 = D('user')->where(array('usercode' => $usercode))->save($shuju1);
//            if ($data1) {
//                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
//            } else {
//                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
//            }
//
//        } else if ($value < $num) {
//            // 通过审核的金额
//            $money = ($value/$num) * $v['summny'];
//            // 未通过审核金额
//            $money1= (($num - $value) / $num) * $v['summny'];
//
//            $shuju = array(
//                'status' => 1,
//                'num' => $value,
//                'summny' => $summny - $money1//申购总额-当前审核的金额
//            );
//            // 冻结金额
//            $shuju1 = array(
//                'freezebalance' => $freezebalance-$summny+$money1,  //冻结的金额
//            );
//            $data = D('subscribe')->where(array('id' => $id))->save($shuju);
//            $data1 = D('user')->where(array('usercode' => $usercode))->save($shuju1);
//            // 增加一条数据
//
//            // $money=(($num-$value)/$num)*$v['freezebalance'];
//
//            $shuju2 = array(
//                'userid' => $v['userid'],
//                'productid' => $v['productid'],
//                'num' => $num - $value,
//                'summny' =>$summny - $money,
//                'status' => 0
//            );
//            $shuju3 = array(
//                'freezebalance' =>$freezebalance-$summny+$money1,
//            );
//            $data2 = D('subscribe')->where(array('id' => $id))->add($shuju2);
//            $data3 = D('user')->where(array('usercode' => $usercode))->save($shuju3);
//
//            if ($data2) {
//                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
//            } else {
//                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
//            }
//        }
//    }

     public function audit1(){
        //接收传递的值
        $keyword = I("get.tel");
        $userid = I('get.userid');        // 得到用户userid
        $agree_num = I('post.count');     // 得到同意的数量
        //实例化申购表
        $subscribe = D('subscribe');
        // 连表查询 得到申请数量
        $info = "select * from subscribe inner join user on subscribe.userid=user.userid where subscribe.id = $userid";
        $result = $subscribe->query($info);
        //申购数量
        $apply_num = $result["num"];
        //申购总金额
        $apply_money = $result["summny"];
        //单价
        $price = $apply_money/$apply_num;
        //剩余数量
        $surplus = $apply_num-$agree_num;
        
        if ($surplus<0) {
            echo "<script>alert('数据异常');</script>";
            exit;
        }elseif($surplus>0){
            //实际金额
            $real_money = $agree_num*$price;
            $free_money = $result["freezebalance"] - $real_money;
            if ($free_money<0) {
                echo "<script>alert('数据异常');</script>";
                exit;
            }
            //更改数据库内容
            
            //从用户表中减少当前会员冻结的金额
            //实例化用户表
            $user = M('user');
            //更新用户冻结金额
            unset($dataArr);
            $dataArr["freezebalance"] = $free_money;
            $u=$user->where("userid=$userid")->save($dataArr);
            if ($u) {
                $id=$result["id"];  //申购表编号
                unset($data);
                $data["num"] = $agree_num;      //审核通过的数量
                $data["summny"] = $real_money;  //审核通过所需总金额
                $data["status"] = 1;    //1表示审核通过
                $data["auditor"] = $_SESSION['admin']['userid'];  //获取当前管理员编号
                $data["audittime"] = time();    //获取当前时间
                //更新原有数据
                $rs = $subscribe->where("id=$id")->save($data);
                if ($rs) {
                    //将剩余的数量和余额新建一条数据
                    unset($data);
                    $data["userid"] = $userid;                  //会员编号
                    $data["productid"] = $result["productid"];  //商品编号
                    $data["num"]=$surplus;                      //剩余数量
                    $data["summny"] = $price*$surplus;          //剩余金额
                    $data["status"] = 0;                        //0表示待审核
                    //数据写入
                    $c = $subscribe->add($data);
                    if($c){
                        echo "<script>alert('审核成功');</script>";
                    }
                }
            }else{
                echo "<script>alert('数据异常');</script>";
                exit;
            }            
        }elseif($surplus==0){
            unset($data);
            $id=$result["id"];  //申购表编号
            $data["status"] = 1;    //1表示审核通过
            $data["auditor"] = $_SESSION['admin']['userid'];  //获取当前管理员编号
            $data["audittime"] = time();    //获取当前时间
            //更新原有数据
            $sg = $subscribe->where("id=$id")->save($data);
            if($sg){
                echo "<script>alert('审核成功');</script>";
            }else{
                echo "<script>alert('数据异常');</script>";
                exit;
            }
        }
    }
}