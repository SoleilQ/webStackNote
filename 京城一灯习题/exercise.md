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