# JQuery技术内幕
## 一、
    (function(window, undefined) {
      // undefined 在外面是关键字，在里面就是undefined变量
      undefined = 42;
      alert(42)	// 42
    })(window);
    undefined = 42;
    alert(undefined);	// undefined;

    闭包保护内部的变量

## 二、
    var s = new $('.test');
    var q = $('.test');
    // s 和 q 的原型链不一样，但是取出来的东西是一样的。

## 三、jQuery源码第一句
    //new的话 s 能够访问jq的原型链所有方法
    //不new的话 q也能够访问jq的原型链上的所有方法 -> val()
    //new jQuery
    //1.构造函数 2.prototype的方法
    // new 第一步 返回一个init的函数 原型链上挂载了一个init的函数 没有主动的执行
    //init没调用 被搁置了
    //构造函数内部的return new
    // jQuery.prototype
    (function (window, undefined) {
      var jQuery = function (selector, context) {
        //默默的给做了一个new  相当于new  jQuery.prototype
        //又相当于return new jQuery
        return new jQuery.fn.init(selector, context);
      }
      jQuery.fn = jQuery.prototype = {
        init: function (selector, context) {

        }
      }
      jQuery.fn.init.prototype = jQuery.fn;
      // jQuery.fn.init.prototype = jQuery.fn = jQuery.prototype ???
      // 为什么绕？ 有什么好处?
      // 绝妙的地方
      // 要把 jQuery.fn.init.prototype 给绕出来

      //jQuery.fn.init.prototype = jQuery.fn = jQuery.prototype;
      //jQuery.fn.init = jQuery;

      // new jQuery.fn.init 相当于 new 自己
      
      // new 自己就好了，为什么就要绕？
      // 为了得到 jQuery 原型链的方法。jQuery.fn上拥有原型链上的所有方法
    })(window);

    jQuery.fn.extend; 把对应的属性直接挂载到jq原型链上
    jQuery.extend; 挂载到jquery对象上
   
    jQuery.fn.extend({
      a: function() {
        console.log(123)
      }
    });
    $('').a(); 

    jQuery.extend({
      s:123
    })
    $.s

## 四、jQuery链式调用
    var s = {
      a: function() {
        console.log('first');
        return this;//s
      },
      b: function() {
        console.log('second');
        return this;
      },
      c: function() {
        console.log('three');
      }
    }
    s.a().b().c(); //jQuery链式调用

## 五、
    事件代理
    $('body').append('<div class="test"></div>');
    $('body').on('click', '.test', function() {
        
    });

    on 或者live是怎么实现的?
    function live(targetObejct, type, fn) { //元素类型,事件类型,执行函数
      document.onclick = function (event) {
        var e = event ? event : window.event;
        alert(1);
        var target = e.srcElement || e.target;
        if (e.type == type && target.tagName.toLocaleLowerCase() == targetObejct) {
          alert(3);
          fn(); // 如果元素类型和事件类型同时匹配,则执行函数
        }
      }
    }
    //实例:将所有的td(包括后续js添加的)绑定click事件
    live("td", "click", function() {
      alert("live");
    })

## 六、
    // $('.test').val() //取值
    // $('.test').val("test") //赋值 

    // $([".test", "#id"])
    // $() ->函数 函数的重载

## 七、函数的重载
    //很巧妙  闭包缓存变量
    //old undeined obj.find ->find0
    //old find0      obj.find -> find1
    function addMethod(obj, name, f) {
      var old = obj[name]; //第一次 undefined
      obj[name] = function () {
        if (f.length === arguments.length) {
          //this -> obj
          return f.apply(this, arguments);
        } else {
          return old.apply(this, arguments);
        }
      }
    }
    var people = {
      name: ["张三", "李四", "王二麻"]
    }
    var find0 = function () {
      return this.name;
    }
    var find1 = function (name) {
      var arr = this.name;
      for (var i = 0; i <= arr.length; i++) {
        if (arr[i] == name) {
          return arr[i] + "在" +i+ "位"
        }
      }
    }
    addMethod(people, 'find', find0);
    console.log(people.find()); // ["张三", "李四", "王二麻"]

    function test(a) {
      console.log('实参个数'+ arguments.length); //0
      console.log('形参个数'+ test.length); //1
    }
    test();

## 八、短路表达式
    ||
    &&

## 九、技巧
    core_version = "1.19.2";
    // version: core_version
    core_Trim = core_version.trim;

    trim: function(data){
        return core_Trim(data);
    }

## 十、钩子机制
    $.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(i, name) {
    class2type["[object " + name + "]"] = name.toLocaleLowerCase();
    })

    var data = {
      index1: 1,
      index2: 2
    }

    var s = "index1";

    data[s]&&functuon() {}

## 十一、$.ready
