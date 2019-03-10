# 小试牛刀

## 1
    var yideng = {
      bar: function () {
        return this.baz
      },
      baz: 1
    };
    (function() {
      console.log(typeof arguments[0]()); 
    })(yideng.bar)
    //undefined

## 2
    function test() {
      console.log('out');
    };
    (function () {
      if(false) {
        function test() {
          console.log('in');
        }
      }
      test();
    })();
    //test is not a function

## 3
    var x = [typeof x , typeof y][1]; // ['undefined', 'undefined']  typef undefined = 'undefined'
    console.log(typeof x);
    //string

## 4
    (function(x) {
      delete x; //delete可以删除对象属性  直接用delete删除不了变量
      return x; //1
    })(1);

## 5
    var x = 1;
    if(function f() {} ){
      x += typeof f;  // 1 + 'undefined'
    }
    x; // '1undefined'

## 6 不太理解
    function f() {
      return f;
    }
    new f() instanceof f; //instanceof运算符用于测试构造函数的prototype属性是否出现在对象的原型链中的任何位置
    //false

## 7
    Object.prototype.a = 'a';
    Function.prototype.a = 'a1';
    function Person() {}; //Person.prototype  == Object
    var yideng = new Person(); 
    console.log(yideng.a);
    // a

## 8 ****************
    var yideng = [0];
    if(yideng) {
      console.log(yideng == true);
    } else {
      console.log('yideng');
    }

## 9
    function yideng() {
      return 
      {
        a:1
      }
    };
    var result  = yideng();
    console.log(result.a); 
    // result  undefined
    // Uncaught TypeError: Cannot read property 'a' of undefined

## 10 *************************** 不会
    const timeout = ms => new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve();
      }, ms);
    });

    const ajax1 = () => timeout(2000).then(() => {
      console.log('1');
      return 1;
    });
    const ajax2 = () => timeout(1000).then(() => {
      console.log('2');
      return 2;
    });
    const ajax3 = () => timeout(2000).then(() => {
      console.log('3');
      return 3;
    });

    const mergePromise = (ajaxArray) => {
      //1, 2, 3 done [1,2,3] 此处请写代码 请写出ES6、ES5 2中解法】
    }

    mergePromise([ajax1, ajax2, ajax3]).then(data => {
      console.log('done');
      console.log(data); // data 为 [1,2 ,3]
    });
    //执行结果为1, 2, 3 done [1,2,3]

## 11
    <script>
      yideng
      console.log(1);  //yideng is not defined
    </script>
    <script>
      console.log(2); //2
    </script>
    JS是按照代码块来进行编译和执行的，代码块间相互独立，但变量和方法共享。

## 12
    var yideng = Array(3); // [空, 空,空]
    yideng[0] =2;
    var result = yideng.map(function(elem) {
      return '1';
    })
    console.log(result); ['1', 空,空]
    map返回一个新数组  不改变原数组

## 13   不会
    while(1) {
      switch('yideng') {
        case 'yideng':
        //禁止直接写一句break;
      }
    }
    //请修改代码能够跳出死循环

## 14 不会
    while(1) {
      console.log(Math.random());
    }
    //====请让上述代码顺利运行====

## 15
    [1 < 2 < 3, 3 < 2 < 1]
    
    [true, true]

    等价于 
      1 < 2  => true
      true < 3 => 1 < 3  => true

      3 < 2 => false
      false < 1 => 0 < 1 => true

## 16
    2 == [[[2]]]

    true

## 17
    console.log('✈'.length);
    //1.计算以上字节每位✈的起码点

    //2.请描述这些字节的起码点代表什么

## 18
    var yidenga = Function.length,
    yidengb = new Function().length;
    console.log(yidenga === yidengb);

## 19
    var length = 10;
    function fn() {
      console.log(this.length);
    }
    var yideng = {
      length: 5,
      method: function(fn) {
        fn();
        arguments[0]();
      }
    }
    yideng.method(fn, 1);

    10, 2

## 20
    var yi = new Date("2018-08-20"),
          deng = new Date(2018, 08, 20);
    [yi.getDay() === deng.getDay(), yi.getMonth() === deng.getMonth()];

## 21
    for (let i =(setTimeout(() => console.log("a->", i)), 0);
    setTimeout(() => console.log("b->", i)), i < 2;
    i++) {
      i++
    }
    //====请写出上述代码执行结果====

## 22
    [typeof null, null instanceof Obejct]
    //请写出执行结果,并解释为什么

## 23
    <textarea maxlength=10 id="yideng"></textarea>
    <script>
      document.getElementById('yideng').value = 'a' + repeat(10) + 'b';
    </script>
  
## 24
    function sidEffecting(ary) {
      ary[0] = ary[2];
    }
    function yideng(a, b ,c=3) {
      c = 10;
      sidEffecting(arguments);
      return a + b + c;
    }
    yideng(1, 1, 1);

## 25
    yideng();
    var flag = true;
    if(flag){
      function yideng() {
        console.log('yideng1');
      }
    } else {
      function yideng() {
        console.log('yideng2');
      }
    }

    yideng is not a function

## 26
    var min = Math.min(), max = Math.max();
    console.log(min < max);

## 27
    var big = '志佳老师';
    var obj = {
      big: "yideng",
      showBig: function() {
        return this.big;
      }
    }
    obj.showBig.call(big);

## 28
    function yideng(a, b, c) {
      console.log(this.length);
      console.log(this.callee.length)
    }

    function fn(d) {
      arguments[0](10, 20, 30, 40, 50)
    }

    fn(yideng, 10, 20, 30)

## 29
    var a = "yideng";
    function test() {
      var a = "yideng2";
      var init = new Function("console.warn(a)");
      init();
    }
    test();

## 30
    console.log( {} + []);
    {} + []