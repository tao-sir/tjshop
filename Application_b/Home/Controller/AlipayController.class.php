<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 14:26
 */
namespace Home\Controller;
use Think\Controller;
use Home\Controller\PublicController;
//use Lib\Alipay\AlipayTradeService;
//use Lib\Alipay\AlipayTradeWapPayContentBuilder;
use Lib\Alipay\AopClient;
use Lib\Alipay\AlipayTradeWapPayRequest;
class AlipayController extends Controller
{
	public $config = array (	
		//应用ID,您的APPID。
		'app_id' => "2017062407557706",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "",
		
	
	);

	public function alipay()
    {
		echo 123123;
		writelog("pay",2,'');exit;
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
        $request->setReturnUrl("http://tt.qiantianzc.com:8086");
        $request->setNotifyUrl("http://tt.qiantianzc.com:8086/tjshop/index.php/Home/Alipay/orderRecord");
        $request->setBizContent("{" .
            "    \"body\":\"对一笔交易的具体描述信息。如果是多种商品，请将商品描述字符串累加传给body。\"," .
            "    \"subject\":\"测试\"," .
            "    \"out_trade_no\":\"70501111111S001111115\"," .
            "    \"timeout_express\":\"90m\"," .
            "    \"total_amount\":0.01," .
            "    \"product_code\":\"QUICK_WAP_WAY\"" .
            "  }");
        $result = $aop->pageExecute ( $request);
        echo $result;
    }

    public function orderRecord()
    {
        writelog("pay",2,"aaa=".serialize(I()));
    }
}