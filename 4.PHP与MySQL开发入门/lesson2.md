# PHP与MYSQL开发入门(中)
#### [参考连接](https://www.cnblogs.com/52php/p/5658145.html)
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
    析构函数允许在销毁一个类之前执行的一些操作或完成一些功能
    析构函数不能带有任何参数。
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

    与封装有关的魔术方法
    魔术方法__set()
      public function __set($key, $value) {
        //魔术方法的set 只针对private protected的变量
        echo $key. ">>>>>>" .$value;
        if($key == "name" && $value == "laowang") {
          $this -> name = "xiaowang";
        }  
      }
    魔术方法__get()
      public function __get($key) {
        if ($key == "age") {
          return "girl not tell you";
        }
      }
    魔术方法__isset()
      public function __isset($key)
      {
        if($key == 'age') {
          return "private age";
        }
      }
    魔术方法__unset()
      public function __unset($key) {
        if ($key == "age") {
          unset($this -> age);
        }
      }
    
    访问类型控制
      访问权限
                        private  protected   public(默认的)

    在同一类中   可以         可以            可以
    在类的外部   不可以      不可以         可以

## 四、继承和多态
    类继承的应用
      PHP只支持单继承, 不支持多重继承。一个子类只能由一个父类,不允许一个类直接继承多个类,但一个类可以被多个类继承
      可以有多层继承,即一个类可以继承一个类的子类,如类B继承了类A,类C又继承了类B,那么类C也间接继承了类C
      class A {
        ......
      }
      class B extends A {
        ......
      }
    
    访问类型控制
      private 在子类中 不可以访问 
      protected 可以访问
    
    子类中重载父类方法
      在子类里面允许重写(覆盖)父类中的方法
      在子类中,使用parent访问父类中被覆盖的属性和方法

## 五、抽象类和接口
    抽象方法和抽象类
      当类中有一个方法,他没有方法体,也就是没有花括号,直接分号结束,像这种方法我们叫抽象方法,必须使用abstract定义。
      如: public abstract function fun();
        包含这种方法的类必须是抽象类也要使用关键字abstract加以声明。(即使用关键字abstract修饰的类为抽象类)
      抽象类的特点:
        不能实例化,也就是不能new成对象
        若想使用抽象类,就必须定义一个类去继承这个抽象类,并定义覆盖父类的抽象方法(实现抽象方法)
    接口技术 
      PHP与大多数面向对象编程一样,不支持多重继承,也就是说每个类只能继承一个父类.为了解决这个问题,PHP引入了接口,接口的思想是指一个实现了该接口的类必须实现的一系列函数。

      定义接口
        interface 接口名称  {
          //常量成员 (使用const关键字定义)
          //抽象方法 (不需要使用abstract关键字)
        }
      使用格式 class 类名 implements 接口1,接口2{......}

      区别
        当你关注一个事物的本质的时候,用抽象类
        当你关注一个操作的时候,用接口

        接口是对动作的抽象,表示这个对象能做什么,对类的局部行为进行抽象
        抽象类时对根源的抽象,表示这个类是什么,对类的整体进行抽象,对一类事物的抽象描述
        比如,男人、女人这两个类,他们的抽象类是人
        可以把吃东西定义成一个接口,然后让这些类去实现它。
        所以在高级语言上,一个类只能继承一个类(抽象类)(正如人不可能同时是生物和非生物),但可以实现多个接口(吃饭接口、走路接口)。

        1.接口是抽象类的变体,接口中所有的方法都是抽象的。而抽象类是声明方法的存在而不去实现它的类。
        2.接口可以多继承,抽象类不行。
        3.接口定义方法,不能实现,而抽象类可以实现部分方法
        4.接口中基本数据类型为static而抽象类不是的。
        5.接口中不能含有静态代码块以及静态方法,而抽象类可以含有静态方法和静态代码块。
    
    多态应用
      对象的多态性:
        是指在父类中定义的属性或行为被子类继承之后,可以具有不同的数据类型或表现出不同的行为。这使得同一个属性或行为在父类及其各个子类中具有不同的语义。
    
## 六、PHP常见的关键字
    final 关键字
      只能用来修饰类和方法 不能用final这个关键字来修饰成员属性
      final特性
        使用final关键字标识的类不能被继承
        使用final关键字标识的方法不能被子类覆盖(重写),是最终版本
      目的
        一是为了安全
        二个没必要被继承或重写

    static 关键字
      表示静态的意思,用于修饰类的成员属性和成员方法(即静态属性和静态方法)
      类中的静态属性和方法不能实例化(new)就可以直接使用类名访问
      格式:
        类::$静态属性  类::静态方法
      在类的方法中.不能this来引用静态变量或静态方法,而需要slef来引用
      格式:
        self::$静态属性   slef::静态方法
      静态方法中不可以使用非静态的内容。就是不让使用this。
      静态属性是共享的。也就是new很多对象也是共用一个属性。

    单例设计模式
      单态模式的主要作用是保证在面向对象编程设计中, 一个类只能有一个实例对象存在。

    const 关键字
      在类里面定义常量使用的是 const这个关键字
      语法：
        const CONSTANT = 'constant value'; //定义
        echo self::CONSTANT; //类内部访问
        echo className::CONSTANT; //类外部访问

    instanceof 关键字
      用来检测用于检测当前对象实例是否属于某一个类或这个类的子类

    自动加载类
      当new实例化一个不存在的类时,则自动调用此函数__autoload(),并将类名作为参数传入此函数,可以使用这个实现类的自动加载。
    
    常用函数
      class_exists -- 检查类是否已定义
      get_class --返回对象的类名
      get_object_vars --返回由对象属性组成的关联数组
      get_parent_class -- 返回对象或类的父类名
      is_a --如果对象属于该类或该类是此对象的父类则返回TRUE
      method_exists --检查类的方法是否存在
      property_exists --检查对象或类是否具该属性

## 七、PHP异常处理
    系统自带的异常处理
    自定义异常处理
    捕捉多个异常处理
      在try代码之后,必须至少给出一个catch代码块,也可以将多个catch代码块与一个try代码块关联使用。
    
    代码见 phptest/exception.php、myException.php、errortest.php

## 八、PHP与JavaScript的比较
    
    namespace命名空间

    原型链
    function Car(color) {
      this.color = color;
    }
    Car.prototype.run = function() {
      console.log(this.color + 'is run ');
    }
    function Cruze(color) {
      Car.call(this, color);
    }
    var __prototype = Object.create(Car.prototype);
    __prototype.constructor = Cruze;
    Cruze.prototype.gogo = function() {
      console.log(111);
    }
    var result = new Cruze('orange');
    console.log(result);
    var result2 = new Car('blue');
    console.log(result2);

    js常用
      function
      if else 
      while
      switch
      var
      array
      object 
      数字
      数学方法
      变量类型
      this call apply prototype

      JQuery
