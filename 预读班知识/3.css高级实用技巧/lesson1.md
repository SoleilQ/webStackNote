# CSS高级实用技巧
## css3开发常备核心技能 
### 一、早期的双飞翼布局 + CSS HACK  
    1.双飞翼布局
      position
      float
      负边距
      等高
      盒子模型
      清除浮动
      
      1.1
        又叫圣杯布局  
        margin不影响盒子模型  
        div等高 => 假的等高 

      1.2 
          弹性盒模型布局
          移动端flex布局
          -webkit-box-sizing: border-box (盒子不伸缩)
          Grid布局

      1.3 
          IE6经典BUG(/images)
### 二、基于移动端的PX与REM转换兼容方案  
### 三、弹性盒模型与Reset的选择  
    1.flex模型
    2.*的杀伤力太大！！
    3.Reset.css重置Normalize.css修复Neat.css融合
    4.html{box-sizing: border-box}
      *, *:before, *:after{box-sizing: inherit}
### 四、自制的ICON-FONT与常用字体排版 
    1.no-image时代, 不超过纯色为2的图像
    2.宋体非宋体 黑体非黑体 Windows下的宋体叫中易黑体SimSun，Mac是华文宋体STSong。Windows下的黑体叫中易黑体SimHei, Mac是华文黑体STHeti。
    3.不要只写中文字体名，保证西文字体在中文字体前面。 Mac -> Linux -> Windows
    4.切忌不要直接使用设计师 PSD 的设计 font-family, 关键时刻再去启动 font-face(typo.css、Entry.css、Type.css)
    5.font-family: sans-serif 系统默认,字体多个单词组成加引号

    CSS ICON
      http://cssicon.space/#/
    
    有关设计的JS 
      underline.js
      responsify.js
      typedetail.com
      cssion.space
      designrresearch.space
### 五、CSS代码检测与团队项目规范 
    1.CSS HINT
      
### 六、CSS绘制特殊图形 高级技巧  
### 七、BFC  IFC GFC FFC   
    1.BFC
        (1)BOX:CSS布局的基本单位,直观点来说,就是一个页面是由很多个BOX组成的。元素的类型和display属性,决定了这个BOX的类型.不同类型的BOX,会参与不同的Formatting Context(一个决定如何渲染文档的容器)
        (2)block-level box: display属性为block,list-item,table的元素(块级),会生成block-level box(块级别的盒).并且参与block formatting context;
        (3)inline-level box: display属性为inline,inline-block, inline-table的元素,会生成inline-level box.并且参与inline formatting context.
        (4)Formatting Context 是W3C CSS2.1规范中的一个概念.它是页面中的一块渲染区域,并且有一套渲染规则,它决定了其子元素将如何定位,以及和其他元素的关系和相互作用.最常见的Formatting Context 有 Block Formatting Context(简称BFC)和Inline Formatting Context(简称IFC)
    2.哪些元素会生成BFC
        根元素
        float属性不为none
        position为absolute或fixed
        display为inline-block, table-cell, table-caption, flex, inline-flex
        overflow不为visible
    3.根据BFC布局规则
        (1)每个元素的margin box的左边,与包含块border box的左边相接触(对于从左往右的格式化,否则相反).即使存在浮动也是如此
        (2)BFC的区域不会与float box重叠 是相互独立的
        (3)加一个overflow:hidden 生成了一个BFC块(粉色区域,来实现自适应两栏布局)
        (4)计算BFC的高度时,浮动元素也参与计算(overflow:hidden)。如果生成BFC,浮动元素也跟着计算
        (5)防止垂直margin重叠
            BOX垂直方向的距离由margin决定.属于同一个BFC的两个相邻box的margin会发生重叠
            我们可以在p外面包裹一层容器,并触发该容器生成一个BFC。那么两个p便属于同一个BFC,就不会发生margin重叠了。
    4.总结
        (1)BFC就是页面上的一个隔离的独立容器,容器里面的子元素不会影响到外面的元素。反之亦是如此。
        (2)IFC(Inline Formatting Context)直译为:"内联格式化上下文",IFC的line box(线框)高度由其包含行内元素中最高的实际高度计算而来(不受到竖直方向的padding/margin影响)。
        (3)FFC(Flex Formatting Context)
        直译为:"自适应格式化上下文",display的值为flex或者inline-flex的元素将会生成自适应容器。
        (4)GFC(GridLayout Formatting Context)直译为:"网格布局格式化上下文"
### 八、CSS-Grid-Layout
### 九、CSS分层与面向对象
    1.为什么要分层
        SMACSS
            可扩展的模块化架构的css
            使用一套五个层次来划分CSS给项目带来更加结构化的方法：
            (1)Base-设定标签元素的预设值 PS: html{}  input[type=text]{}
            (2)Layout-整个网站的[大架构]的外观 PS: #header {margin: 30px 0 };
            (3)Module-应用在不同页面公共模块 PS: .button{}
            (4)State-定义元素不同的状态 PS: nav--main{ .active {}}
            (5)Theme-画面上所有[主视觉]的定义 PS: border-color、background-image
            修饰符使用的是--,子模块使用_符号
            <div class="container">
                <div class="container-header">
                    <div class="container-header__title">
                        <h1 class="container-header__title--home"></h1>
                     </div>
                </div>
            </div>
        BEM
        SUIT
        ACSS
            小粒度的css 语义明显、复用性更强
            .m-10 {
                maring: 10px;
            }
            .w-50 {
                width: 50%
            }
        ITCSS
### 八、面试如何回答
    1.解释一下什么是BFC
    display为block元素会生成一个block-level box,这样的box渲染的方式是block formatting context.
    比如说在计算float元素不等高的情况下,有几种方式去处理它。
        (1)让父元素呈overflow:hidden
        但是overflow:hidden是让一个元素隐藏掉,为什么会让里面的元素跟着计算高度? 这个时候就是触发了BFC这个布局原则,因为BFC的原则就是可以让里面的浮动元素跟着计算高度.如何触发BFC呢? 加overflow:hidden. 其他生成BFC的方式(见笔记)
        (2)让父元素float:left