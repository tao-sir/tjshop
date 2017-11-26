<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 14:26
 */
namespace Home\Controller;
use Think\Controller;
use Lib\Alipay\AopClient;
use Lib\Alipay\AlipayTradeWapPayRequest;
//Vendor('WxPay.WxPayData_b');
//Vendor('WxPay.WxPayNotify');
Vendor('WxPay.WxPayJsApiPay');
Vendor('WxPay.WxPayUnifiedOrder');
Vendor('WxPay.WxPayApi');
Vendor('WxPay.WxPayConfig');
Vendor('WxPay.WxPayNativePay');
Vendor('Bank.acp_service');
class AlipayController extends Controller
{   
	/**
     * 微信支付
     */
    public function wxpay($orderno,$total_amount)
    {     
        
        //①、获取用户openid
        $tools = new \JsApiPay();
		$openId = $tools->GetOpenid();
        //②、统一下单
        $input = new \WxPayUnifiedOrder();

        $input->SetBody("充值");
        $input->SetAttach("充值");
        $input->SetOut_trade_no($orderno);
        $input->SetTotal_fee($total_amount);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("充值");
        $input->SetNotify_url(DOMAIN_NAME."index.php/Home/Alipay/wxNotify");
        $input->SetTrade_type("JSAPI");//NATIVE MWEB JSAPI
        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);
        //$this->printf_info($order);
        $jsApiParameters = $tools->GetJsApiParameters($order);
		$this->assign("total_amount",$total_amount);
		//echo $jsApiParameters;die;
        $this->assign("jsApiParameters",$jsApiParameters);
        $this->display('wxpay');
        //获取共享收货地址js函数参数
        //$editAddress = $tools->GetEditAddressParameters();

        //以下为二维码支付
        //$notify = new \NativePay();
        //$url = $notify->GetPrePayUrl("123456789");//模式一
        //模式二
        //$result = $notify->GetPayUrl($input);
        //$url = urlencode($result['code_url']);
        //header("location: http://paysdk.weixin.qq.com/example/qrcode.php?data={$url}");

    }

    function printf_info($data)
    {
        foreach($data as $key=>$value){
            echo "<font color='#00ff55;'>$key</font> : $value <br/>";
        }
    }
	public function alipay($orderno,$total_amount)
    {

        $aop = new AopClient ();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = '2017062407557706';
        $aop->rsaPrivateKey = 'MIIEogIBAAKCAQEAzHtad/Ck0AzNg7iYEh/wX+TWS9Ld0LP8ac23Dt++Mte/Nkq1XafsPzAfRlwE7Wvo5dPOIb2yW1y7Y4Syt6ZgSDIHJ5NTxiq492HUbFsD2UWiUyHL6qoqssS3/095/PJMMDr/VipEpMsAmys1deTNHEh8ig+3jOKotFIE0Ot6UM7x4EXpAfXKSHayEnd1+L+udVo1sn2fNtI6bpoO23g0tgq7wHMc+EXXNxW0F00AfsiDoNabVPuZaxNN+GA7TnB2W26mmIi9YQmuil1M/5cfYqTgqavDBtEJmTNP/Sbf/DnmfbmciNjGWYrIyUqqhBws6i+WLTqOL3R17E9vLMReCQIDAQABAoIBAHWH7T8FRWYEBdhRMK8yRnKH0JiyciZ0XX/e6voUpnkIwvIMzOQxEbxcB43kdDyXCr2XGWMRasPSsC6KZkLi0XKNtskLiFpd0gT26ScCxVqMCLopsdCG0JYCNhP8dYxrJFmQf5TiJKRnvkhx9H937GD2VQbx87l5yigjAHuo7Zwl3sb4nci7b38/I7UKrRr7Hojv9Djq3fAnHuBtVSOiMT9D0yhsWrsJktfoYkwDA/DaJGSsZcO+UKVpYcxHO1XBafpJkpIYKHOdh12YgfveG+i7TudZIO8ONn4jVMuGcjU3zdg2fmXqmhEsMOQbAjRVTN2a3mmSZFiq1TqeFz3u24ECgYEA+AyQfEyngQ6ZAH7jnOyz1+nhlneKJk9T6hrtBSYv6Zs61pQIHD992F2rEB99hJpOhbBKao4eVkQe8f+7qhB99Z/5SX5l+udoAJqTY/K7kootXPz/+TkNDO8seGJwPebqSO1YOsrmGIRcyHzIrfT8KFN6rrVDPUzaFdnFQhax/bkCgYEA0wlJNoVirC9xfoX9WTq/Qb0EjSWapib0VWZX3blyNJKgMp6WhE3WMXg+yMXNmFB+Abnt5OsgnzvKfoZOWv1B6pigAMQ+E3cOVas7K1DbsAedxZB+lEGryFUQV/EVJ33lKXJd5eiX1iQ+OQ6vU99NIq6k5ICnGlU8xi4KiKtjCtECgYBQyrbc5ZLBZGHNWYcFe8twDgueGL10kO4CGFcPEEsWyaq2bWze1odEy+2FyNv3LtNYk/0JC9Uxv+pcZDFZyRldwYdOus64lFq5p59ONKeHqV3xJa6yHDT1+4j+hQGOCAJTUoskSyX64lHeM1ah4mOnNtmEwiFue/OknlOznPTIcQKBgBsh9IHIAHm219a2j24reW+QR8eF8C4wj/Vy5RUixKYxu9sGPL/h6goONbRGijptDuZV61olSNpwK4a86dIVAaaR3PB8SqbiBbvJ+h+Fk9k8AXLnMv8IundVSHamDlw3eYEsrRnkH7Fuk3lug+g6q4YsAhNG3zUphFjOjpgnwOIhAoGAVIdss0+EOVToLPzlub/38xNlveBTUMAmBz/upRhOUPFIyXe7pAtkhRIQQx60XA7WfrIUqb3R1m9fAuAxZ1pY6MzvHtfB+9nuJ518Lx7tuyz49B0ODKeNB6x2E7vvelyh3T+SbbRsOOYwpPb1ga6iGe6HDNHbpPjFHwhVzFbvksE=';
        $aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA8BTt2ggnrSxMo0AOzXGq8KM0G1TP9dClohgahJvKc983TtTeRy1/HkecFxv9KdIKywiwVas30k86EIYoxV4cHu4DO0Gt4+T/gls6daTLOm2JHwyZwScuqUbF7NaPilyC4pE4RG/pHsiKM8OArrl2NiOp4pS97qzfBX/K1RCplS/FtfGklFQhgelv+sW/UMWmnXBIt2YsOsDMu1akTRrbrkT12HSy+LplOiO8qkCTzaECjPJAdol01kCL7YUaToE7nRBq2WM94M3vE3BpmHFTXIExQjkP2frut636wY1LiGoPh2LX3mhcurFXKf+o3uN1jIYroqQsl4OflRh4iC/DjQIDAQAB';
        $aop->apiVersion = '1.0';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $aop->signType='RSA2';
        $request = new AlipayTradeWapPayRequest ();
        $request->setReturnUrl(DOMAIN_NAME."index.php/Home/Index/person");
        $request->setNotifyUrl(DOMAIN_NAME."index.php/Home/Alipay/orderRecord");
        $request->setBizContent("{" .
            "    \"body\":\"账户充值\"," .
            "    \"subject\":\"充值\"," .
            "    \"out_trade_no\":\"{$orderno}\"," .
            "    \"timeout_express\":\"90m\"," .
            "    \"total_amount\":{$total_amount}," .
            "    \"product_code\":\"QUICK_WAP_WAY\"" .
            "  }");
        $result = $aop->pageExecute ( $request);
        echo $result;
    }
	
	/**
	* 银联支付对接
	* @param $orderno 商户订单号 $total_amount 金额 单位：分
	*/
	public function bank_pay($orderno,$total_amount){
		//Vendor('Bank.acp_service');
		$params = array(
		
			//以下信息非特殊情况不需要改动
			'version' => '5.0.0',                 //版本号
			'encoding' => 'utf-8',				  //编码方式
			'txnType' => '01',				      //交易类型
			'txnSubType' => '01',				  //交易子类
			'bizType' => '000201',				  //业务类型
			'frontUrl' =>  \Bank\Config\SDK_FRONT_NOTIFY_URL,  //前台通知地址
			'backUrl' => \Bank\Config\SDK_BACK_NOTIFY_URL,	  //后台通知地址
			'signMethod' => '01',	              //签名方法
			'channelType' => '08',	              //渠道类型，07-PC，08-手机
			'accessType' => '0',		          //接入类型
			'currencyCode' => '156',	          //交易币种，境内商户固定156
			
			//TODO 以下信息需要填写
			'merId' => '777290058110048',		//商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
			'orderId' => $orderno,	//商户订单号，8-32位数字字母，不能含“-”或“_”，此处默认取demo演示页面传递的参数，可以自行定制规则
			'txnTime' => date('YmdHis',time()),	//订单发送时间，格式为YYYYMMDDhhmmss，取北京时间，此处默认取demo演示页面传递的参数
			'txnAmt' => $total_amount,	//交易金额，单位分，此处默认取demo演示页面传递的参数
			'reqReserved' =>'透传信息',        //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现，如有需要请启用并修改自己希望透传的数据

		//TODO 其他特殊用法请查看 special_use_purchase.php
	);

		
			\Bank\Config\AcpService::sign ( $params );
		$uri = \Bank\Config\SDK_FRONT_TRANS_URL;
		$html_form = \Bank\Config\AcpService::createAutoFormHtml( $params, $uri );
		echo $html_form;
	}
	
	
    /**
     * 产生订单记录
     */
    public function order()
    { 
		/*判断数据是否第一次加载*/
		if(IS_POST){
			$total_amount = I('post.total_amount',0);
			session('total_amount',$total_amount) ;//充值金额
			session('topuptype',I('post.topuptype','0'));//充值方式*/
			$orderno = time().mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9);
			session('orderno',$orderno);
			$total_amount = session('total_amount');
			$topuptype = session('topuptype');
			$orderno = session('orderno');
		}else{
			$total_amount = session('total_amount');
			$topuptype = session('topuptype');
			$orderno = session('orderno');
		}
		writelog('pay','money-payment',$total_amount.'-'.$topuptype);
		if($total_amount == null || $total_amount <= 0 || $topuptype == null)
		{
			
			exit("<h1>请正确填写</h1>");
			
		}
		/*
        switch ($topuptype)
        {
            //case 2;
             //   exit("<h1>微信支付尚未开通</h1>");
             //   break;
            case 3;
                exit("<h1>网银支付尚未开通</h1>");
                break;
        }*/
        $topupstatus = 0;
        $userid = $_SESSION['user']['userid'];
		if(!$userid)
		{
			$this->redirect("User/login");
		}
	   if(!$_GET['code']){
		   
         $result = M("costrecord")->data(array(
            "userid"=>$userid,
			"dealtype"=>1,
            "orderno"=>$orderno,
            "money"=>$total_amount,
            "topuptype"=>$topuptype,
            "topupstatus"=>0))->add();
			writelog('pay','oreder_num-id',$orderno.'-'.$result);
	   }else{
		   $result = 1;
	   }
        if($result)
        {
            switch ($topuptype)
            {
                case 1;
                    $this->alipay($orderno,$total_amount);
                    break;
					case 2;                    
                    $this->wxpay($orderno,$total_amount*100);
                    break;
					case 3;                    
                    $this->bank_pay($orderno,$total_amount*100);
                    break;
					
            }
        }

    }
    /**
     * 支付宝成功回调地址
     */
    public function orderRecord()
    {
        $tastus = $_POST['trade_status'];
        writelog('pay',"weixin",$_POST);
        if($tastus == "TRADE_SUCCESS")
        {
            $orderno = $_POST['out_trade_no'];//订单号
            $result = M('costrecord')->where(array("orderno"=>$orderno))->setField("topupstatus",1);
            if($result)
            {
                $money = $_POST['receipt_amount'];//账户收到金额
                $orderno = $_POST['out_trade_no'];//订单号
                //$userid = $_GET['userid'];
                $userid = M("costrecord")->where(array("orderno"=>$orderno))->getField('userid');

                $balance = M("user")->where(array("userid"=>(int)$userid))->getField("balance");
                $sum =$balance+$money;
                M("user")->where(array("userid"=>$userid))->setField("balance",$sum);
            }

        }
    }
	/**
     * 微信支付回调
     */
    public function wxNotify()
    {	
		// 接收post数据
    /*
    *  微信是用$GLOBALS['HTTP_RAW_POST_DATA'];这个函数接收post数据的
    
    
        
			$receipt = $_REQUEST;
			if($receipt==null){
				$receipt = file_get_contents("php://input");
				if($receipt == null){
					$receipt = $GLOBALS['HTTP_RAW_POST_DATA'];
				}
			}
		
           writelog('pay','notify',serialize($receipt));
		*/
		//Vendor('WxPay.WxPayNotify');
		//writelog('pay','vendor','yinyong');die;
		libxml_disable_entity_loader(true);
		$postStr = $this->postdata();//接收post数据

        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        $arr = $this->object2array($postObj);//对象转成数组
		$sign = $arr['sign'];
        ksort($arr);// 对数据进行排序

		    //writelog('pay','notify',json_encode($arr));
			$orderno = $arr['out_trade_no'];
			$result = M('costrecord')->where(array("orderno"=>$orderno))->setField("topupstatus",1);
            if($result)
            {
                $money = $arr['cash_fee']*0.01;//账户收到金额
                $orderno = $arr['out_trade_no'];//订单号
                $userid = M("costrecord")->where(array("orderno"=>$orderno))->getField('userid');

                $balance = M("user")->where(array("userid"=>(int)$userid))->getField("balance");
                $sum =$balance+$money;
                M("user")->where(array("userid"=>$userid))->setField("balance",$sum);
            }
			//回复通知
			$res['return_code'] = 'SUCCESS';
			$res['return_msg'] = 'OK';
			$res['sign'] = $sign;
			$xml = $this->ToXml($res);
			
			writelog('pay','xml',$xml);
			echo $xml;
		    writelog('pay','sign',$sign);die;
        /*$str = $this->ToUrlParams($arr);//对数据拼接成字符串
        $user_sign = strtoupper(md5($str));
        if($user_sign == $arr['sign']){//验证成功

            //写支付记录
            // to do...
            
            //处理购买后的业务逻辑
            //to do
			writelog('pay','notify',serialize($arr));
        }*/
    }
    /*
    *  微信是用$GLOBALS['HTTP_RAW_POST_DATA'];这个函数接收post数据的
    */
   public function postdata(){
        $receipt = $_REQUEST;
        if($receipt==null){
            $receipt = file_get_contents("php://input");
            if($receipt == null){
                $receipt = $GLOBALS['HTTP_RAW_POST_DATA'];
            }
        }
        return $receipt;
    }
	
	/**
	*银联支付回调 $_POST接收 后台
	*/
	
	public function back_bpay(){
		//验证签名
		//writelog('pay','bank','银联支付回调');
		if(isset($_POST['signature'])){
				writelog('pay','bank',serialize($_POST));
				$falg = \Bank\Config\AcpService::validate($_POST) ? 1 : 0;
				writelog('pay','bank',$falg);
				$orderId = $_POST ['orderId']; //其他字段也可用类似方式获取
				$respCode = $_POST ['respCode']; //判断respCode=00或A6即可认为交易成功
				$respMsg = $_POST['respMsg']; //判断支付是否成功
				$txnAmt = $_POST['txnAmt']; //交易金额，单位分
				
				if(!$falg){
					writelog('pay','bank','银联支付回调 签名验证失败');die('100');
				}
				writelog('pay','bank','银联支付回调 签名验证成功');
				if($respCode == '00' || $respCode == 'A6')
				{	
					//支付成功 插入数据
					$money = $txnAmt*0.01;//账户收到金额
					$orderno = $orderId;//订单号
					$result = M('costrecord')->where(array("orderno"=>$orderno))->setField("topupstatus",1);
					if($result){
						$userid = M("costrecord")->where(array("orderno"=>$orderno))->getField('userid');
						$balance = M("user")->where(array("userid"=>(int)$userid))->getField("balance");
						$sum =$balance+$money;
						M("user")->where(array("userid"=>$userid))->setField("balance",$sum);
						writelog('pay','bank','银联支付:'.$respMsg);
					}
				}else{
				   writelog('pay','bank','银联支付:'.$respMsg);
				}
			}else{
				writelog('pay','bank','银联支付签名失败:');
			}
	}
    
    //把对象转成数组
    public function object2array($array) {
		if(is_object($array)) {
			$array = (array)$array;
		} if(is_array($array)) {
			foreach($array as $key=>$value) {
				$array[$key] = $this->object2array($value);
			}
		}
		return $array;
    }
    
    
     /**
     * 格式化参数格式化成url参数
     */
    public function ToUrlParams($arr)
    {
        $weipay_key = 'tianjijituantianjijituantianjiji';//微信的key,这个是微信支付给你的key，不要瞎填。
        $buff = "";
        foreach ($arr as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff.'&key='.$weipay_key;
    }
	
	/**
	*转化XML
	*/
	public function ToXml($arr){
		
		/*转化XML*/
			if(!is_array($arr)
            || count($arr) <= 0)
			{
				throw new WxPayException("数组数据异常！");
			}

			$xml = "<xml>";
			foreach ($arr as $key=>$val)
			{

				if (is_numeric($val)){
					$xml.="<".$key.">".$val."</".$key.">";
				}else{
					$xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
				}
			}
			$xml.="</xml>";
			return $xml;
	}
	
}