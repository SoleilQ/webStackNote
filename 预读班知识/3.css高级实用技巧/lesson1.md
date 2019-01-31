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