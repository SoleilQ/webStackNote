<?php
//自定义异常类时要继承系统的异常类处理
class myExpection extends Expection
{
  //可以自己定义异常处理流程
  public function getAllInfo(){
    return "异常发生的文件为:{$this -> getFile()}, 异常发生的行为:{$this -> getLine()},异常的信息为:{$this -> getMessage()},
    异常的代码为:{$this -> getCode()}";
  }
}
try {
  if($_GET['num'] == 5) {
    throw new Exception("这是一个自定义的异常", 123456);
  }
  echo "success";
//捕捉时注意类型约束自己定义的异常处理类名
} catch (myExpection $e) {
  echo $e -> getAllInfo();
}
?>