# ES5核心技术

## 一、DEMO1  
    (function(){
      var a;
      alert(a); //undefined
      a = 30;
      //var a = 30;
    })()
    变量的提升

## 二、DEMO2
    this.a = 20;
    var test = {
      a:40,
      init:() => {
        console.log(this.a);
        function go() {
          this.a = 60;
          console.log(this.a)
        }
        go.prototype.a =50;
        return go;
      }
    }
    var p = test.init();
    p();
    new(test.init())()

    //1.20 p在window下声明 调用this的为window
    //2.60 p为function go()
    //3.60 

## this问题

## 三、DEMO3
    什么是闭包:
      拿到你本该不拿到的东西
      内部的私有变量 外边拿不到内部的变量
    写闭包会造成内存泄漏
      function f1() {
        var N = 0;
        function f2() {
          N += 1;
          console.log(N);
        }
        return f2;
      }
      var  result = f1();
      result(); //1
      result(); //2
      result(); //3
      result = null;//使用完后对result赋值null,这样就可以消除内存泄漏
    设置变量 放进闭包里面 被保护的机制
      function Product() {
        var name;
        this.setName = function (value) {
          name = value;
        }
        this.getName = function(){
          return name;
        }
      }
      var p = new Product();
      p.setName('hello');

## 四、面向对象
    var Car = function(color) {
      // Car.prototype.constructor = Car
      // 构造函数和初始化这个类就是一个东西了
      this.color = color;
      this.sail = function() {
        console.log(this.color + "卖13W");
      }
    };

    Car.prototype.sail = function() {
      console.log(this.color + "卖13W");
    };//构造函数中的方法 和 构造函数原型上方法的区别

    var BMW = function(color) {
      Car.call(this,color)
    };
    //按引用传递
    // new 的话是把原型链上的东西都拿过来，
    // call 的话是改变 this 的指向
    BWM.prototype = new Car() 
    var m = BWM('red');
    console.log(m);
    PS:
        (1)会导致构造函数执行两次
        (2)constructorx没有指向自己

    js中有按值传递和按引用传递
      var a = 1;
      var b = a;
      b = 2;
      console.log(b); //2

      var a = {test: 123};
      var b = a;
      b.name = 20;
      console.log(a); //{test: 123, name:20}
    1.对象、数组、原型链是按引用传递的

    2.按引用传递
      (1).拿到父类原型链上的方法
      (2).不能让构造函数执行两次
      (3).引用的原型链不能是按址引用
      (4).修正子类的constructor
      var __pro = Object.create(Car.prototype);
      __pro.constructor = Bwm;
      Bwm.prototype = __pro;
      var m = BWM('red');
      console.log(m);
      js实现面向对象

## 五、综合

    (function(){
      var a = 20;
      function a() {}
      console.log(a);

       函数提升的优先级比变量提升的优先级高
      function a() {}
      var a;
      a = 20;
      console.log(a); // 20

      var b = c = a;

      var b = 20;
      c = 20; //没有var c会变成全局变量
      //如果是var b,c = a; 外面就拿不到c
    })(); 
    console.log(c)

    //在构造函数内的a优先级比原型链上的高
    function test() {
      this.a = 20;
    }
    test.prototype.a = 30;
    var q = new test;
    console.log(q.a); //20

    var user = {
      age: 20,
      init: function () {
        console.log(this.age);
      }
    }
    var data = {age: 40};
    //bind以后返回的是一个新的函数
    var s = user.init.bind(data);
    s.init() //40

## 六、总结
    1.立即执行函数
    2.闭包 内部的函数可以访问外部函数的变量,把函数返回出去,闭包可以保护内部的变量,闭包也可能会造成内存泄漏==null;
    3.原型链
      3.1构造函数里的属性的优先级比原型链的要高
      3.2面向对象编程的时候 JS里没有类的概念 可以用函数替代
      3.3constructor 实际就是对应的函数本身
      3.4prototype 是按引用传递的 Object.create创建原型链的副本
    4.数值、字符串、布尔类型按值传递,其余都是按引用传递 对象~数组~
    5.改变this的方法 call apply bind
    6.函数提升和变量提升
      函数提升的级别要比变量高
    7.jq内部有很多经典的写法 模块化编程的概念  闭包

    function test(m) {
      m.v = 20;
      // 如果重写m  undefined
      var m = {v: 20}; 
    }
    var m = {age: 30};
    test(m);
    console.log(m.v) //20


    JS分为同步队列  异步队列
    $("#test").click(function() {
      console.log(1);
    });
    setTimeout(function(){
      console.log(2);
    })
    while(true){
      console.log(3)
    }
    只有事件操作、setTimeout、Ajax是异步队列
    绑定和延时代码虽然在同步队列代码里面,却是在异步队列里面执行的 
    while(true)则会在同步队列里面执行 等同步队列执行完才会去异步队列拉

    var list_li = document.getElementsByTagName("li");
    for (var i = 0; i < list_li.length; i++) {
      list_li[i].onclick = function() {
        console.log(i)
      }
    }
    for是同步队列
    循环对应的机制  等i执行完后,点击事件才会执行
    先执行同步,再执行异步


    模块化编程
    var module = (function() {
      var N = 5;
      function print() {  
        console.log(N);
      }
      function add(x) {
        var q = x + N;
        console.log(q)
      }
      return {
        des: "这里是一个模块",
        add: add
      }
    })();
    module.add(3);




