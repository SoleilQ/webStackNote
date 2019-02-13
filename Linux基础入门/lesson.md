# Linux基础入门

## 一、Linux操作系统介绍
    1.Linux的历史
      诞生于1991年10月5日
      Linux存在着许多不同的Linux版本,但它们都使用了Linux内核
      Linux可安装在各种计算机硬件设备中,比如手机、平板电脑、路由器、视频游戏控制台、台式计算机、大型机和超级计算机
    2.选择Linux发行版
      Linux发行版简单来说就是将Linux内核与应用软件做一个打包。较知名的发行版有:Ubnutu、RedHat等

      https://www.linux.org/
      linux kernel
      发行版 centos(redhat的开源版)  DVD ISO(需要图形界面)   Minimal ISO(服务器装)
      rendhat  商业版
      Ubuntu  desktop
    3.在虚拟机中安装Ubuntu
      https://www.ubuntu.com/download/desktop
      虚拟机(Virtual Machine)指通过软件模拟的具有完整硬件系统功能的、运行在一个完全隔离环境中的完整计算机系统。流行的虚拟机软件有VMware、Virtual Box和Virtual PC,它们都能在Windows系统上虚拟出多个计算机。

      VMware是一个商业化的虚拟机软件
      Virtual Box是一个开源的虚拟机  Oracle维护
      Virtual PC 微软维护 不开源 免费使用

      https://www.vmware.com/cn.html
      windows下载 Workstation Pro  
      mac系统下载Fusion

## 二、Linux和虚拟机基本安装步骤
      新建虚拟机 -> 典型 -> iso位置
      内存2G 处理器数量1 核心2
## 三、Linux基本命令入门
      当前的目录内容 ls dir
      ls -l 长格式的目录  访问权限  文件数量   当前目录用户  文件大小  文件名称
      ls -a 显示隐藏文件
      cd 切换到的目录  Linux下 文件名是严格区分大小写的
      mkdir 目录名称
      复制文件
        1.复制文件
          cp 文件名 目录/复制之后文件的名称
        2.复制目录
          cp -R 目录 改名后的目录
      pwd 显示当前目录的全部路径
      删除命令  rm 文件名   rm -r 目录名 小心使用

## 四、Windows命令行入门
    dir 当前目录文件、文件夹
    cd
    md 创建文件夹
    复制  copy 文件名  目录名  
    删除  del 文件名   系统不会给任何提示  小心使用  删除的文件不会再回收站中
    文件改名  rename 原文件名  新文件名
## 五、Cygwin安装与使用
    windows平台下的unix模拟环境
    http://www.cygwin.com/
    view -> full
    字体小 options
    cd / 根目录
## 六、Linux的安装和基本命令(补充)

## 七、Web服务器基础原理和概念