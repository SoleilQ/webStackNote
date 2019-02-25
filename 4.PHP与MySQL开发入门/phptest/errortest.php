<?php
class myExpection extends Expection
{
  public function getInfo()
  {
    return $this->getMessage();
  }
}

try {
  //捕获多个异常处理要抛出多个异常对象，不能是由一个异常处理类实例化的对象
  if ($_GET['num'] == 1) {
    throw new myException("user");
  } elseif ($_GET['num'] == 2) {
    throw new myException("user");
  }
  echo "success";
  //在捕捉时系统的异常处理分支要放到最后
  //注意类型约束
} catch (myExpection $e) {
  echo $e->getInfo();
  echo "111";
} catch (myExpection $e) {
  echo $e->getMessage();
  echo "222";
}
?>