# 京城一灯习题集

## 1.
    <style>
      * {
        margin: 0;
        padding: 0;
        }
    </style>

    <body>
      <span>京城</span>
      <span>一灯</span>
    </body>

    A (间距)京程一灯
    B 京程(间距)一灯
    C 京程一灯
    D (间距)京程(间距)一灯

## 2.
    var big = '志佳老师';
    var obj = {
      big: "一灯",
      showBig: function() {
        return this.obj;
      }
    }
    obj.showBig.call(big);

    A 志佳老师
    B 一灯
    C undefined
    D function big() {}

## 3.
    请选择如下HTML代码在chrome中的执行结果
    <p>京程<div>一灯</div></p>

    A <p>京程<div>一灯</div></p>
    B <div>一灯</div><p>京程</p>
    C <p>京程</p><div>一灯</div>
    D <div><p>京程一灯</p></div>

## 4
    CSS中的有些属性可以让一个块级元素当成两个甚至更多去使用,节省了html数量
    
    A 这波操作没问题，我也搞过
    B这个完全没有实现的可能

## 5
    请写出以下代码的执行结果?
      Object.prototype.a  = 1;
      Function.prototype.a  = 2;
      function yideng () {}
      var ins = new yideng();
      console.log(ins.a);

    A 2
    B 1
    C 0
    D undefined

## 6
    请写出以下代码的执行结果?
      var a = "yideng";
      function test() {
        var a = "yideng2";
        var init = new Function("console.warn(a)");
        init();
      }
      test();

      A yideng
      B yideng2
      C undefined
      D a is not defined

## 7
    function yideng(a, b, c) {
      console.log(this.length);
      console.log(this.callee.length)
    }

    function fn(d) {
      arguments[0](10, 20, 30, 40, 50)
    }

    fn(yideng, 10, 20, 30)

    A 3,1
    B 4,4
    C 5,4
    D 4,1

    第一个输出结果:
      因为this当前指向的是arguments,arguments是一个伪数组具备length属性。arguments又是保存函数的实参。fn调用的时候传入4个实参。所以arguments长度为4。这个时候arguments[0]等同于arguments.yideng调用这个函数
      所以this指向的是arguments这个伪数组也是(对象)
    第二个输出结果:
      callee是arguments的一个属性,主要返回当前arguments直属的函数体。所以this.callees是返回fn。每一个函数有一个length属性主要用来返回函数的形参的所以就是1

## 8
    const pro = new Promise((resolve, reject) => {
      setTimeout(() => {
      resolve(1); 
      });
      resolve(2);
      console.log('yideng');
    })
    pro.then(res => console.log(res));
    console.log('end');

    A end yideng 2 1
    B end yidneg 1 2
    C yideng end 2 1
    D yideng end 2

    Promise属于异步队列,但是声明的阶段属于同步。所以先输出yideng,然后接下来是同步执行栈的end,接下来运行异步队列的2 setTimeout属于异步队列,此时Promise的状态已经改变故resolve无效。


## 9
    console.log( {} + []);
    {} + []

    A [Obejct Array][Object Obejct], [Object Obecjt][Obejct Array]
    B 0[obecjt Obejct], [obejct Obejct]0
    C [object Obejct], 0
    D [object Obejct], [object Object]
    
    1.{} + []: 根据语句优先原则。{}被理解成为符合语句块,因此相当于{} + [], []为空所以结果是0
    2.console.log({} + [])：js把()中语句当做是一个表达式,因此{}不能被理解为语句块而被理解成"[object Object]" + ""
    其实上面两个结果相同,原理也一样。只不过{}作为右值出现被理解为对象接量

## 10
    var f = function yideng(a) {
      yideng = a;
      console.log(typeof yideng);
      return 23;
    };
    f("京程一灯");
    console.log(typeof yideng);

    调用函数f,变量替换了yideng函数为字符串。这时理应得到的结果是string。但是是function,因为函数名yideng是只读的。所以还是函数

    函数名yideng只能在函数体内部被使用,试图在函数外部使用yideng会报错的。所以是undefined


## 11
    function fn(num) {
      console.log(this.length);
    }
    var yideng = {
      length: 5,
      method: function() {
        fn('京程一灯');
        arguments[0]();
      }
    }
    yideng.method(fn, 1);
    //0, 2

    fn('京程一灯'); 此时this指向window, fn读取window.length=0. 为什么呢? 因为window.length代表iframe数量
    argument[0]()此时代表fn内的this代表arguments,arguments代表yideng.method实参。所以结果等于2

    与试卷 第10题类似 但是要区分开


## 12
    function yideng(){}
    yideng.__proto__.__proto__.constructor.constructor.constructor
    
    A Function
    B Obejct
    C null
    D yideng
    E undefined

    yideng.__proto__ = Function.prototpye
    Function.prototpye.__proto__ = Obejct.prototype
    Obejct.prototype.constructor = Object
    Object.constructor 从 Function.prototpye去找结果是Function
    最后Function.constructor最特殊因为它的__proto__指向的是自己的prototype所以还是Function自己

## 13
    var o ={
      foo: function() {
        console.log("京程");
      },
      bar() {
        console.log("一灯");
      }
    };
    var f = o.foo.bind({});
    new f();

    var p = o.bar.bind({});
    new p();

    A 京程一灯
    B f is not a constructor, p is not a constructor
    C f is not a constructor, 一灯
    D 京程, p is not a constructor