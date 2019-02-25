<?php

/**
 * 定义一个类 学习public private protected
 */
class Person
{
  public $x = 0;
  private $name = "zhijia"; //公有的
  private $age = 27; //私有的
  protected $money = 10; //受保护的

  //私有的成员方法 不能在类外部直接被访问
  private function getAge()
  {
    return $this->age;
  }
  //被保护的成员方法 不能在类的外部直接被访问
  protected function getMoney()
  {
    return $this->money;
  }
  public function userCard()
  {
    echo "name->" . $this->name . "age->" . $this->getAge() . "money->" . $this->getMoney();
  }
  public function __set($key, $value) {
    //魔术方法的set 只针对private protected的变量
    //echo $key. ">>>>>>" .$value;
    if($key == "name" && $value == "laowang") {
      $this -> name = "xiaowang";
    }  
  }
  public function __get($key) {
    if ($key == "age") {
      return "girl not tell you";
    }
  }
  public function __isset($key)
  {
    if($key == 'age') {
      return "private age";
    }
  }
  public function __unset($key) {
    if ($key == "age") {
      unset($this -> age);
    }
  }
}
$xw = new Person();
$xw->name = "laowang";
// echo $xw->userCard();
//echo $xw -> age;
//isset($xw -> age)); // bool(false) age不让访问  公有变量可以访问
unset($xw -> age);
echo $xw -> x;
?>