##  一.编辑器的配置  
    font-family:Comic Sans MS  
## 二.前端跨域有几种方案  
### 1.同源策略  
#### [参考连接](http://www.ruanyifeng.com/blog/2016/04/same-origin-policy.html)  
    1.目前,所有浏览器都实行这个政策.   
    2.所谓"同源"指的是"3个相同"：  
        *协议相同  
        *域名相同  
        *端口相同  
        例如：http://www.example.com/dir/page.html   协议是http://   域名是www.example.com  端口是80(默认端口可省略)  
              http://www.example.com/dir/other.html 同源  
              http://example.com/dir/other.html 不同源(协议不同)  
              http://v2.www.example/dir/other.html 不同源(域名不同)
              http://www.example.com:81/dir/other.html 不同源(端口不同)  
    3.目的：  
        为了保证用户信息安全,防止恶意的网站窃取数据  
        浏览器不同的域名不能访问对应的cookie,但是内部的表单没有限制  
    4.范围(跨域)：  
        (1) Cookie、LocalStorange和 IndexDB 无法读取  
            Cookie是服务器写入浏览器的一小段信息,只有同源的网页才能共享  
        (2) DOM无法获得  
        (3) Ajax请求不能发送  
        
        扩展:  
            .LocalStorage: 用于本地存储, key:value   总容量5M 同步 一旦超过2.5M的时候就会出现性能的问题  异步js  域名存储  
            .SessionStorage 会话间的机制 一旦关闭浏览器 就被清除  
            .IndexDB Web SQL 关系型数据库 容量50M左右 异步 可以通过js操作  
                [参考链接](https://www.cnblogs.com/ljwsyt/p/9760266.html) 
            .Cookie  kb算  
                两个网页一级域名相同,只是二级域名不同,浏览器允许通过设置doucment.domain共享cookie
    5.如何设置同源策略(hosts)
        test.xxx.com a.html
        <script>
            document.domain = 'example.com'; //设置同源策略
            document.cookie = "test1.hello"
        </script>
        test2.xxx.com b.html
        <script>
            doucment.cookie
        </script>
        domain = .example.com; 最最实用得策略

        img特殊,可以实现跨域的机制

        Ajax

        jsonp原理
            <script type="text/javascript" src="http://www.sss.com/index.php?callback=test"></script>
            php
                if(callback) {
                    callback({"data": 123})
                    test( {"data": 123} )
                } else {
                    {"data": 123}
                }
            <script>
                function test(data) {
                    //data = {123}
                    console.log(data)
                }
            </script>

        //测试一下手机的网速 webapp页面 根据这个网速 可以给用户出一些网速比较慢的解决方案
        //直接跳转到简版  三button 图片 视频
        var s = new Image();
        var start = Date.now();
        s.src="http://www.baidu.com/s.gif";
        s.onload =  function(){
            var end = Date.now();
            t = end - start;
            v = "1.1" / t  = "kb/s"; 
        }
    
    6.css攻击(了解)

    7. 怎么突破同源策略
            html标签
            img  iframe script(jsonp) link(background)

## 二、HTML语义化
    1. 使用div进行布局,不要用div进行无意义的包裹 span行内常见的元素
    2. html5 标签
    3.尽量少写html  第一减少dom渲染的时间 浪费整个文件的大小  ::after ::before 一个html最次最次三个元素 

## 三、高阶  
    1.postMessage(iframe image) 
    2.websocket
    3.代码写进图片