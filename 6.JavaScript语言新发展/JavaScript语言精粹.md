# JavaScript语言精粹

## 数据类型
    JavaScript是弱类型语言，但并不是没有类型，JavaScript可以识别下面7种不同类型的值
      1.Boolean
      2.Number
      3.String
      4.null
      5.undefined
      6.Symbol es6新加
      7.Object:Array、RegExp、Date、Math、function...
      可以使用typeof判断数据类型
        ps: typeof alert //function
            typeof numm //object

## 变量
    在应用程序中,使用变量来为值命名。变量的名称称为 indentifiers

    声明
      1.使用关键字: var:函数作用域
      2.使用关键字 let:块作用域
      3.直接使用:全局作用域

      只声明不赋值，变量的默认值是undefined
      const 声明不可变变量
    
    变量提升
        JavaScript中可以引用稍后声明的变量，而不会引发异常，这一概念称为
        变量声明提升(hoisting)
          console.log(a);//undefined
          var  a  = 2;
          等同于
            var a;
            console.log(a); //undefined
            a =2;

## 函数
    一个函数就是一个可以被外部代码调用(或者函数本身递归调用)的子程序

    定义函数
      1.函数声明
      2.函数表达式
      3.Function 构造函数
      4.箭头函数
    
    arguments
      一个包含了传递给当前执行函数参数的类似于数组的对象
      function foo() {
        return arguments;
      }
      foo(1,2,3); //Arguments[3]
    
    rest
      function foo(...args) {
        return args;
      }
      foo(1,2,3); //Array[3] [1,2,3];

    default
      函数的参数可以在定义的时候约定默认值
      function fn(a=2, b=3) {
        return a + b;
      }
      fn(2,3); //5
      fn(2); //5
      fn(3); //5

## 对象
    JavaScript中对象时可变 键控集合
    定义对象
      1.字面量
      2.构造函数
        构造函数和普通函数并没有区别,使用new关键字调动就是构造函数,使用构造函数可以实例化一个对象

        函数的返回值有两种可能
          1.显式调用return 返回return后表达式的求值
          2.没有调用return返回undefined
        
        构造函数返回值
          1.没有返回值
          2.简单数据类型
          3.对象类型
          前两种情况构造函数返回构造对象的实例,实例化对象正是利用的这个特性
          第三种构造函数和普通函数表现一致,返回return 后表达式的结果

## prototype
    1.每个函数都有一个prototype的对象属性,对象内有一个constructor属性,默认指向函数本身
    2.每个对象都有一个__proto__ 的属性,属性指向其父类型的prototype

## this和作用域
    作用域可以通俗的理解
      1.我是谁
      2.我有哪些马仔
    其中我是谁的回答就是this
    马仔就是我的局部变量

    this场景
      普通函所
        1.严格模式：undefined
        2.非严格模式：全局对象
          1.Node:global
          2.浏览器:window
      构造函数：对象的实例
      对象方法：对象本身
    
## call & apply
    1.fn.call(context,arg1,arg2,....argn);
    2.fn.apply(context, args);'

    function inNumber(obj) {
      return Object.prototype.toString.call(obj) === '[object Number]';
    }

## Function.prototype.bind
    bind 返回一个新函数,函数的作用域为bind参数
    function fn() {
      this.i = 0;
      setInterval(function(){
        console.log(this.i++);
      }.bind(this), 500);  
    }
    fn();

## () => {}
    箭头函数,拥有词法作用域和this值
     function fn() {
        this.i = 0;
        setInterval(() => {
          console.log(this.i++);
        }, 500);  
      }
      fn();

## 继承
    在JavaScript的场景，继承有两个目标，子类需要得到父类的：
        1.对象的属性
        2.对象的方法
          function inherits(child, parent) {
            var _prototype = Obejct.creat(parent.prototype);
            //没有这一步  子类的constructor还是父类的constructor
            _prototype.constructor = child;
            child.prototype = _prototype;
          }
          function People(name, age) {
            this.name = name;
            this.age = age;
          }
          People.prototype.getName = function() {
            return this.name;
          }
          function English(name, age, language) {
            People.call(this, name, age); //不需要重写
            this.language = language;
          }
          inherits(English, People);
          English.prototype.introduce = function() {
            console.log(this.getName());
            console.log(this.language);
          }
          var en = new English('Byron', 26, 'English');
          en.introduce();

## class与继承

## 语法
    label statement

    语句与表达式
      语句优先
      var x = {a:1};
      {a:1} //语句块 结果是1
      {a:1, b:2} // error
    
    立即执行函数
      //函数声明
      function test() {

      }
      //函数表达式
      var test = function() {

      }
      //匿名函数
      function() {

      }

      要想立即函数能够做到立即执行
        1.函数体后面要有小括号
        2.函数体必须是函数表达式，而不能是函数声明
      ( function(){} )(); //使用()运算符

      ( function() {} () ); //使用()运算符 
      [ function() {}() ];  //使用[]运算符
      
      ~function() {} ();  //使用~运算符
      !function() {} ();  //使用~运算符
      +function() {} ();  //使用+运算符
      -function() {} ();  //使用-运算符

      delete function() {} ();
      typeof function() {} ();
      void function() {} ();
      new function() {} ();
      new function() {};

      var f = function() {} ();

      1, function() {} ();
      1 ^ function() {} ();
      1 > function() {} ();
      这些运算符的作用就是将匿名函数或函数声明转换为函数表达式

## 高阶函数
    高阶函数是把函数当做参数或者返回值是函数的函数

    回调函数
      [1,2,3,4].forEach(function(item) {
        console.log(item);
      });

    闭包
      闭包由两部分组成
        1.函数
        2.环境：函数创建时作用域内的局部变量
      闭包不能滥用
    
    惰性函数


    柯里化
      一种允许使用部分参数生成函数的方式
      function isType(type) {
        return function(obj) {
          return Object.prototype.toString.call(obj) === '[object'+type+']'
        }
      }
      var isNumber = isType('Number');
      console.log(isNumber(1));
      console.log(isNumber('s'));

      var isArray = isType('isArray');

    尾递归
      1.尾调用是指某个函数的最后一步是调用另一个函数。
      2.函数调用自身，称为递归。
      3.如果尾调用自身，就成为尾递归。

      递归很容易发生"栈溢出"错误(stack overflow);
    
    反柯里化