//1.const 可以提醒大家 不能被改变
//2.const 比较符合函数式编程
//3.本质的区别 编译器内部对处理机制
const a = [];
a.push("🍌");
a = [];
console.log(a);
const s = ["🍌", "🍎", "🍊"];
const [first, second, three] = s;
console.log(three);

function test() {
  return {
    age: "hello",
    b: 2
  }
}
const result = test();
const {
  age,
  b
} = result;
console.log(age); //hello

const s = "hello";
const e = "world";
const c = test`foor \n ${s} ${e} bar`;
function test(strs, ...values) {
  console.log(strs);
  console.log(values);
}
console.log(c);
console.log(c.includes("foo"));

const s =  "😄🙂😪😓";
// const result = Array.from(s);
// console.log(result);
const test  = ["树","✿", ...s];
const k = "arr";
const result = {
  [k+1]:1, //arr1
  s,
  q() {
    console.log("🐧");
  }
}
console.log(result.q());

const a = { x: null };
a.x = 3;
console.log(a); //{x:3}

console.log(NaN == NaN); //false
console.log(Object.is(NaN, NaN)); //true
const eat = {
  getEat(){
    return "🍖";
  }
}
const drink = {
  getDrink(){
    return "🍺";
  }
}
let sunday = Object.create(eat);
console.log(sunday.get());
console.log(Object.getPrototypeOf(sunday)); //getEat
Object.setPrototypeOf(sunday, drink); //drink //改变了原型
let sunday = {
  __proto__:drink,
  getDrink(){
    return  super.getDrink() + "☕";
  }
}
sunday.__proto__ = drink;

// const fn = function pp() {

// }
// console.log(fn.name); //pp
(() => {
  console.log("fn init");
})();

//(1=>2)();
const result = [1, 2, 3].map(index => index * 3); //[3,6,9]
window.a = 30;
const s = {
  a: 40,
  p:function() {
    const qq = {
      a:50,
      test: ()=> {
        console.log(this.a);
      }
    }
    qq.test()
  }
};
s.p();

function test(...result) {
  console.log(a); //1
  console.log(options); //true
  //arguments
  console.log(result);
}
test(30, {options:111});

let a = function* (){
  yield "🍦";
  yield "🍔";
}
const result = a();
console.log(result.next());

const arr = ["🍊", "🍎", "🍌"];
//索引
for(var i in arr) {
  console.log(i)
}
//值
for(let v of arr) {
  console.log(v);
}

class Person {
  constructor(age) {
    this.age= age;
  }
  tell() {
    console.log(`小王的年龄是${this.age}`);
  }
}
class Man extends Person{
  constructor(age) {
    super(age);
    this.arr = [];
  }
  set menu(data){
    this.arr.push(data)
  }
  get menu(){
    return this.arr;
  }
  tell(){
    super.tell();
  }
  static init(){
    console.log("static");
  }
}
//const xiaowang = new Person(30);
const xiaowang = new Man(30);
xiaowang.menu = "🍅";
console.log(xiaowang.menu);
Man.init();

let arr = new Set("🍔🍦🌭");
arr.add("🍪");
arr.add("🍪"); //相同的东西set不管

console.log(arr); //xi
arr.size// 4个
arr.has('🍔');//true  独立的
arr.delete('🍔');
for(let data of arr) {
  console.log(data);
}
arr.clear();
console.log(arr.length); //undefined

let food  = new Map();
let fruit = {},cook = function(){};
food.set(fruit, "🍋");
food.set(cook, "🍔");
console.log(food,get(cook));
console.log(food.size);//2
food.delete(fruit);
console.log(food.size);//1
food.clear();

const arr = [12,34,6,98,12,6];
const result = [...new Set(arr)];
console.log(result); //[12,34,6,98]