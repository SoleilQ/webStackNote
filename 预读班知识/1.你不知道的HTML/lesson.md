##  一.编辑器的配置  
    font-family:Comic Sans MS  
## 二.前端跨域有几种方案  
### 1.同源策略  
      目前,所有浏览器都实行这个政策.   
      所谓"同源"指的是"3个相同"：  
          协议相同  
          域名相同  
          端口相同  
          例如：http://www.example.com/dir/page.html   协议是http://   域名是www.example.com  端口是80(默认端口可省略)  
                http://www.example.com/dir/other.html 同源  
                http://example.com/dir/other.html 不同源(协议不同)  
                http://v2.www.example/dir/other.html 不同源(域名不同)
                http://www.example.com:81/dir/other.html 不同源(端口不同)  
      目的：  
          为了保证用户信息安全,防止恶意的网站窃取数据  
          浏览器不同的域名不能访问对应的cookie,但是内部的表单没有限制  
      范围(跨域)：  
          (1) Cookie、LocalStorange和 IndexDB 无法读取  
              Cookie是服务器写入浏览器的一小段信息,只有同源的网页才能共享  
          (2) DOM无法获得  
          (3) Ajax请求不能发送  
          扩展:  
            .LocalStorage: 用于本地存储, key:value   总容量5M 同步 一旦超过2.5M的时候就会出现性能的问题  异步js  域名存储  
            .SessionStorage 会话间的机制 一旦关闭浏览器 就被清除  
            .IndexDB Web SQL 关系型数据库 容量50M左右 异步 可以通过js操作  
              https://www.cnblogs.com/ljwsyt/p/9760266.html  
            .Cookie  kb算  