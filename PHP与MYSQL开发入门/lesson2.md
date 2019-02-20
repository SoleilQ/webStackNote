# PHP与MYSQL开发入门(中)

## 一、PHP面向对象的介绍
    1.面向对象的产生
        软件危机的产生
          软件危机是指落后的软件生产方式无法满足迅速增长的计算机软件需求。泛指在计算机软件的开发和维护过程中所遇到的一系列严重的问题。
        软件工程学
          是一门研究用工程化方法构建和维护有效的、实用的和高质量的软件的学科。分为结构化方法(按软件周期分为三个阶段 分析、设计、编程)和面向对象

        OOP(Object-Oriented Programming,面向对象编程)使其编程的代码更简洁、更易于维护,并且具有更强的可重用性。
        OOP达到了软件工程的三个目标:重用性、灵活性、扩展性
        OOP面向对象编程的特点:封装、继承、多态

    2.类与对象之间的关系
      类是大的概念
      对象是具体小的实体
      new  类产生
      早期的js 没有class   

    3.认识面向对象
      面向对象的三个主要特性:
        对象的行为
        对象的状态
        对象的标识
      
    4.如何抽象一个类
      类的声明
        简单格式:
          [修饰符]class 类名 { //使用class关键字加空格后加上类名
            [成员属性] //也叫成员变量

            [成员方法] //也叫成员函数
          }
        完整格式:
          [修饰符]class 类名[extends父类][implements 接口1 [,接口2...]] {
            [成员属性] //也叫成员变量

            [成员方法] //也叫成员函数
          } 
      成员属性
        格式: 修饰符 $变量名[=默认值]; //如: public $name = "zhangsan";
        注意:成员属性不可以是带运算符的表达式、变量、方法或函数调用。

        public $var3 = 1+2; //错误格式
        public $var4 = self::myStaticMethod(); //错误格式
        public $var5 = $myVar; //错误格式

        正确的定义方式:
          public $var6 = 100; //普通数值(4个标量: 整数、浮点数、布尔、字串)
          public $var6 = myConstant; //常量
          public $var7 = slef::classConstant; //静态属性
          public $var8 = array(true, false); //数组
      成员方法
        [修饰符]function 方法名(参数...) {
          [方法体]
          [return 返回值]
        }

        public function say() {
          echo "人在说话"
        }
    
    5. 通过类实例化对象
      实例化对象
        当定义好类后, 我们使用new 关键字来生成一个对象
          $对象名称 = new 类名称();
          $对象名称 = new 类名称([参数列表]);
      对象中成员的访问
        $引用名 = new 类名(构造函数);
        $引用名->成员属性=赋值; //对象属性赋值
        echo $引用名->成员属性; //输出对象的属性
        $引用名->成员方法(参数); //调用对象的方法
      特殊对象引用$this
        <?php
        /**
        * 类的声明
        */
        class Person
        {
          public $age;
          public function say($word)
          {
            echo "she say {$word}";
          }
          public function info()
          {
            $this->say("Hi");
            return $this->age;
          }
        }
        $xiaohong = new Person();
        $xiaohong->age = 22;
        $age = $xiaohong->info();
        echo '<br/>';
        echo $age;
        ?>
    
    6.课程总结
      了解类与对象
      如何抽象一个类
      如何通过类实例化对象

## 二、构造方法与析构方法
    构造方法
      [修饰符] function __construct([参数]) {
        程序体
      }
    构造方法实例

    
    析构方法
      [修饰符]function __ destruct([参数]) {
        程序体
      }
    析构方法实例

    <?php
    /**
    * 本demo为了测试构造方法和析构方法
    */
      class Person
      {
        public function __construct($name, $age) 
        {
          //dang这个类new的时候自动执行的
          echo('hello' .$name);
          echo "<hr/>";
          $this -> name = $name;
          $this -> age = $age;
        }
        public function data() {
          return $this -> age;
        }
        public function __destruct() {
          //用途 可以进行资源的释放操作  数据库关闭 读取文件关闭。。
          //对象被销毁的时候执行 没有代码再去运行了
          echo "bye bye {$this -> name}";
          echo "<br/>";
        }
      }
      new Person('first', 30);
      new Person('second', 30);
      
    ?>

## 三、PHP面向对象之封装性
    设置私有成员与私有成员访问
      封装的修饰符
        封装性是面向对象编程中的三大特性之一,封装就是把对象中的成员属性和成员方法加上访问修饰符,使其尽可能隐藏对象的内部细节,以达到对成员的访问控制(切记不是拒绝访问)。

        public (公有的 默认)
        private (私有的)
        protected (受保护的)

      设置私有成员
        使用private关键字修饰就是实现了对成员的私有封装。
       
      访问私有成员
        封装后的成员在对象的外部不能直接访问,只能在对象的内部方法中使用$this访问

        class Person {
          private $name;
          public function say() {
            return $this -> name;
          }
        }
      
      <?php
        /**
        * 定义一个类 学习public private protected
        */
      class Person {
        public $name = "zhijia"; //公有的
        private $age = 27; //私有的
        protected $money = 10; //受保护的

        //私有的成员方法 不能在类外部直接被访问
        private function getAge() {
          return $this -> age;
        }
        //被保护的成员方法 不能在类的外部直接被访问
        protected function getMoney() {
          return $this -> money;
        }
        public function userCard() {
          echo "age->".$this -> getAge() ."money->". $this -> getMoney();
        }
      }
      $xw = new Person();
      echo $xw -> userCard();
      ?>
    魔术方法__set()

    魔术方法__get()

    魔术方法__isset()

    魔术方法__unset()