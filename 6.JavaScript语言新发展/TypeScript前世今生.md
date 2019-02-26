# TypeScript前世今生

## 曾经的笑柄
    function test() {
      return 
      { //这边被屏蔽 直接return 
          a:1                 
      }
    }
    var f = test(); //undefined
    console.log(f.a);

    (function() {alert(1)}) ()
    (function() {alert(2)}) ()
    //1   但是第一句后面没有;  会导致成为一行代码

## Node.js
    有模有样的后端语言
    又是一个新玩具
    大量的闭包、回掉、内存浪费、全站崩溃。。
    面向过程的观念无法改变
    对于继承、或者接口等一听就迷糊

## 正规语言的心经
    TypeScript是一种由微软开发的自由和开源的编程语言。它是JavaScript的一个超集，而且本质上向这个语言添加了可选的静态类型和基于类的面向对象编程。

    重点！！！！
    1.强类型的编程语言 显示声明字符串
    2.常量、变量、作用域、this、可空类型、真实数组(js里的数组不是数组是对象)、结构、枚举(类)
    3.面向对象 类、继承、多态(一个function 不同的参数类型)、接口(只负责声明不实现，做抽象,基于接口可以做无数的类)、命名空间(namespace var s = Object)、变量的修饰(public、private)、构造函数(constructor)、访问器(Get、Set)、静态属性
    4.委托、泛型、反射、集合(动态数组(ArrayList/Hashtable/SortedList/Stack/Queue))、匿名方法、拆箱(import)
    这些语言是实现了数据结构的高级动态语言
    5.多线程
      $("#id").click(function() {
        alert(1);
      });
      while(true) {
        console.log(1);
      }
      1弹不出来  异步队列  while是同步队列 只有同步队列执行完了 才会去异步队列拉取执行

## 未来
    

