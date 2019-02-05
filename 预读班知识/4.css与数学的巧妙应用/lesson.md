# CSS与数学的巧妙应用

## 一、DEMO1  
- transform: skew(45deg)

## 二、DEMO2
    裁剪图片
    .test > img{
	    clip-path: polygon(50% 0 ,100% 50%,50% 100%,0 50%);
	    transition: 1s clip-path;
    }
    .test > img:hover{
      clip-path: polygon(0 0 ,100% 0,100% 100%,0 100%);
    }

## 三、DEMO3  
    outline 可以设置边框,但是会留缝隙
    通过计算得出圆角外层的半径
    box-shadow: h-shadow v-shadow blur spread color inset;

## 四、DEMO4  
    animation: bounce 5s ease-in;
    @keyframes bounce {
      60%, 80%,to{
        transform: translateY(400px);
        animation-timing-function: ease-out; 
      }
      70% {
        transform: translateY(300px);
      }
      90% {
        transform: translateY(300px)
      }
    }

## 五、CSS与矩阵
    1.矩阵的数学概念
    2.css中矩阵应用
      transform原理：
        skew(斜拉)
        scale(缩放)
        rotate(旋转)
        translate(位移)
      transform:matrix(a,b,c,d,e,f)
      transform:matrix(x,x,x,x,水平偏移距离,垂直偏移距离)

      .animate {
        transform: totate(1turn) translateX(90px)
      }
       .animate {
        transform: translateX(90px) totate(1turn) 
      }
      transform从右往左读
    3.复杂的CSS矩阵
    4.更多矩阵的技巧
      SVG、Canvas、WebGL、CSS3D
      快速提高生成能力
        matrix3d
        http://ds-overdesign.com/transform/matrix3d.html
       
        CSS-Matrix3d
        https://github.com/Zhangdroid/CSS-Matrix3d

        matrix
        http://meyerweb.com/eric/tools/matrix/

        tools
        http://www.f2e.name/case/css3/tools.html
