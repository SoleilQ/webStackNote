# CSS构建3D世界
#### 参考连接
- [720yun](https://720yun.com/)
- [H5doo](http://www.h5doo.com/)
- 主要是创意
## 一、HTML5陀螺仪
    1.陀螺仪又叫角速度传感器,是不同于j加速度计(G-sensor)的,他的测量物理量是偏转、倾斜时的转动角速度.在手机上,仅用加速度计是没有办法测量或重构出完整的3D动作,测不到转动的动作的,G-sensor只能检测轴向的线性动作.但陀螺仪则可以对转动、偏转的动作做得很好的测量,这样就可以精确分析判断出使用者的实际动作.而后根据动作,可以对手机做相应的操作
    2.陀螺仪角度
      α、β、γ(images/陀螺仪角度)
    3.code
      (1)deviceorientation
          设备的物理方向信息,表示为一系列本地坐标系的旋角
          角度信息从这里获取
      (2)devicemotion
          提供设备的加速信息
      (3)compassneedscalibration
          用于通知Web站点使用罗盘信息校准上述事件
    4.获取旋转角度
      window.addEventListener("deviceorientation", function(event) {
        //处理event.alpha、event.beta及event.gamma
      }, true)
      z轴为轴,α的作用于为(0,360)
      x轴为轴,β的作用于为(-180, 180)
      y轴为轴,γ的作用域为(-90， 90)
    5.获取罗盘校准
      window.addEventListener("compassneedscalibration", function(event) {
        alert('您的罗盘需要校准');
        event.preventDefault();
      }, true)
    6.获取重力加速度
      window.addEventListener("devicemotion", function(event) {
        //处理event.acceleration
        //x(y, z): 设备在x(y, z)方向上移动加速度值
        //event.accelerationIncludingGravity
        //考虑了重力加速度后设备在x(y, z)
        //event.rotationRate
        //α、β、γ:设备围绕x,y,z轴旋转的角度
      })
    7.重力加速度
      G=mg
    8.摇一摇
      var speed = 30;//speed
      var x = y = z = lastX = lastY = lastZ = 0;
      function deviceMotionHandler(eventData) {
        var acceleration = event.accelerationIncludingGravity;
        x = acceleration.x;
        y = acceleration.y;
        z = acceleration.z;
        if(Math.abs(x - lastX) > speed || Math.abs(y - lastY) > speed || Math.abs(z - lastZ) > speed) {
          //简单的摇一摇触发代码
          alert(1)
        }
      }
## 二、CSS3 3D模型
    室内全景图,交互可以用three.js去实现(图形学).
    将设计师图投放有两种模式
    1.球面投影
      在三维空间,每个3D模型都等同于一个多面体(即3D模型只能由不弯曲的平面组成).你只能以一个正多边形表示圆:边越多,圆就越'完美'