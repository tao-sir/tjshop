<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 19:30
 */
?>
<script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall() {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            <?php echo I("jsApiParameters"); ?>,
            function (res) {
                WeixinJSBridge.log(res.err_msg);
                alert(res.err_code + res.err_desc + res.err_msg);
            }
        );
    }
    window.onload=function() {
        function callpay() {
            if (typeof WeixinJSBridge == "undefined") {
                if (document.addEventListener) {
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                } else if (document.attachEvent) {
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            } else {
                jsApiCall();
            }
        }
		callpay();
    }
</script>
