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
## 二、ES6编程风格(上)

## 三、ES6编程风格(中)

## 四、ES6编程风格(下)