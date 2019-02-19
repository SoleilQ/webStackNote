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

        关系型数据库管理系统,关联数据库将数据保存在不同得表中,而不是将所有数据放在一个 大仓库内,这样就增加了速度并提高了灵活性
        LAMP  Linux Apache MySQL PHP

        phpmyadmin
        
        MySQL 增删改查

        PHP连接MySQL
          $con = mysqli_connect("localhost", "root", "");
          if(!$con) {
            die("Connection failed: " . mysqli_connect_error());
          } else {
            echo "mysql connect ok";
          }
          mysqli_close($con);

          注意乱码得问题
            mysqli_query($con, "set names 'utf8'");
            要放在所有语句之前

          <?php
          header("Content-type: application/json; charset=utf-8");
          $con = mysqli_connect("localhost", "root", "", "phplesson");
          if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
          } else {
            echo "mysql connect ok";
            mysqli_query($con, "set names 'utf8'");
            // $newstitle = $_REQUEST['newstitle'];
            // $newsimg = $_REQUEST['newsimg'];
            // $newscontent = $_REQUEST['newscontent'];
            // $addtime = $_REQUEST['addtime'];
            // $sql = "INSERT INTO `news`(`newstitle`, `newsimg`, `newscontent`, `addtime`) VALUES (
            //   '".$newstitle."', '".$newsimg."', '".$newscontent."', '".$addtime."')";
            //$sql = "DELETE  FROM `news` WHERE newsid=2";
            //$sql = "UPDATE `news` SET `newstitle`='更改的title',`newsimg`='更改的img' WHERE newsid=6";
            $sql = "SELECT * FROM news";
            // if (mysqli_query($con, $sql)) {
            //   echo "success";
            // } else {
            //   echo "Error";
            // }
            $result = mysqli_query($con, $sql);
            $arr = array();
            while($row = mysqli_fetch_assoc($result)) {
              //echo $row["newstitle"]. " " . $row["newsimg"]. "<br>";
              array_push($arr, array("newstitle"=> $row["newstitle"], "newsimg"=>$row["newsimg"]));
            }
            $result = array("errcode"=> 0, "result" => $arr);
            echo json_encode($result);
          }
          mysqli_close($con);
          ?>

          高版本的PHP  http://www.runoob.com/php/php-ref-mysqli.html
      1.4 PHP PDO快速入门
          PHP 数据对象 （PDO） 扩展为PHP访问数据库定义了一个轻量级的一致接口
          <?php 
          header("Content-type: text/html;charset=utf-8");
          $dbms = "mysql";
          $host = "localhost";
          $dbName  = "test";
          $user = "root";
          $pass = "";
          $dsn  = "$dbms:host=$host;dbname=$dbName";
          try {
            //code...
            $dbh = new PDO($dsn, $user, $pass);
            echo "连接成功<br/>";
            // foreach($dbh->query("SELECT * FROM news") as $row){
            //   print_r($row);
            // };
            $query = "INSERT INTO `news`(`newstitle`, `newscontent`) VALUES (’laoyuan‘, ’laoyuan old‘)";
            $res = $dbh ->exec($query);
            echo "数据库添加成功, 受影响得行数".$res;
            $dbh = null;
          } catch (PDOException $e) {
            die("Error:" . $e.getMessage() . "</br/>" );
          }
          ?>
          http://www.runoob.com/php/php-pdo.html
    2. OO的概念以及Prototype

    3. PHP和JavaScript的比较
