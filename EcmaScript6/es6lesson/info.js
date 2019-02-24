import { test, gogo } from "./back.js";
test();
gogo();

import data from "./back.js";
data.test();
data.gogo();

(async () => {
  function promisefn(url) {
    return new Promise(function(resolve, reject) {
      $.ajax({
        url: url,
        success: function() {
          resolve(response);
        },
        error: function() {
          reject("error");
        }
      });
    });
  }
  const a1 = await promisefn("http://www.xxx.com/a");
  const a2 = await promisefn("http://www.xxx.com/b");
  let p = a1 + a2;
  console.log(p);
})();


function testable(target){
  target.isTestable = true;
}
@testable
class MyTestableClass {}
console.log(MyTestableClass.isTestable) //true
