# ES6在企业中的应用

## 新特性
    二进制
    对象
    promises
    箭头函数
    模块
      AMD
      CMD
      commonjs
      UMD
      模块特色
        静态模块
        声明式语法
      模块语法
        import {$} from 'jquery.js'; //es6
        var $ = require('jquery.js')['$']; //amd
        export {$}; //es6
        export.$ = $;//amd
      不一样的理念
        按需引入 vs 全局引入
        多点暴漏 vs 全局暴漏
        import {each, ...} from 'underscore.js'; //es6
        var _ = require('underscore.js'); //amd

        export {each, map, ...}; //es6
        module.exports = _; //amd
      转码
        浏览器目前还不支持ES6模块
        SystemJS
        transpiler(转换器), 如ES6 module transpiler, babel, Traceur
        webpack
    八进制
    解构
      数据解构
      对象解构
      字符串解构
      数值和布尔值的解构赋值
      函数参数的解构赋值
        function add([x, y]) {
          return x + y;
        }
        add([1, 2]);
    symbols
    let
    spread
      数组-spread
      var arr1 = [1,2,3];
      var arr2 = [...arr1]; //es6浅拷贝
      var arr2 = [].conact(arr1); //es5
      var arr2 = arr.slice(0);
      min(...arr2);
    函数
      箭头函数
      reset参数
        function aaa(...args) {
          return args.join(',');
        }
      默认值
        function f(a =1) {} 
    字符串

## 实战
    转换器
      babel
        在线编译器 https://babeljs.io/repl/
        grunt,gulp,webpck
        fis
          fis-parser-babel-5.x
          fis-parser-babel-6.x
        兼容老代码 
          不能编译 .js
          .es
          .es.js
          xxx.js
        缺点
          需要引入编译流程
          编译的时间问题
          编译的代码排查错误问题
          babel的版本
          api相关需要shim
      Traceur

## 总结
    优点
      官方规范
      代码行数减少
      开发效率变快
      减少第三方库的依赖
      面向未来，原生支持