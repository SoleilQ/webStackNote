# JavaScript与QA工程师

## 测试核心概念
    单元测试
      
      目的:单元测试能够让开发者明确知道代码结果
      原则：单一职责、接口抽象、层次分离
      断言库：保证最小单元是否正常运行检测方法
      测试风格
        测试驱动开发(Test-Driven Development,TDD)、(Behavior Driven Development,BDD)行为驱动开发均是敏捷开发方法论。
        TDD关注所有的功能是否被实现(每一个功能都必须对应的测试用例),
        suite配合test利用assert('tobi' == user.name)
        BDD关注整体行为是否符合整体预期,编写的每一行代码都有目的提供一个全面的测试用例集。
      单元测试框架
        better-assert(TDD断言库)
        should.js(BDD断言库)
        expect.js(BDD断言库)
        chai.js(TDD BDD双模)
        Jasmine.js(BDD)
        Node.js 本身集成require
      单元测试运行流程
        before -> beforeEach -> it -> after -> afterEach
        每一个测试用例组通过describe进行设置
        1.before单个测试用例(it)开始前
        2.beforeEach每一个测试用例开始前
        3.it定义测试用例,并利用断言库进行
          设置chai如：expect(x).to.equal(true);
          异步mocha
        以上专业术语叫mock
      自动化单元测试
        karma自动化runner继承PhantomJS无刷新
        npm install -g karma
        npm install karma-cli --save-dev
        npm install karma-chrome-launcher --save-dev
        npm install karma-phantomjs-launcher --save-dev
        npm install karma-mocha --save-dev
        npm install karma-chai
      报告和单测覆盖率检查
        npm install karma-coverage --save-dev
        coverageReporter:{type:'html', dir:'coverage/'}

    性能测试
      基准测试
        面向切面编程AOP无侵入式统计
        Benchmark基准测试方法,它并不是简单的统计执行多少次测试代码后对比时间,它对测试有着严密的抽样过程。执行多少次取决于采样到的数据能否完成统计。根据统计次数计算方差
      压力测试
        吞吐率、响应时间和并发数,这是指标反映了服务器并发处理能力
        QPS pv:网站当日访问认识 uv独立访问人数
        常用的压力测试工具ab、siege、http_load
    
    安全测试
      XSS
      SQL
      CSRF

    功能测试
      用户真实姓名检查
        selenium-webdriver
        protactor selenium-standalone
        http://webdriver.io/ WEBDRIVERI/O
        冒烟测试SmokeTest
    JavaScript Lint&Hint
      目的：检查JavaScript代码标准
      原因：JavaScript代码诡异，保证团队代码规范
      lint: http://www.jslint.com
      hint: http://www.jshint.com
      搭配自动化任务管理工具完善自动化测试grunt-jshint、grunt-jslint
    
    Q&A