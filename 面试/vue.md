# Vue面试题

## Vue介绍
    Vue.js是一个构建数据驱动的 web 界面的渐进式框架。Vue.js 的目标是通过尽可能简单的 API实现响应的数据绑定和组合的视图组件。核心是一个响应的数据绑定系统

## Vue的响应式原理
    当一个Vue实例创建时, vue会遍历data选项的属性, 用Object.defineProperty将它们转为getter/setter并且在内部追踪相关依赖,在属性被访问和修改时通知变化。每个组件实例都有相应的watcher程序实例, 它会在组件渲染过程中把属性记录为依赖,之后当依赖的setter被调用时, 会通知watcher重新计算,从而致使它关联的组件得以更新

## vue生命周期的理解
    总共分为8个阶段
        创建前/后
        载入前/后
        更新前/后
        销毁前/后
    beforeCreate vue实例挂载元素el还没有
    beforeMount  vue实例的$el和data都初始化了, 但还是挂载之前为虚拟dom节点 data.message还未替换
    mounted  vue实例挂载完成, data.message成功渲染

    当data发生变化时, beforeUpdate updated 
    销毁前/后 destroy  vue实例已经解除了事件监听和dom绑定, 但dom结构依然存在

## 为什么vue中data必须是一个函数
    对象为引用类型
    当重用组件时,由于数据对象都指向同一个data对象, 当一个组件中修改data时, 其他组件中data同时会被修改; 而使用返回对象的函数时, 由于每次返回的都是一个新对象(Obejct的实例),引用地址不同, 则不会出现这个问题

## vue-loader是什么？使用它的用途有哪些
        解析.vue文件的一个加载器, 跟temlpate/js/style转换成js模块

## 计算属性和watch的区别
    computed计算属性是用来声明式的描述一个值依赖了其它的值。当你在模板里把数据绑定到一个计算属性上时，Vue 会在其依赖的任何值导致该计算属性改变时更新 DOM

    watch监听的是你定义的变量,当你定义的变量的值发生变化时，调用对应的方法

## prop 验证，和默认值
    在父组件给子组件传值的时候, 为了避免不必要的错误, 可以给props的值进行类型设定
    prop可以传一个数字，一个布尔值，一个数组，一个对象，以及一个对象的所有属性

    组件可以为 props 指定验证要求。如果未指定验证要求，Vue 会发出警告比如传一个number类型的数据，用defalt设置它的默认值，如果验证失败的话就会发出警告
    props: {
        visible: {
            default: true,
            type: Boolean,
            required: true
        },
    }

## vue 组件通信
    父传递子
    父: 自定义属性名 + 数据(要传递) => :value="数据"
    子: props['父组件上的自定义属性名‘] => 进行数据接收

    子传递父
    在父组件中注册子组件并在子组件标签上绑定自定义事件的监听
    子: this.$emit('自定义事件名称' ,数据) 子组件标签上绑定@自定义事件名称 = '回调函数'
    父: methods: {自定义事件() { // 逻辑处理}}

    兄弟组件
    通过中央通信 let bus = new Vue()
    A：methods :{ 函数{bus.$emit('自定义事件名'，数据)} 发送
    B：created() {bus.$on('A发送过来的自定义事件名'，函数)} 进行数据接收

## vue路由传参数
    1.使用query方法传入的参数使用this.$route.query接受
    2.使用params方式传入的参数使用this.$route.params接受

## vuex 是什么？ 有哪几种属性？
    Vuex 是一个专为 Vue.js 应用程序开发的状态管理模式
    有 5 种，分别是 state、getter、mutation、action、module

    vuex 的 store 是什么？
        vuex 就是一个仓库，仓库里放了很多对象。其中 state 就是数据源存放地
    vuex 的 getter 是什么？
        getter 可以对 state 进行计算操作
    vuex 的 mutation 是什么？
        更改Vuex的store中的状态的唯一方法是提交mutation
    vuex 的 action 是什么？
        action 类似于 muation, 不同在于：action 提交的是 mutation,而不是直接变更状态
    
    如果请求来的数据不是要被其他组件公用，仅仅在请求的组件内使用，就不需要放入 vuex 的 state 里
    如果被其他地方复用，请将请求放入 action 里，方便复用，并包装成 promise 返回

## <keep-alive></keep-alive>的作用是什么
    <keep-alive></keep-alive> 包裹动态组件时，会缓存不活动的组件实例,主要用于保留组件状态或避免重新渲染

## delete和Vue.delete删除数组的区别
    delete只是被删除的元素变成了 empty/undefined 其他的元素的键值还是不变
    Vue.delete直接删除了数组 改变了数组的键值。

    var a=[1,2,3,4]
    var b=[1,2,3,4]
    delete a[0]
    console.log(a)  //[empty,2,3,4]
    this.$delete(b,0)
    console.log(b)  //[2,3,4]

## $nextTick是什么
    vue实现响应式并不是数据发生变化后dom立即变化，而是按照一定的策略来进行dom更新。

    $nextTick 是在下次 DOM 更新循环结束之后执行延迟回调，在修改数据之后使用 $nextTick，则可以在回调中获取更新后的 DOM

## Vue子组件调用父组件的方法
    第一种方法是直接在子组件中通过this.$parent.event来调用父组件的方法

    第二种方法是在子组件里用$emit向父组件触发一个事件，父组件监听这个事件就行了

## vue中的 ref 是什么
    ref 被用来给元素或子组件注册引用信息
    如果在普通的 DOM 元素上使用，引用指向的就是 DOM 元素；如果用在子组件上，引用就指向组件实例。

## vue.js的两个核心是什么
        数据驱动 组件系统

## vue如何兼容ie的问题
        babel-polyfill插件

## 页面刷新vuex被清空解决办法？
        localStorage存储到本地
        重新获取接口获取数据

## DOM 渲染在哪个周期中就已经完成
    mounted
    注意:
        mounted 不会承诺所有的子组件也都一起被挂载。如果你希望等到整个视图都渲染完毕，可以用 vm.$nextTick 替换掉 mounted
    
        mounted: function () {
            this.$nextTick(function () {
                // Code that will run only after the
                // entire view has been rendered
            })
        }

## 简述每个周期具体适合哪些场景
    
    beforecreate : 可以在这加个loading事件，在加载实例时触发

    created : 初始化完成时的事件写在这里，如在这结束loading事件，异步请求也适宜在这里调用

    mounted : 挂载元素，获取到DOM节点 updated : 如果对数据统一处理，在这里写上相应函数

    beforeDestroy : 可以做一个确认停止事件的确认框 

## Vue模板引擎
    AST 语法抽象树

## 你知道v-model的原理吗？说说看
    v-model其实就是一个语法糖 
    <input  v-model="value" />
    编译之后
    <input :value="propValue" @input="propValue=$event.target.value" />

    将propValue绑定给input的value值,同时监听input事件,将当前节点的value赋值给propValue

    如果要实现组件上的双向绑定 只需要子组件发送一个input事件即可

    <child v-model="message"></child>

## 在使用计算属性的时，函数名和data数据源中的数据可以同名吗？
        

## vue中data的属性可以和methods中的方法同名吗？为什么？



