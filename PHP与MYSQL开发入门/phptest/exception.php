<?php
//try分支 在这里进行代码测试，如果有问题j就要抛出一个异常，如果没有问题就继续执行
try{
    $num = 2;
    if($num == 1) {
      echo "success";
    } else {
      //throw抛出对象
      //Exception类有两个参数
      //第一个参数：异常信息
      //第二个参数：异常代码
      throw new Exception("变量num不等于1");
    }
//catch 分支 就是捕捉异常对象
// 参数: 异常对象,使用的是类型约束，只能捕捉由Exception类实例化来的对象
}catch(Exception $e){
  echo "错误文件为:";
  echo $e -> getFile(); //得到异常发生的文件
  echo "发生错误的行为:";
  echo $e -> getLine(); //得到异常发生的行
  echo "错误代码为:";
  echo $e -> getCode(); //得到异常代码
  echo "错误信息为:";
  echo $e -> getMessage(); //得到异常信息
}
?>