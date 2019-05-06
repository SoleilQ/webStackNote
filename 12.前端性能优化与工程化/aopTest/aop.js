//你要统计一下当前得函数谁耗时最长
function test() {
  alert(2);
}
Function.prototype.before = function(fn) {
  var _self = this;
  return function() {
    //this指向了调用的函数
    console.log(this)
    if(fn.apply(this, arguments) == false) {
      return false
    };
    return _self.apply(_self, arguments);
  }
}
Function.prototype.after = function(fn) {
  //after先执行本身 再执行回调
  var _self = this;
  return function() {
    console.log(this)
    var result = _self.apply(_self, arguments);
    if(result == false) {
      return false
    }
    fn.apply(this, arguments);
    return result;
  }
}
// 默认函数被执行了2遍 test作为中转
//before回调和before一起送到after去
//after  after和test一起送到before去
//挂载self => test 执行beforeh回调 执行self after自己执行回调
test.after(function() {
  alert(3);
}).before(function() {
  alert(1);
})();