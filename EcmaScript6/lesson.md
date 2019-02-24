# EcmaScript6
#### [参考连接](http://es6.ruanyifeng.com/#docs/intro)
## 一、ES6简介与环境搭建
    ECMAScript6.0(以下简称 ES6)是 JavaScript语言的下一代标准,已经在2015年6月正式发布了。
    
    ECMAScript和JavaScript的关系
      前者是后者的规格，后者是前者的一种实现

    ES6 与 ECMAScript 2015 的关系
      ES6既是一个历史名词,也是一个泛指,含义是 5.1 版以后的JavaScript的下一代标准,涵盖了 ES2015、ES2016、ES2017 等等。
    Traceur 转码器(不建议使用)
      Google公司的Traceur转码器,也可以将ES6代码转为ES5代码。

      <script src="https://google.github.io/traceur-compiler/bin/traceur.js"></script>
      <script src="https://google.github.io/traceur-compiler/bin/BrowserSystem.js"></script>
      <script src="https://google.github.io/traceur-compiler/src/bootstrap.js"></script>
      <script type="module">
        ...
      </script>

      npm install -g traceur
      traceur --script calc.es6.js --out calc.es5.js --experimental


    Babel
      Babel是一个广泛使用的ES6转码器,可以将ES6代码转为ES5代码,从而在现有环境执行

      npm install --save-dev babel-cli

      配置文件.babelrc
        npm install --save-dev @babel/preset-env

         {
          "presets": [
            "@babel/env",
          ],
          "plugins": []
        }

      babel-polyfill
        Babel默认只转换新的JavaScript句法,而不转换新的API.比如Iterator、Generator、Set、Maps、Proxy、Reflect、Symbol、Promise等全局对象,以及一些定义在全队对象上的方法(比如Obejct.assign)都不会转码

        npm install --save-dev @babel/polyfill

        其他 js/css ployfill  浏览器增强
## 二、ES6编程风格(上)
    const、let
      1.const 可以提醒大家 不能被改变
      2.const 比较符合函数式编程
      3.本质的区别 编译器内部对处理机制 

    对象解构
      以前取数据的方法
      // var s = ["🍌", "🍎", "🍊"];
      // s[0] s[1] s[2]
      现在
      // const s = ["🍌", "🍎", "🍊"];
      // const [first, second, three] = s;
      // console.log(three);

      function test() {
        return {
          a: "hello",
          b: 2
        }
      }
      const result = test();
      const {
        a,
        b
      } = result;
      console.log(a); //hello
      //返回多个值 优先使用对象的解构  

    字符串模板
      const s = "hello";
      const e = "world";
      const c = test`foor \n ${s} ${e} bar`;
      function test(strs, ...values) {
        console.log(strs);
        console.log(values);
      }
      console.log(c);
      console.log(c.includes("foo"));

    对象和数组
      数组
        const s =  "😄🙂😪😓";
        // const result = Array.from(s);
        // console.log(result);
        const test  = ["树","✿", ...s];
        const k = "arr";
      对象
        const result = {
          [k+1]:1, //arr1
          s,
          q() {
            console.log("🐧");
          }
        }
        console.log(result.q());

        const a = { x: null };
        a.x = 3;
        console.log(a); //{x:3}

    函数
      function test(...result) {
        console.log(a); //1
        console.log(options); //true
        //arguments
        console.log(result);
      }
      test(30, {options:111});

## 三、ES6编程风格(中)
    Iterator
      遍历器
      let a = function* (){
        yield "🍦";
        yield "🍔";
      }
      const result = a();
      console.log(result.next());

      const arr = ["🍊", "🍎", "🍌"];
      //索引
      for(var i in arr) {
        console.log(i)
      }
      //值
      for(let v of arr) {
        console.log(v);
      }

    Generator
      用的不是很多  主要用async  await
    Class
      class Person {
        constructor(age) {
          this.age= age;
        }
        tell() {
          console.log(`小王的年龄是${this.age}`);
        }
      }
      class Man extends Person{
        constructor(age) {
          super(age);
          this.arr = [];
        }
        set menu(data){
          this.arr.push(data)
        }
        get menu(){
          return this.arr;
        }
        tell(){
          super.tell();
        }
        static init(){
          console.log("static");
        }
      }
      //const xiaowang = new Person(30);
      const xiaowang = new Man(30);
      xiaowang.menu = "🍅";
      console.log(xiaowang.menu);
      Man.init();

    Set、Map
      let arr = new Set("🍔🍦🌭");
      arr.add("🍪");
      arr.add("🍪"); //相同的东西set不管

      console.log(arr); //xi
      arr.size// 4个
      arr.has('🍔');//true  独立的
      arr.delete('🍔');
      for(let data of arr) {
        console.log(data);
      }
      arr.clear();
      console.log(arr.length); //undefined

      let food  = new Map();
      let fruit = {},cook = function(){};
      food.set(fruit, "🍋");
      food.set(cook, "🍔");
      console.log(food,get(cook));
      console.log(food.size);//2
      food.delete(fruit);
      console.log(food.size);//1
      food.clear();

      const arr = [12,34,6,98,12,6];
      const result = [...new Set(arr)];
      console.log(result); //[12,34,6,98]

    Module
      注意 export export default区别
      const test = function test() {};
      const gogo = function gogo() {};
      export { test, gogo };

      export default {
        test,
        gogo
      };

      import { test, gogo } from "./back.js";
      test();
      gogo();

      import data from "./back.js";
      data.test();
      data.gogo();

## 四、ES6编程风格(下)
    async  await
      (async () => {
        function promisefn(url) {
          return new Promise(function(resolve, reject) {
            $.ajax({
              url: url,
              success: function() {
                resolve(response);
              },
              error: function() {
                reject("error");
              }
            });
          });
        }
        const a1 = await promisefn("http://www.xxx.com/a");
        const a2 = await promisefn("http://www.xxx.com/b");
        let p = a1 + a2;
        console.log(p);
      })();

    修饰器 Decorator
      function testable(target){
        target.isTestable = true;
      }
      @testable
      class MyTestableClass {}
      console.log(MyTestableClass.isTestable) //true

      修饰器(Decorator)是一个函数,用来修改类的行为
      修饰器对类的行为的改变,是代码编译时发生的,而不是运行时。
      @testable 就是一个修饰器 它修改了MyTestableClass这个类的行为,
      为它加上了静态属性isTestable

      core-decorators.js
      @autobind 使得方法中的this对象，绑定原始对象
      @readonly 使得属性或方法不可写
      @ovrride 检查子类的方法 是否正确的覆盖了父类的同名方法

    Symbol

    Set、Map