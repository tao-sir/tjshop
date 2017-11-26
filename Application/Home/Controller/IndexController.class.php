<?php
namespace Home\Controller;
use Think\Controller;
use Home\Controller\PublicController;
use Lib\Huyi\SMS;
use Lib\Bank\Bank;
class IndexController extends PublicController {
      // 17.退出
   function logout(){
    //session(null);
       unset($_SESSION['user']);
    $this -> redirect("User/login");
   }

  // 实现首页
    public function Index(){
        $isrisk = I("get.type");
        if($isrisk == 1)
        {
            M('user')->where(array("userid"=>$_SESSION['user']['userid']))->setField("isrisk",1);
        }
        $Model = M("ttproduct"); // 实例化ttproduct对象
        // 查找producttype值为0的用户数据 
        $data = $Model->where('producttype=0')->select();
        //dump($data);
        for ($i=0; $i <3 ; $i++) {            
            $id  = $data[$i]["id"];
                switch ($id) {
                    case '1':
                        $openprice = $data[$i]["openprice"];
                        $currentprice = $data[$i]["currentprice"];
                        $difference = $currentprice-$openprice;
                        $rose1 = ($difference/$openprice)*100;
                        break;
                    case '2':
                        $openprice = $data[$i]["openprice"];
                        $currentprice = $data[$i]["currentprice"];
                        $difference = $currentprice-$openprice;
                        $rose2 = ($difference/$openprice)*100;
                        break;
                    case '3':
                        $openprice = $data[$i]["openprice"];
                        $currentprice = $data[$i]["currentprice"];
                        $difference = $currentprice-$openprice;
                        $rose3 = ($difference/$openprice)*100;
                        break;
                }
         }
        $this->assign('data',$data);
        $this->assign('rose1',round($rose1,2));
        $this->assign('rose2',round($rose2,2));
        $this->assign('rose3',round($rose3,2));
        $this ->display();
    }




     public function Subscribe(){
     $this ->display();
    } 

    // 实现个人功能的实现 开始  START 

    // 实现获取银行卡信息的功能
     public function bankcar(){
         //实例化银行信息表
         $card = M('bankcard');

         //获取当前用户ID
         $userid = $_SESSION['user']['userid'];
         $hycard = $card->where("userid=$userid")->order('ts asc')->select();
         //print_r($hycard);
         //exit();
         if($hycard){
             $a = count($hycard);
             for($i=0;$i<$a;$i++){
               $b =  $hycard[$i]["cardno"];
                $hycard[$i]["head"] = substr("$b",0,4); //前四位
                $hycard[$i]["ending"] = substr("$b",-4,4); //后四位
             }

             $this->assign('info',$hycard);
         }
        $this ->display();
     }
     //实现银行卡添加的功能
    public function upaddcard(){
        //实例化银行信息表
        $card = M('bankcard');
        //获取当前用户ID
        $userid = $_SESSION['user']['userid'];
        if($userid){
            $post_user= I('post.user'); //持卡人姓名
            $post_bank= I('post.bank'); //银行卡号
            $post_tel= I('post.tel'); //预留手机号
            if($post_user && $post_bank && $post_tel){
                //echo $post_bank;
                $bank = new Bank();
                $a = $bank->bankinfo("$post_bank");
                $arr = explode('-',$a);
                $bankname = $arr[0];
                unset($data);
                $data["userid"] = $userid;  //用户编号
                $data["bankname"] = $bankname;  //用户编号
                $data["cardno"] = $post_bank;  //银行卡号
                $data["psnname"] = $post_user;  //持卡人姓名
                $data["phoneno"] = $post_tel;  //预留手机号

                //将信息写入bankcard表中
                $result = $card->data($data)->add();
                if($result){
                    $this->redirect('Index/bankcar');
                }else{
                    $this->redirect('Index/addcard');
                }
            }else{
                echo "<script>alert('请补充完整银行卡信息！')</script>";
                $this->redirect('Index/addcard');
            }
        }else{
            echo "<script>alert('请登录后再进行相关操作！')</script>";
            $this->redirect('User/login');
        }
         $this->display("addcard");
    }
    //删除银行卡
    public function del_bankcard(){
        $id = I('post.id');
        if ($id){
            //实例化银行卡表
            $bank = M('bankcard');
            //删除数据
            $result = $bank->where("id=$id")->delete();
            if($result){
                $array['result'] = 1;
                $array['msg'] = "数据删除成功！";
                echo json_encode($array);
                exit();
            }else{
                $array['result'] = 2;
                $array['msg'] = "数据删除失败！";
                echo json_encode($array);
                exit();
            }
        }else{
            $array['result'] = 0;
            $array['msg'] = "该记录不存在！";
            echo json_encode($array);
            exit();
        }
    }
  
    // 1.实现充值过程中传值的功能
     public function Recharge_ts(){
        $money = I('get.money');
		$this->assign('money',$money);		
		$this ->display();
    }
    //提现功能
    public function recharge(){
        $id = I('post.cardid');        //隐藏表单提交的银行卡编号
        $money = I('post.money'); //会员提交的金额
        //$pw2 = I('pw2');   //资金密码
        echo $money;
        //从session 中获取当前会员id
        $userid=$_SESSION['user']['userid'];

        //获取当前会员信息
        $user = M('user');
        $balance = $user->where("userid = $userid")->getField('balance');   //天机账户剩余金额
        //求差额
        $residual = $balance - $money;
        if($residual<=0){
            echo "<script>alert('剩余金额不足！');</script>";
            exit();
        }else{
            //扣除账户金额
            $Array["balance"] = $residual;
            $rs_hy = $user->where("userid = $userid")->save($Array);

            if($rs_hy){
                //获取银行卡信息
                $bank = M('bankcard');
                $bank_info = $bank->where("id = $id")->find();

                //准备写入数据库
                unset($data);
                $data["userid"] = $userid;
                $data["money"] = $money;
                $data["dealtype"] = '2';    //1充值，2提现
                $data["account"] = $bank_info["cardno"];      //银行卡号
                $data["bankname"] = $bank_info["bankname"];   //银行名称
                $data["status"] = '0';   //0待处理，1已处理

                //实例化充值/提现记录表
                $cos = M('costrecord');
                //写入数据
                $rs = $cos->data($data)->add();
                if($rs){
                    echo "<script>alert('提交成功，请耐心等待！');</script>";
                    $this->redirect("person");
                }else{
                    echo "<script>alert('未知原因提交失败，请重试！');</script>";
                    $this->redirect("person");
                }
            }else{
                echo "<script>alert('账户金额扣除失败，请重试');</script>";
                $this->redirect("person");
            }

        }
    }
    //提现页面初次进入时读取银行卡信息
    public function recharge2(){
        //从session 中获取当前会员id
        $userid=$_SESSION['user']['userid'];
        //获取当前会员信息
        $user = M('user');
        $rshy = $user->where("userid = $userid")->find();

        //实例化银行卡表bankcard
        $bank = M('bankcard');
        $info = $bank->where("userid = $userid")->select();
        //var_dump($info);
        if($info){
            $a = count($info);
            for($i=0;$i<$a;$i++){
                $b =  $info[$i]["cardno"];
                $info[$i]["head"] = substr("$b",0,4); //前四位
                $info[$i]["ending"] = substr("$b",-4,4); //后四位
            }
            $this->assign('info',$info);
        }
        $this->assign('rshy',$rshy);
        $this->display();

    }
    //充值记录
    public function cRecord(){
        //获取当前用户信息
        $userid=$_SESSION['user']['userid'];

        if($userid){
            //实例化充值提现记录表
            $record = M('costrecord');
            //查找当前会员的充值记录
            $rs = $record->where("userid=$userid and dealtype=1")->order('id desc')->select();
            //print_r($rs);
            if($rs){
                $this->assign('recharge',$rs);
            }
        }

        $this->display();
    }
    //提现记录
    public function Withdrawal(){
        //获取当前用户信息
        $userid=$_SESSION['user']['userid'];

        if($userid){
            //实例化充值提现记录表
            $record = M('costrecord');
            //查找当前会员的提现记录
            $rs = $record->where("userid=$userid and dealtype=2")->order('id desc')->select();
            // print_r($rs);
            if($rs){
                $a = count($rs);
                for($i=0;$i<$a;$i++){
                    $b =  $rs[$i]["account"];   //银行卡号
                    $ts = $rs[$i]["ts"];    //提交时间
                    $rs[$i]["ts"] = substr("$ts",0,-3);
                    $rs[$i]["head"] = substr("$b",0,4); //前四位
                    $rs[$i]["ending"] = substr("$b",-4,4); //后四位
                    $this->assign('recharge',$rs);
                 }
            }
        }
        $this->display();
    }
     // 1.实现个人主页的资金展示功能
     public function Person(){
        $u =M('user');
        //获取当前用户ID
        $userid=$_SESSION['user']['userid'];
        if($userid=='') $this->redirect("User/login");
        $rshy =$u->where("userid=$userid")->find();
        $this->assign('hy',$rshy);
     $this ->display();
    } 
    // 2.实现个人信息的功能
        public function Personmsg(){
        $kong = $_POST;
        // 判断是否为空
        if(!empty($kong)){
        $usercode = $_SESSION['user']['usercode'];
        $shuju['realname'] = I('post.realname');
        $shuju['cardid']   = I('post.cardid');       
        $result = D('user')->where(array('usercode' => $usercode))->save($shuju);
        $this -> assign('info',$info);      
       }
        // 展示个人数据信息
       $usercode =  $_SESSION['user']['usercode'];
       $info = D('user')->where(array('usercode' => $usercode))->find();
       $this -> assign('info',$info);
       $this ->display();
    } 

    // 4.实现成交查询的功能
    public function Deal(){

     $this ->display();
    } 
    // 5.实现委托查询中预购的功能
    public function Purchase(){

     $this ->display();
    }
  
    // 7.实现持仓查询的功能
    public function Inventory(){
    	//从session中获取当前会员id;
    	$userid =  $_SESSION['user']['userid'];
    	//dump($userid);
    	//实例化会员仓库表;
    	$product = M('userstock');
    	$data['userid'] = $userid;
    	//从数据库中找到当前会员所持有的所有天堂塔商品，按照商品编号从小到大排序
    	$rshy = $product->where($data)->order('productid asc')->select();
    	//dump($rshy);
    	for ($i=0; $i<3; $i++) { 
    		
    		$ttid = $rshy[$i]['productid'];
    		// echo "$ttid<br/>";
    		switch ($ttid) {
    			case '1':
    				$tt = M('ttproduct');
    				$array['id'] = $ttid;
    				$rstt1 = $tt->where($array)->find();
    				$priceall = $rshy[$i]['summny'];
    				$num = $rshy[$i]['num'];
    				$average = $priceall/$num;
    				$profit= ($rstt1['currentprice']-$average);
    				break;
    			case '2':
    				$tt = M('ttproduct');
    				$array['id'] = $ttid;
    				$rstt2 = $tt->where($array)->find();
    				$priceall = $rshy[$i]['summny'];
    				$num = $rshy[$i]['num'];
    				$average = $priceall/$num;
    				$profit2= ($rstt2['currentprice']-$average);
    				break;
    			case '3':
    				$tt = M('ttproduct');
    				$array['id'] = $ttid;
    				$rstt3 = $tt->where($array)->find();
    				$priceall = $rshy[$i]['summny'];
    				$num = $rshy[$i]['num'];
    				$average = $priceall/$num;
    				$profit3= ($rstt3['currentprice']-$average);
    				break;
    		}
    	//从天堂产品表中获取对应的商品信息
    	}
    	$this->assign('profit',round($profit,2));
    	$this->assign('profit2',round($profit2,2));
    	$this->assign('profit3',round($profit3,2));
    	$this->assign('rshy',$rshy);
    	$this->assign('rstt1',$rstt1);
    	$this->assign('rstt2',$rstt2);
    	$this->assign('rstt3',$rstt3);

    	$this ->display();
    } 
	//处理交割
	public function transaction(){
		$userid =  $_SESSION['user']['userid'];		//获取当前用户ID
		$productid = I("post.productid");	//接收传递过来的产品ID
		$jg_num  = I("post.jg_num");		//接收传递的交割商品数量
		$newprice = I("post.newprice");		//接收传递的当前产品金额
		//对交割数量进行判断
		if($jg_num!=null&&$newprice!=null){
			//交割总金额
			$jg_priceall = $jg_num*$newprice;
			//实例化产品表ttproduct
			$product  = M('ttproduct');
			$tt = $product->where("id=$productid")->find();
			if($tt){
				if($tt["sumnum"]>$jg_num){
					//减少商品总数量
					$dataArray["sumnum"]=$tt["sumnum"]-$jg_num;
					//更新数据
					$a=$product->where("id=$productid")->save($dataArray);
					if($a){
						//减少会员持有商品数量
						$userstock = M('userstock');
						//根据缓存中会员ID查询该会员信息
						$rshy = $userstock->where("userid=$userid and productid = $productid ")->find();
						if($rshy){
							//当前拥有产品数量
							$num = $rshy["num"];
							$new_num =$num - $jg_num;
							if($new_num<0){
								$array['result'] = 5;
									$array['msg'] = "持仓数量不足！";
									echo json_encode($array);
									exit();
							}
							//花费总价钱
							$summny = $rshy["summny"];
							//单价
							$average = $summny/$num;
							
							//重新计算总价
							$surplus = $average*($num - $jg_num);
							//更新数据
							$data["num"] = $new_num;	//剩余数量
							$data["summny"]  = $surplus;		//花费总价
							//更新数据
							$b=$userstock->where("userid=$userid and productid = $productid")->save($data);
							if($b){
								//向交割表中写入数据
								//实例化交割表delivery
								$deliver = M("delivery");
								
								$array["userid"] = $userid;			//交割人ID
								$array["productid"] = $productid;	//产品ID	
								$array["num"] = $jg_num;			//交割数量
								$array["money"] = $jg_priceall;		//交割金额
								$c = $deliver->data($array)->add();
								if($c){
									$array['result'] = 1;
									$array['msg'] = "交割成功";
									echo json_encode($array);
								}else{
									$array['result'] = 4;
									$array['msg'] = "交割失败！";
									echo json_encode($array);
									exit();
								}
							}else{
								$array['result'] = 4;
								$array['msg'] = "交割失败！";
								echo json_encode($array);
								exit();
							}
						}
					}else{
						$array['result'] = 4;
						$array['msg'] = "交割失败！";
						echo json_encode($array);
						exit();
					}
				}else{
					$array['result'] = 3;
					$array['msg'] = "产品剩余数量不足！";
					echo json_encode($array);
					exit();
				}
			}else{
				$array['result'] = 2;
				$array['msg'] = "产品不存在！";
				echo json_encode($array);
				exit();
			}
		}else{
			$array['result'] = 0;
            $array['msg'] = "请确定交割数量！";
            echo json_encode($array);
            exit();
		}
	}
	
    // 8.实现交割查询的功能
    public function Delivery(){

     $this ->display();
    }
    // 9.实现申请申购的功能
    public function Shengou(){
        $shengou = M("ttproduct");
        $data['issuestatus'] =1 ;
        $goods = $shengou->where($data)->select();
        //dump($goods);
        for ($i=0;$i<3; $i++) { 
           switch ($i) {
                case '0':
                   $newprice = $goods[$i]['currentprice'];
                    if($newprice!=null) $average1= $newprice;
                   break;
                case '1':
                   $newprice = $goods[$i]['currentprice'];
                    if($newprice!=null) $average2= $newprice;
                   break;
                case '2':
                   $newprice = $goods[$i]['currentprice'];
                    if($newprice!=null) $average3= $newprice;
                   break;
           }
        }
        //echo $average1.$average2.$average3;
        $this->assign('price1',$average1);
        $this->assign('price2',$average2);
        $this->assign('price3',$average3);
        $this->assign('goods',$goods);
        $this ->display();
    }
    //10、实现申请功能
    public function ask_for(){
        $scribe = M("subscribe"); // 实例化subscribe 表

        $userid =  $_SESSION['user']['userid'];
        $name = I('post.name'); //购买产品编号
        $num = I('post.num');   //购买产品数量
        $priceall = I('post.priceall'); //购买产品总价

        //实例化天堂商品表
        $a =M('ttproduct');
        $dataArray["productname"] = $name;
        $product = $a->where($dataArray)->find();
        $productid = $product["id"];
        $nowtime = time(); //当前时间
        //从申购表中查询上一条数据写入时间
        $last = $scribe->where("userid=$userid and productid =$productid ")->order('ts desc')->find();
        $last_time = strtotime($last["ts"]);
        $time_difference = $nowtime - $last_time;   //时间差
        //与上一条数据做对比，如果小于三秒，则停止执行
        if($time_difference<5){
            $array['result'] = 3;
            $array['msg'] = "请不要频繁操作！";
            echo json_encode($array);
            exit();
        }
        //扣除账户对应的资金
        $u = M("user");
        $rshy = $u->where("userid=$userid")->find();
        if($rshy['balance']>=$priceall){

            $balance = $rshy['balance'] - $priceall;    //从当前账户余额扣除
            $freezebalance =  $rshy['freezebalance']+$priceall; //冻结余额增加
            $data = array("balance"=>"$balance","freezebalance"=>"$freezebalance");
            $u-> where("userid=$userid")->setField($data);
        }else{
            $array['result'] = 2;
            $array['msg'] = "账户余额不足";
            echo json_encode($array);
            exit();
        } 

        // 更改商品的剩余库存supnum的值
        $sup = $product["supnum"]-$num;
        $arr["supnum"] = $sup;
        $a->where($dataArray)->setField($arr);
        //  将数据写入数组
        unset($data);
        $data['userid'] = $userid;
        $data['productid'] = $product["id"];
        $data['num'] = $num;
        $data['summny'] = $priceall;
        $data['status'] = '0'; 

        //插入数据库

        $result=$scribe->data($data)->add();
       if($result){
            $array['result'] = 1;
            $array['msg'] = "申购成功";
            echo json_encode($array);
       }else{
            $array['result'] = 0;
            $array['msg'] = "申购失败";
            echo json_encode($array);
       }
        
    }
    // 11.实现申请查询的功能
    public function Shengoucha(){
        $userid =  $_SESSION['user']['userid'];
        //实例化申购表
        $m = M('subscribe');
        $rs = $m->where("userid=$userid")->order('id desc,status')->select();
        // dump($rs);
        if($rs!=null)  $this->assign("rs",$rs);
        $this ->display();
    }    
    // 12.实现收货的功能
    public function Address(){

     $this ->display();
    }
    // 13.实现购物车的功能
    public function Shopcar(){

     $this ->display();
    }
    // 14.实现已购买的功能
    public function Shopcars(){

     $this ->display();
    }
     // 15.实现委托查询中预购的的功能
    public function Purchase2(){

     $this ->display();
    }
     // 16.实现增加地址的功能
    public function Newaddresss(){

     $this ->display();
    }
    // 个人中心功能结束 END
/***
短信接口
**/ 
  function sms(){
    
        header("Content-type:text/html; charset=UTF-8");
        //短信接口地址
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        //获取手机号
        $mobile = I('get.tel');

        // $mobile = 15090588206;
         // I('post.phone');
        //获取验证码
        //$send_code = $_POST['send_code'];
        //生成的随机数
        $mobile_code = mt_rand(100000, 999999);
        //请求类型 1注册 2忘记
        $type = I('get.type');
        if (empty($mobile)) {
            exit('手机号码不能为空');
        }
            if ($type == 1) {
                $usercode = M('user')->where(array('usercode' => $mobile))->find();
                if (!empty($usercode)) {
                    $array['result'] = 2;
                    $array['msg'] = '手机号已注册';
                    $infoerror =  $array['msg'];
                    
                    echo json_encode($array);
                    exit;
                }
            } else if ($type == 2) {
                $usercode = M('user')->where(array('usercode' => $mobile))->find();
                if (empty($usercode)) {
                    $array['result'] = 3;
                    $array['msg'] = '手机号未注册';
                    $this -> assign('infoerror','手机号未注册');
                    echo json_encode($array);
                    exit;
                }
            }

        //防用户恶意请求
        /*if (empty($_SESSION['send_code']) or $send_code != $_SESSION['send_code']) {
            exit('请求超时，请刷新页面后重试');
        }*/
        $huyi = new SMS();
        $post_data = "account=C01646856&password=c61d82228ad74e6425448698feddb3fc&mobile=" . $mobile . "&content=" . rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。如非本人操作，可不用理会！");
        //用户名请登录用户中心->验证码、通知短信->帐户及签名设置->APIID
        //查看密码请登录用户中心->验证码、通知短信->帐户及签名设置->APIKEY
        $gets = $huyi->xml_to_array($huyi->Post($post_data, $target));
        if ($gets['SubmitResult']['code'] == 2) {
            $_SESSION['mobile'] = $mobile;
            $_SESSION['mobile_code'] = $mobile_code;
        }
        if($gets['SubmitResult']['code'] == 2)
        {
            $data = M('phoneverify')->where(array('photono'=>$mobile))->find();
            if(!empty($data))
            {
                M('phoneverify')->where(array('photono'=>$mobile))->data(array('verifycode'=>$mobile_code))->save();
            }else{
                M('phoneverify')->data(array('photono'=>$mobile,'verifycode'=>$mobile_code))->add();
            }
            $array['result'] = 1;
            $array['msg'] = '发送成功';
            echo json_encode($array);
            exit;
        }else if($gets['SubmitResult']['code'] == 4085){
            $array['result'] = 25;
            $array['msg'] = '同一手机号验证码短信发送超出5条';
            echo json_encode($array);
            exit;
        }else{
            $array['result'] = 0;
            $array['msg'] = '发送失败';
            echo json_encode($array);
            exit;
        }

        //echo json_encode($gets['SubmitResult']);

    }
    public function rijing(){
        $tt = M("ttproduct");
        $pro = $tt->where("id=1")->find();
        $this->assign('pro',$pro);
        $this->display();
    }
    public function yuehua(){
        $tt = M("ttproduct");
        $pro = $tt->where("id=2")->find();
        $this->assign('pro',$pro);
        $this->display();
    }
    public function kunbao(){
        $tt = M("ttproduct");
        $pro = $tt->where("id=3")->find();
        $this->assign('pro',$pro);
        $this->display();
    }
  
}
