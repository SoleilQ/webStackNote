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
    2. OO的概念以及Prototype
    3. PHP和JavaScript的比较
