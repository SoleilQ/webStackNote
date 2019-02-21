<?php
//1.接口声明的关键字是interface
//2.接口可以声明常量也可以抽象方法
//3.接口中的方法都是抽象方法 不用abstract去人肉的定义
//4.接口不能实例化,需要一个类去实现它
//5.一个类不能继承多个类 一个类可以实现多个接口
interface Person{
  const NAME = "xiaowang";
  public function run();
  public function eat();
}
interface Study {
  public function study();
}
class Student implements Person, Study
{
  const data = 3.14;
  public function run(){
    echo "run";
  }
  public function eat() {
    echo "eat";
  }
  public function study() {
    echo "study";
  }
  public static function test() {
    echo "hello";
    echo "<br/>";
    echo self::data;
  }
}
$xw = new Student();
$xw -> eat();
echo $xw::NAME;
// $xw -> test();
echo $xw::test();
?>