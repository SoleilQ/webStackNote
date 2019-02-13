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

## 七、Function.prototype.bind

## 八、JavaScript this的使用

## 九、JavaScript作用域和闭包

## 十、按值传递和按引用传递