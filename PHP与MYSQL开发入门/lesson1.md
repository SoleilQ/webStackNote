# PHP与MYSQL开发入门(上)

## 一、初识PHP和面向对象编程
    1.初始PHP
      PHP:Hypertext  Preprocessor 中文名:超文本预处理器 是一种通用开源脚本语言。语法吸收了C语言、Java和Perl的特点,利于学习,使用广泛,主要适用于Web开发领域。PHP独特的语法混合了C、Java、Perl以及PHP自创的语法。它可以比CGI或者是Perl更快速地执行动态网页。用PHP做出的动态页面与其他的编程语言相比，PHP是讲程序嵌入到HTML(标准通用标记语言下的一个应用)文档中去执行,执行效率比完全生成HTML标记的CGL要高许多;PHP还可以执行编译后的代码,编译可以达到加密和优化代码运行,使代码运行更快。

       <?php 
        echo "Hello World!"; 
      ?>

      <?php 
        $a = "测试";
        echo a; 
      ?>
      
      PHP是块级作用域
      <?php 
        if(false) {
          $a = '测试';
        }
        if(isset($a)) {
          echo "我是一个声明的";
        } else {
          echo "我没声明";
        }
      ?>

      <?php 
        $a = "我是外面的";
        function test() {
          global $a;
          echo $a;
        }
        test();
      ?>

      1.2 PHP基础操作
        $GLOBALS['a']  = "test";

        require_once('a.php');
        include_once('a.php');
        都是引入一次外部文件 但两者也有区别  include 不管有没有错仍执行
        
        <?php 
          $arrayTest = array('0' => "苹果" , 1 => "测试" );
          echo json_encode($arrayTest);
        ?>

        PHP Session  会话机制  一个页面打开 另一个页面可以获取其变量
          session_start();
          $_SESSION['views'] = 1;

        From表单
        //php设置header
        header("Context-type: text/html; charset=utf-8");
        $username = $_REQUEST['username'];
        if($username == "admin") {
          echo json_encode(array('msg' => '登陆成功', 'error_code'=> "ok" ));
        } else {
          echo json_encode(array('msg' => '登陆失败', 'error_code'=> "no" ));
        }
        
      1.3 PHP和MySQL
        MySQL 是一种数据库。数据库定义了存储信息得结构。
        在数据库中,存在着一些表。类似HTML表格,数据库含有行、列以及单元。
        在分类存储信息时,数据库非常有用。

        phpmyadmin
    2. OO的概念以及Prototype

    3. PHP和JavaScript的比较
