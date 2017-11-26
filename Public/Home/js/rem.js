/**
 * Created by Administrator on 2017/5/12.
 */
var fs = 100
  /* fs 和你的sass 的 fs 一定要一致*/
function resize() {
    var w = document.documentElement.dataset.width
    var screenWidth = window.outerWidth?window.outerWidth:screen.width
    document.documentElement.style.fontSize = screenWidth/w * fs + 'px'
}
resize()
var t = null
window.onresize = function () {
    clearTimeout(t)
    t = setTimeout(resize,1000)
}