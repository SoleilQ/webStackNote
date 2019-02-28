# EcmaScript5.1新增语法
#### [参考连接](https://www.zhangxinxu.com/wordpress/2012/01/introducing-ecmascript-5-1/)
## 一、EcmaScript5.1简介
    EcmaScript5.1(或仅ES5)是ECMAScript(基于JavaScript的规范)标准最新修正。ES5还引入了一个语法的严格变种,被称为"严格模式(strict mode)"。
## 二、浏览器支持
    所有5大浏览器都支持ES5
    Opera 11.60
    Internet Explorer 9*   有些情况兼容IE8*
    Firefox 4
    Safari 5.1**
    Chrome 13

    *IE9不支持严格模式--IE10添加
    **Safari 5.1 仍不支持 Function.prototype.bind

    ES5shim 旧浏览器支持
## 三、严格模式
    严格模式给作者提供了选择一个限制性更强语言变种的方式--给作者提供额外的可靠性给用户提供额外的安全性

    在JS文件或者函数的顶部添加"use strict"即可启用严格模式

    "use strict"  //全局
    
    function strict() {
      "use strict" //函数内部
      //...
    }
    在严格模式下运行脚本，不少导致提醒或buggy行为的事情会抛出错误，例如：
      未声明的变量赋值抛出一个ReferenceError, 而不是创建一个全局变量。
      不止一次对对象字面量分配相同的属性会抛出SyntaxError.
      使用with语句抛出SyntaxError.

      https://msdn.microsoft.com/zh-cn/library/br230269(v=vs.94).aspx

      1.变量
      2.只读属性
      3.delete
      4.重复参数名
      5.this  当this的值为null或undefined时,该值不会转换为全局对象
## 四、JSON格式
    JSON.parse  反序列化
      JSON.parse(text [, reviver])
      var result = JSON.parse('{"a": 1, "b": "2"}'); ///Object
      result.b //"2"

    JSON.stringify(value [, replacer [, space]])
      var mike = JSON.stringify({mike: "taylor"})
      mike //'{"mike": "taylor"}'
      typeof mike //string

    如果我们需要改变字符串化的方式,或是对我们选择的提供滤镜,我们可以将其传给replacer函数
      var nums = {
        "first": 7,
        "second": 14,
        "third": 13
      }

      var luckyNums = JSON.stringify(nums, function(key, value){
        if (value == 13) {
          return undefined;
        } else {
          return value;
        }
      },2); //数字改变  可以用于nodejs日志格式化
      console.log(luckyNums) //'{"first": 7, "second": 14}'
## 五、添加对象
    Object附加方法
      Object.create 创建对象的副本
      Object.keys  拿到Object所有的值
      ......
    这些新增的好处之一是对象的属性有了更多的控制，例如哪些是允许被修改的，哪些是可以枚举的，哪些是可以删除的等。

     var nums = {
      "first": 7,
      "second": 14,
      "third": 13
    }
    var test = Object.keys(nums);
    console.log(test); //["first", "second", "third"]
    for (var i = 0; i < test.length; i++) {
      console.log(nums[test[i]]);  // 7 14 13
    }

    var nums2 = Object.create(nums);
    console.log('nums', nums); //nums {first: 7, second: 14, third: 13}
    console.log('nums2', nums2);  //nums2 {}

    Object.create()方法创建一个拥有指定原型和若干个指定属性的对象

    var nums2 = function() {
      
    }
    nums2.prototype = Object.create(nums);
    var  _num = new nums2;

    Object.observe()

    官方文档
    https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object
## 六、额外的数组
    Array.prototype.indexOf
    Array.prototype.lastIndexOf
    Array.prototype.every
    Array.prototype.some
    Array.prototype.forEach
    Array.prototype.map
    Array.prototype.filter
    Array.prototype.reduce
    Array.prototype.reduceRight

    Array,isArray 直接写在了Array构造器上,而不是prototype对象上
      Array.isArray("NO U "); //false
      Array.isArray(["NO", "u"]); //true
    
    var sum = "";
    [1,2,3,4].forEach(function(item, index, array) {
      console.log("数组项", item , "索引"); //true
      sum += item;
    });
    //对于古董级浏览器,比如IE6--IE8
    if(tyopof Array.prototype.forEach != 'function') {
      Array.prototype.forEach = function() {
        /* 实现 */
      }
    }

    map 处理数组中的所有值并返回处理后的值,不影响原数组,返回结果为新的数组

    filter 数组元素过滤,把返回true的汇集成新的数组,返回结果为新的数组

    some 找到数组中第一个符合要求的值就不再继续执行
    用来判断数组中是否符合要求的值,返回结果true | false

    every 匹配每一个元素,直到有一个返回false为止

    indexof  lastindexof

    二维数组扁平化  reduce
## 七、Function.prototype.bind
    返回一个函数对象 该函数对象的this 绑定到了thisArg参数上.从本质上讲,这允许你在其他对象链中执行一个函数

    //this的值被bind改变
    function locate() {
      console.log(this.location);
    }

    function Maru(location) {
      this.location = location;
    }

    var kitty = new Maru('my location');
    //kitty 就是this的改变者
    var locateMaru = locate.bind(kitty);
    locateMaru(); //my location

    locate.apply(kitty); //my location call
## 八、JavaScript this的使用
  //谁调用指谁
    this.m = 100;
    function test() {
      alert(this.m);
    }
    test(); // window.test();  //100

    this.m = 1000;
    var obj = {
      m:100,
      test: function() {
        alert(this.m);
        return function() {
          alert(this.m);
        }
      }
    }
    obj.test(); //100
    (obj.test())();
    var t = obj.test();
    t(); //window.t();
    //里面这个function指向到了外面的window

    var style ={
      color: 'green'
    }
    test(); //window.test(); //green
    function test() {
      alert(this.style.color);
    }
    document.getElementById('test').onclick = test;  //red

    this.a = 1000;
    function test() {
      this.a = 1;
    }
    test.prototype.geta = function() {
      return this.a;
    }
    var p = new test;
    console.log(p.geta()); //1
## 九、JavaScript作用域和闭包
     //test() 写这里也能执行
    function test() {
      if (false) {
        var i = 10;
      }
      console.log(i); // undefined
      console.log(j); //Uncaught ReferenceError: j is not defined
    }
    test();
    //js是函数级别作用域 在内部的变量 内部都能访问 外部不能访问内部的变量  内部能访问外部的

    var j = 1000;
    function test() {
      if (false) {
        var i = 10;
      } else {
        var t = 100;
      }
      console.log(j); // 100
    }
    //console.log(t); //Uncaught ReferenceError: t is not defined

    //~转换成表达式
    var j = 1000;
    ~(function test() {
      console.log(j); / 100
    })();

    function test() {
      var k = 1000;
      return function() {
        return k;
      }
    }
    var t = test()();
## 十、按值传递和按引用传递
    //按值传递
    function test(num) {
      //这里对num这个变量创建了一个内存的副本
      var num = num + 1;
      return num;
    }
    var num = 1;
    alert(test(num)); // 2
    alert(num); //1

    //按引用传递
    var obj = {
      name: 'xiaoming'
    }
    function test(obj) {
      obj.age = '20';
      //当前obj对内存的这个地址指向同一个
      console.log('内部obj', obj);
    }
    test(obj);
    console.log('外部obj', obj);  //外部的变量被改变

    //js 对象 object  array
    //按值 sting number boolean

