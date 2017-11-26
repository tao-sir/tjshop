<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Controller\PublicController;
class IndexController extends PublicController
{
    // 0.实现退出功能
    function logout()
    {
        session(null);
        $this->redirect("User/login");
    }

    // 1.实现首页
    public function Index()
    {
        $this->display();
    }

    // 2.实现客户管理的功能
    public function client()
    {
        $keyword = I('tel');

        $user = M('user');
        if ($keyword == NULL) {
            //无提交执行
            // $hy=$user->order('ts asc')->select();
            $result = $user->where(array('usercode' => session('user_name')))->find();
            $upuserid1 = $result['userid'];
            // $result = M('user')->where(array('userid'=>$userid))->data($shuju)->save();
            $sql = "select * from user where find_in_set($upuserid1,upuserid)";
        } else {
            //存在提交执行
            // $hy = $user->where(array('usercode'=>$keyword))->select();
            $result = $user->where(array('usercode' => $keyword))->find();
            $upuserid1 = $result['userid'];
            $sql = "select * from user where find_in_set($upuserid1,upuserid)";
            $hy = $user->query($sql);
            $this->assign('keyword', $keyword);
        }

        $this->assign('shuju', $hy);
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

                $result = $user->where(array('compname' => $keyword))->find();
                $resulttel = $user->where(array('usercode' => $keywordtel))->find();
                // 通过公司得到userid
                $upuserid1 = $result['userid'];
                // 通过电话得到userid
                $upuseridtel = $resulttel['userid'];

                //做逻辑判断
                //电话不为空
                if (NULL != $keywordtel) {
                    // echo "0";
                    $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid  
                      where subscribe.userid = $upuseridtel order by subscribe.ts desc";
                }else{ 
                                           //电话为空 所属机构不为空 开始和结束时间都为空
                                            if (NULL == $keywordtel && NULL != $keyword &&NULL == $startime && NULL==$endtime) {
                                                // echo "1";
                                                $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid  
                                                   where find_in_set($upuserid1,user.upuserid) order by subscribe.ts desc";
                                            } 
                                            //所属机构不为空 开始时间不为空 结束时间为空

                                            if (NULL !== $keyword && NULL != $startime && NULL==$endtime) {
                                                // echo "2";
                                                
                                                $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid  
                                                  where find_in_set($upuserid1,user.upuserid) order by subscribe.ts desc";
                                            } 
                                            //所属机构不为空 开始时间为空 结束时间不为空
                                            if (NULL != $keyword && NULL != $endtime && NULL==$startime) {
                                                // echo "3";
                                               
                                                $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,subscribe.ts,subscribe.summny  from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid  
                                                  where find_in_set($upuserid1,user.upuserid) order by subscribe.ts desc";
                                            } 
                                            //所属机构不为空且开始时间和截止时间不为空
                                            if (NULL != $keyword && NULL != $endtime && NULL != $startime) {
                                                // echo "4";                    
                                                $sql = "select subscribe.id,subscribe.num,user.usercode,user.compname,user.freezebalance,ttproduct.productname,subscribe.status,user.upuserid,subscribe.ts,subscribe.summny from subscribe inner join ttproduct on subscribe.productid=ttproduct.id inner join user on subscribe.userid=user.userid  
                                                 where find_in_set($upuserid1,user.upuserid) and subscribe.ts >= '$startime' and subscribe.ts <= '$endtime' order by subscribe.ts desc";

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
                $hy = $user->query($sql);
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


// 隔开数据

    //  $subscribe = D('subscribe');
    //  if(IS_POST){
    //      $info = I('post.');
    //        // 得到用户usercode
    //      $usercode = $info['tel'];
    //          // 得到时间段
    //      $startime = $info['startime'];
    //      $endtime = $info['endtime'];
    //      // 得到公司名
    //      $compname =$info['compname'];
    //        // 连表查询// 得到连表数据信息
    //      $info = "select * from subscribe inner join user on subscribe.userid=user.userid inner join ttproduct on subscribe.productid=ttproduct.id  where (subscribe.ts >= '$startime' and subscribe.ts <= '$endtime') or usercode ='$usercode' or compname = '$compname'";
    //          $result =$subscribe ->query($info);
    //      // 分配到模版
    //        $this->assign('result',$result);
    //  }
    //  $this ->display();
    // }

    // 隔开数据

    // public function subscription(){
    //      $user = M('user');
    //       $result = $user ->where("array('usercode'=>session('user_name'))")->find();

    //       $upuserid1 = $result['userid'];
    //       // $result = M('user')->where(array('userid'=>$userid))->data($shuju)->save();
    //       $sql="select * from user where find_in_set($upuserid1,upuserid)";
    //       $hy = $user -> query($sql);
    //       $this->assign('shuju',$hy);
    //       $this ->display();
    //   }
    // 审核不通过
    public function delete()
    {    

        $keyword = I('tel');
        $compname = I('compname');
        $subscribe=D('subscribe');
        $user =D('user');
        // 得到传过来的id
         $id = I('get.id');
        // 连表查询
        $info = "select * from subscribe inner join user on subscribe.userid=user.userid where subscribe.id = $id";
        $result = $subscribe->query($info);
           foreach ($result as $k => $v){
            // 审核数量
            // $num = $v['num'];
            // $summny = $v['summny'];
            $freezebalance = $v['freezebalance'];
            $summny =$v['summny'];
            $userid = $v['userid'];
            $balan =$v['balance'];           
        }

        // $id = I('get.id');
        $balance = $balan+$summny;
        $freezebalance = $freezebalance-$summny; 
        $shuju= array(
          'status' =>2,
          'summny' =>0
          );
         $shuju1 = array(
                'freezebalance' =>$freezebalance,
                'balance'=>$balance
            );

        $delete = D('subscribe')->where(array('id'=>$id))->save($shuju);
        $data1 = D('user')->where(array('userid' => $userid))->save($shuju1);
        if ($data1) {
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
        $subscribe = D('subscribe');
        // 得到用户userid
        $id = I('get.userid');
      
       
        // 得到同意的数量
        $value = I('post.count');
        // 连表查询 得到申请数量
        $info = "select * from subscribe inner join user on subscribe.userid=user.userid where subscribe.id = $id";
        $result = $subscribe->query($info);

        foreach ($result as $k => $v) {
            // 申购数量
            $num = $v['num'];
            $summny = $v['summny'];
            $freezebalance = $v['freezebalance'];
            $usercode = $v['usercode'];           
        }
        if ($num == $value) {

            //$data = M("user")->where(array("userid"=>$userid))->find();
            //$result = $summny - $freezebalance;
            $shuju = array(
                'status' => 1,
                //'summny' => $result
            );
            $currfreezebalance = $freezebalance-$summny;
            $shuju1 = array(
                'freezebalance' => $currfreezebalance,//冻结的总额-审核通过的金额
            );
            $data = D('subscribe')->where(array('id' => $id))->save($shuju);
            $data1 = D('user')->where(array('usercode' => $usercode))->save($shuju1);        
            if ($data1) {
                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
            } else {
                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
            }

        } else if ($value < $num) {
            // 通过审核的金额
            $money = ($value/$num) * $v['summny'];
            // 未通过审核金额
            $money1= (($num - $value) / $num) * $v['summny'];

            $shuju = array(
                'status' => 1,
                'num' => $value,
                'summny' => $summny - $money1//申购总额-当前审核的金额
            );
            // 冻结金额
            $shuju1 = array(
                'freezebalance' => $freezebalance-$summny+$money1,  //冻结的金额
            );
            $data = D('subscribe')->where(array('id' => $id))->save($shuju);
            $data1 = D('user')->where(array('usercode' => $usercode))->save($shuju1);
            // 增加一条数据

            // $money=(($num-$value)/$num)*$v['freezebalance'];

            $shuju2 = array(
                'userid' => $v['userid'],
                'productid' => $v['productid'],
                'num' => $num - $value,
                'summny' =>$summny - $money,
                'status' => 0
            );
            $shuju3 = array(
                'freezebalance' =>$freezebalance-$summny+$money1,
            );
            $data2 = D('subscribe')->where(array('id' => $id))->add($shuju2);
            $data3 = D('user')->where(array('usercode' => $usercode))->save($shuju3);

            if ($data2) {
                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
            } else {
                $this->redirect('Index/subscription', array('tel' => $keyword,"compname"=>$compname));
            }
        }

    }
}