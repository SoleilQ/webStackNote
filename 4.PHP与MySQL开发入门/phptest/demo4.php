<?php
/**
   * 父类
   */
class Person
{
  public $name;
  private $age; //私有的 继承不过来了
  protected $money; //外部不能访问 但是可以被继承过去
  function __construct($name, $age, $money)
  {
    $this->name = $name;
    $this->age = $age;
    $this->money = $money;
  }
  public function cardInfo()
  {
    echo "name->" . $this->name . "age->" . $this->age . "money->" . $this->money;
  }
}

class Yellow extends Person
{
  function __construct($name, $age, $money)
  {
    parent::__construct($name, $age, $money);
  }
  //php重写
  public function cardInfo($pp)
  {
    //php实现重载的方法
    parent::cardInfo();
    echo $pp;
  }
  public function test()
  {
    echo $this -> money;  
  }
}
$s = new Yellow("xiaowang", 22, 100);
echo ($s->name);
$s-> test(); //100
?>