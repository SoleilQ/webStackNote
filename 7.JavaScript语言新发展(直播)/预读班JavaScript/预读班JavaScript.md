#预读班JavaScript

## 
    1.函数提升 变量提升 函数提升优先于变量提升
    2.当函数名和变量名相同时,如果变量没有被赋值,则函数生效
    3. var  s = function g() {}
    g是只读的 g只能再函数内部访问
    4. this  谁调用指向谁 没人调用指向window
    5.this 当函数创建的时候 this指向当前函数的实例
    6.简单的函数声明不能被new
      var s = {
        a: funciton() {
          console.log(1);
        },
        b() {
          console.log(2)
        }
      }
      var f = s.a.bind(this);
      new f();

      var p = s.b.bind(this);
      new p();

    7.es6简写的函数体不能被 new this ！！！！
      this.test = 11;
      var s = {
        a: funciton() {
          console.log(1 + this.test);
        }
      }
      var f = s.a.bind(this);
      new f();

    8 对象和闭包不能在一起必须有分号
      var s = {

      } //注意有没有分号
      (function() {

      })

    9
      function test(a) {
        this.a = a;
      }
      test.prototype.a = 20;
      test.prototype.init = function() {
        console.log(this.a);
      }
      var s = new test();
      s.init();

    10.TDZ 暂时性死区

    11.使用new操作符
      (1)创建了一个新的对象;
      (2)将构造函数的作用域赋给新对象(this就指向了这个新对象);
      (3)执行构造函数中的代码(为这个新对象添加属性);
      (4)返回新对象;

      function Person() {};
      var obj = new Person();

      1.var obj = {};
      2. obj._proto_ = Person.prototype;
      3. Person.call(obj);
      将Person函数对象的this指针替换成了obj,然后再调用Peron函数

