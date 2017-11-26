<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/5
 * Time: 10:53
 */
namespace Payment\Controller;
use Think\Controller;
class WeixinPayController extends Controller
{

    public function wxpay($money)
    {

        Vendor('WxPay.WxPayJsApiPay');
        Vendor('WxPay.WxPayUnifiedOrder');
        Vendor('WxPay.WxPayApi');
        Vendor('WxPay.WxPayConfig');
        Vendor('WxPay.WxPayNativePay');
        //①、获取用户openid
        $tools = new \JsApiPay();
        $openId = $tools->GetOpenid();

        //②、统一下单
        $input = new \WxPayUnifiedOrder();

        $input->SetBody("充值");
        $input->SetAttach("充值");
        $input->SetOut_trade_no(\WxPayConfig::MCHID.date("YmdHis"));
        $input->SetTotal_fee('1');
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("充值");
        $input->SetNotify_url(DOMAIN_NAME."payment.php");
        $input->SetTrade_type("JSAPI");//NATIVE MWEB JSAPI
        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);
        echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
        //P($order);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        //return $jsApiParameters;
        $this->assign("money",$money/100);
        $this->assign("jsApiParameters",$jsApiParameters);
        $this->display();
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
    public function notify()
    {
echo 13123;
    }
}