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