<?php
namespace Home\Controller;
use Think\Controller;
use Lib\Huyi\SMS;
class UserController extends Controller {
    // 实现登录功能
    public function login(){
        if(IS_POST){
            //收集form表单过来的用户名和密码信息
            $name = I('post.user');           
            $pwd = I('post.psw');           
            // $pwd1 = md5(md5($pwd).'1358521456'); //加密处理
            $pwd1 = md5(md5($pwd).'4215345');
            //判断用户名和密码(返回null则说明用户名和密码是错误的)
			$user = M('User');
            $info = $user->where(array('usercode'=>$name,'password'=>$pwd1))->find();
			
            if($info !== null){
                //持久化用户信息
                $_SESSION['user'] = $info;
                $time = time();
                $data["logintime"] = date('Y-m-d h:i:s',$time);
                $data["logintime"] = date('Y-m-d h:i:s',$time);
                $user->where("usercode = $name")->save($data);
//            session('user_id',$info['userid']);
                //页面跳转到首页
				
                if($info["isrisk"] == 0){
                    $this -> redirect('User/riskwarning');
                }
                $this -> redirect('Index/index');
            }else{
            //把用户名和密码错误的信息传递给模板显示                
            $this -> assign('errorinfo','用户名或密码错误');
           }
        }
        $this -> display();
    }
    /***
    // 实现注册功能
    **/
    public function register(){
        //当前时间
        $time=time();

        $kong = $_POST;
        // 判断是否为空
        if(!empty($kong)){
            $user = D('user');
            if(IS_POST){
                // 一.判断是否注册过
                $cephone= I('post.phone');
                $data['usercode'] = $cephone;        
                $result = $user->where($data)->getfield('usercode');
                if($result){
                    $this -> assign('infoerror','手机号已注册');

                }else{
                    // 二.校验短信验证码
                    $checkcode = I('post.code');//用户输入的(字符串类型)
                    //实例化手机校验表phoneverify
                    $p= M('phoneverify');
                    //根据手机号获取信息
                    $verify = $p->where("photono=$cephone")->find();
                    //数据库中存储的验证码
                    $code = $verify["verifycode"];
                    //实例化手机校验表phoneverify
                    $p= M('phoneverify');
                    //根据手机号获取信息
                    $verify = $p->where("photono=$cephone")->find();
                    //数据库中存储的验证码
                    $code = $verify["verifycode"];
                    if($checkcode != $code){
                        //② 是否正确校验
                       $this -> assign('infoerror','验证码输入错误');
                    }else{
                        /*
                        *验证码60秒失效,开始 
                        */
                        //时间转换成时间戳
                        $code_time = strtotime($verify['ts']);
                        //时间差
                        $time_difference = $time-$code_time;
                        //验证码过期时间：60秒
                        if($time_difference>60){
                            $this->assign('infoerror','验证码已过期');
                        }
                       /*
                        *验证码60秒失效,结束 
                        */
                        else{
                            //   收集信息，存储信息
                            $info = I('post.');
                            //查询推荐人所有的数据
                            $array['usercode'] = $info['tjnumber'];
                            $tuijian = $user->where($array)->find(); 
                            //为注册用户的推荐人id赋值
                            $shuju['referrerid'] = $tuijian['userid'];
                            //取出推荐人的所有上级用户id
                            $tjupuserid=$tuijian['upuserid'];
                            //取出推荐人的用户id
                            $tjuserid=$tuijian['userid'];
                            //为注册用户的所有上级推荐人id赋值
                            $shuju['upuserid']  = empty($tjupuserid)?$tjuserid:$tjupuserid.",".$tjuserid;
                            $shuju['lev'] = $tuijian['lev']+1;
                            $shuju['usercode']=$info['phone'];
                            $shuju['password']=md5(md5($info['psw']).'4215345');
                            $shuju['qrcode'] = 'qrcode'.$shuju['usercode'];
                            $shuju['usernature'] = 0;
                            $shuju['isadmin'] = 0;

                            qrcode(DOMAIN_NAME."index.php/Home/User/register/usercode/".$shuju['usercode'],3,10,"Uploads/Code/".$shuju['qrcode'].'.png');
                            if($user->add($shuju)){
                                echo "<script>";
                                $this->redirect("User/login");
                                //$this ->success('注册成功',U('login'),2);
                            }
                        }
                    }
                }        
            }
       }
        
        $this->assign('usercode',$_GET['usercode']);
       $this ->display();
    }

    // 
    
    public function password(){
     $this ->display();
     }
     /**
     * 忘记密码功能
     */     
    public function resetpassword(){
        $user = D('user');
        /*$a = I('post.');
        dump($a);*/
        //校验短信验证码
        $post_code= I('post.code');//用户输入的验证码(字符串类型)
        $tel = I('post.tel');
        //实例化手机校验表phoneverify
        $p= M('phoneverify');
        //根据手机号获取信息
        $verify = $p->where("photono=$tel")->find();
        //数据库中存储的验证码
        $code = $verify["verifycode"];

        if($post_code != $code){
            //② 是否正确校验
           echo "<script>alert('验证码输入错误!')</script>";
		   $this -> redirect('User/password');
        }else{
            $user_name =I("post.tel");
            $newpwd = I("post.newpwd");           
            $shuju['password'] = md5(md5($newpwd).'4215345');
            //$data = array('password'=>'$newpwd');
            $usercode=$user->where("usercode=$user_name")->save($shuju);
            if($usercode){                               
            $this ->redirect("User/login");
              }
            
          } 

    }  


    // 短信验证功能
     /**
     * 获取验证码
     */
        function sms(){

        header("Content-type:text/html; charset=UTF-8");
        //短信接口地址
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        //获取手机号
        $mobile = I('post.tel');
        writelog('info',1,$mobile);
        // $mobile = 15090588206;
         // I('post.phone');
        //获取验证码
        //$send_code = $_POST['send_code'];
        //生成的随机数
        $mobile_code = mt_rand(100000, 999999);
        //请求类型 1注册 2忘记
        $type = (int)I('post.type',1,'int');
        if (empty($mobile)) {
            $array['result'] = 0;
            $array['msg'] = '手机号码不能为空';
            echo json_encode($array);
            exit();
        }
            if ($type == 1) {
                $usercode = M('user')->where(array('usercode' => $mobile))->find();
                if (!empty($usercode)) {
                    $array['result'] = 2;
                    $array['msg'] = '手机号已注册,请直接登录';
                   /* $infoerror =  $array['msg'];
                    $this -> assign('infoerror','手机号已注册');*/
                    echo json_encode($array);
                    exit;
                }
            } else if ($type == 2) {
                $usercode = M('user')->where(array('usercode' => $mobile))->find();
                if (empty($usercode)) {
                    $array['result'] = 3;
                    $array['msg'] = '手机号未注册';
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
 }

