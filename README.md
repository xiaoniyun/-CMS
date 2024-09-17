这是极光CMS的开发文档
极光影视CMS源码-小白版(PHP)
全自动采集。跟随资源站同步更新。 Api填入苹果CMS10 JSON接口更新缓存即可。非XML。如需xml请自行修改函数。

作者：北极星
QQ：----- (勿加勿扰)
(***开源勿扰，自行探索***)
**模板仅适合PC/宽屏设备，如需要自适应手机模板 ，请自行下载网上的免费苹果cms模板，自行二开，把本开源程序中的函数提取放置模板当中即可。需要个人掌握简单的php基础即可**
####演示图
***演示图1***
![001-pic](https://xiaoniyun.github.io/cms/picture/001-pic.jpg)
***演示图2***
![002-pic](https://xiaoniyun.github.io/cms/picture/002-pic.jpg)
***演示图3***
![003-pic](https://xiaoniyun.github.io/cms/picture/003-pic.jpg)
***演示图4***
![004-pic](https://xiaoniyun.github.io/cms/picture/004-pic.jpg)


#极光影院CMS程序(JSON版)
##本程序无需数据库，直接上传源码即可访问，（服务器或虚拟主机空间）都可以搭建使用！模板自适应端，浏览体验更佳！带打赏及各种广告位置展示推荐！安装操作简单！无需繁琐的操作，即可快速拥有一个视频看片资源网站！


##全站内容全自动更新采集，自动缓存生成HTML，提升页面访问速度，更易收录，网站引流必备源码


##后台管理设置可一键配置网站信息及广告推荐等等

##后台可设置缓存时间以及一键更新清除所有缓存文件（可无需设置，全站自动更新缓存）

##加入全新本地视频m3u8播放器解析，支持资源网视频源去广告，如部分资源网的m3u8播放源观看到十几分钟或一半时就会出现广告播放，本解析可跳过视频内的广告继续播放，播放源观看的流畅度取决于资源网提供的速度，程序只采集数据内容！

##新增加多个不同资源线路采集
##多个广告位置展示推荐以及打赏
##可在后台设置屏蔽影片资源

##内置简单安卓版封装APP生成软件（只需将域名地址输入和软件名称等等填入进行打包，苹果版可以使用第三方在线打包或者使用其他工具封装苹果端）


##通用所有资源网的苹果CMS 10接口
##部分核心代码有加密


##搭建

#服务器或虚拟主机空间都可以使用
#上传源码解压缩
#环境：PHP版本；5.6～8+
#登录后台设置
访问你的域名/admin/

默认帐号和密码都是：admin

请及时登录后台设置网站相关信息

##其他相关配置
精选资源自定义发布推荐
若需要清除全部内容只需要找到文件夹中（data）的文件aik.seturl.php，删除即可！

#注：本程序暂不支持上传二级目录访问


##程序开发文档；
本程序采集接口通用各大资源网的苹果CMS，对接CMS采集数据为josn接口，所有的CMS苹果的josn接口数据通用，可在网站后台管理设置更换资源网接口地址（建议使用m3u8数据接口进行采集，具体可查看资源网提供的接口地址）


采集规则
若需要更换其他资源网接口地址请在后台系统-站外配置替换链接和标签列表即可，只需要更换资源网提供的接口地址、分类名称、对应标签分类id数字规则。


接口示例；
https://xxx.xxx.xxx/api.php/provide/vod/

接口示例或：
https://xxx.xxx.xxx/api.php/provide/vod/m3u8/


采集地址接口；
具体相关接口参数请查看需要添加的资源网帮助说明，一般资源网都有提供相关的接口地址！

仅需要在后台添加资源网接口形式（资源网接口地址/provide/vod/）


##关于资源网标签列表


资源网接口地址/provide/vod/?ac=list

可查看资源网接口参数的所有标签列表

#返回数据示例如：

[{"type_id":1,"type_name":"电影"},{"type_id":2,"type_name":"连续剧"},{"type_id":3,"type_name":"综艺"},{"type_id":4,"type_name":"动漫"},{"type_id":5,"type_name":"资讯"},{"type_id":6,"type_name":"动作片"},{"type_id":7,"type_name":"喜剧片"},{"type_id":8,"type_name":"爱情片"},{"type_id":9,"type_name":"科幻片"}

##关于标签列表绑定

接口必要信息是

标签的名称， 分类ID 或 分类名称 （如果同时存在以 分类ID为准）

标签id和名称：
（type_id）为id
（type_name）为名称


如上面某些资源网的一级id标签
例如：
{"type_id":1,"type_name":"电影"},{"type_id":2,"type_name":"连续剧"},{"type_id":3,"type_name":"综艺"},{"type_id":4,"type_name":"动漫"},{"type_id":5,"type_name":"资讯"}

二级id标签列表
例如：
{"type_id":6,"type_name":"动作片"},{"type_id":7,"type_name":"喜剧片"},{"type_id":8,"type_name":"爱情片"},{"type_id":9,"type_name":"科幻片"}

或者标签是含（"type_pid"）为0都是一级标签
一级标签分类示例；
{"type_id":1,"type_pid":0,"type_name":"电影片"},{"type_id":2,"type_pid":0,"type_name":"连续剧"},{"type_id":3,"type_pid":0,"


二级标签分类（"type_pid"）有数字显示则是二级标签
二级标签分类示例；
{"type_id":6,"type_pid":1,"type_name":"动作片"},{"type_id":7,"type_pid":1,"type_name":"喜剧片"},


例如某些资源网数据在一级标签列表id无内容，可选直接从二级标签列表选择绑定！具体请查看资源网提供的标签列表！

示例：
id绑定可从
{"type_id":6,"type_name":"动作片"}
以下开始全部绑定，请在影视后台管理设置绑定即可！（将标签的ID数字和名称对应填入）


由于部分资源网的CMS接口（josn数据接口）的id绑定内容无显示，示例像上面某个资源返回的josn数据，list&t=1，数字（1）则代表标签列表，如绑定1将会无内容显示，可以在后台设置跳过一些id无显示出来的内容或不需要采集的标签

由于部分资源网标签列表接口的id数字将会影响采集内容，请在影视后台管理设置添加或修改替换

##关于资源标签列表设置（请登录影视后台配置）

登录网站后台管理设置可看到标签列表（只需要更换id数字和标签名称即可，其他不需要修改）

示例：
<a href="/movie.php?cid=6&page=1">动作片</a>
<a href="/movie.php?cid=7&page=1">喜剧片</a>
<a href="/movie.php?cid=8&page=1">爱情片</a><a href="/movie.php?cid=9&page=1">科幻片</a>........以此类推，可自行选择绑定标签

只需要更换id标签和名称即可，其他不用修改
<a href="/cxlist.php?cid=（标签的id）&page=1">（标签的名称）</a>


##微信公众号调用
在目录中找到文件（wx_api.php）
将里面的域名地址替换你的域名地址即可！
以及填入公众号提供的密匙token
将weixin替换密匙token
define("TOKEN", "weixin");

微信号接口调用
你的域名地址/wx_api.php?keyword=



##源码开源或更新
关于整套程序源码开源以及程序更新升级，请到官方开发文档查阅


（建议更新升级程序源码，将更好的体验更多功能和修复）

更多开发详细文档说明和其他采集功能
##其他
本程序请勿非法使用！所采集的资源内容并不代表程序源码！！
本程序仅供学习研究。


##提示

对接资源站，由于资源站涉及网站内容和性质，这里就不做详细介绍，极光CMS程序仅仅是个开源的内容管理系统，不可以引导用户做什么类型的网站。


自适应端模板（支持手机和电脑端浏览）


```{r}
********************************
这是API接口数据格式
********************************

api接口仅供提供数据

视频接口同时支持老板xml格式的数据，增加参数 &at=xml即可。

1,视频部分
列表http://域名/api.php/provide/vod/?ac=list
详情http://域名/api.php/provide/vod/?ac=detail

同样支持老板xml格式的数据
列表api.php/provide/vod/at/xml/?ac=list
详情api.php/provide/vod/at/xml/?ac=detail


JSON列表数据格式：

{"code":1,"msg":"数据列表","page":1,"pagecount":1,"limit":"20","total":15,"list":[{"vod_id":21,"vod_name":"测试1","type_id":6,"type_name":"子类1","vod_en":"qingjian","vod_time":"2018-03-29 20:50:19","vod_remarks":"超清","vod_play_from":"youku"},{"vod_id":20,"vod_name":"测试2","type_id":6,"type_name":"子类1","vod_en":"baolijiequ","vod_time":"2018-03-27 21:17:52","vod_remarks":"超清","vod_play_from":"youku"},{"vod_id":19,"vod_name":"测试3","type_id":6,"type_name":"子类3","vod_en":"chaofanzhizhuxia2","vod_time":"2018-03-27 21:17:51","vod_remarks":"高清","vod_play_from":"youku"},{"vod_id":18,"vod_name":"测试4","type_id":6,"type_name":"子类4","vod_en":"muxingshangxing","vod_time":"2018-03-27 21:17:37","vod_remarks":"高清","vod_play_from":"youku"},{"vod_id":15,"vod_name":"测试5","type_id":6,"type_name":"子类5","vod_en":"yingxiongbense2018","vod_time":"2018-03-22 16:09:17","vod_remarks":"高清","vod_play_from":"qiyi,sinahd"},{"vod_id":13,"vod_name":"测试6","type_id":8,"type_name":"子类6","vod_en":"piaoxiangjianyu","vod_time":"2018-03-21 20:37:52","vod_remarks":"全36集","vod_play_from":"youku,qiyi"},{"vod_id":14,"vod_name":"测试7","type_id":8,"type_name":"子类7","vod_en":"guaitanzhimeiyingjinghun","vod_time":"2018-03-20 21:32:27","vod_remarks":"高清","vod_play_from":"qiyi"}]}


列表接收参数：
ac=list
t=类别ID
pg=页码
wd=搜索关键字
h=几小时内的数据
例如： http://域名/api.php/provide/vod/?ac=list&t=1&pg=5   分类ID为1的列表数据第5页


JSON内容数据格式：
{"code":1,"msg":"数据列表","page":1,"pagecount":1,"limit":"20","total":1,"list":[{"vod_id":21,"vod_name":"测试1","type_id":6,"type_name":"子类1","vod_en":"qingjian","vod_time":"2018-03-29 20:50:19","vod_remarks":"超清","vod_play_from":"youku","vod_pic":"https:\/\/localhost\/view\/photo\/s_ratio_poster\/public\/p2259384068.jpg","vod_area":"大陆","vod_lang":"国语","vod_year":"2018","vod_serial":"0","vod_actor":"主演们","vod_director":"导演","vod_content":"这可是详情介绍啊","vod_play_url":"正片$http:\/\/localhost\/v_show\/id_XMTM0NTczNDExMg==.html"}]}



内容接收参数：
参数 ids=数据ID，多个ID逗号分割。
     t=类型ID
     pg=页码
     h=几小时内的数据

例如:   http://域名/api.php/provide/vod/?ac=detail&ids=123,567     获取ID为123和567的数据信息
        http://域名/api.php/provide/vod/?ac=detail&h=24     获取24小时内更新数据信息


另附上xml返回格式：
XML列表数据格式：
<?xml version="1.0" encoding="utf-8"?><rss version="5.0"><list page="1" pagecount="23" pagesize="20" recordcount="449"><video><last>2012-05-06 13:32:28</last><id>493</id><tid>9</tid><name><![CDATA[测试]]></name><type>子类1</type><dt>dplayer</dt><note><![CDATA[]]></note><vlink><![CDATA[http://localhost/vod/?493.html]]></vlink><plink><![CDATA[http://localhost/vodplay/?493-1-1.html]]></plink></video></list><class><ty id="1">分类1</ty><ty id="2">分类2</ty><ty id="3">分类3</ty><ty id="4">分类4</ty><ty id="5">子类1</ty><ty id="6">子类2</ty><ty id="7">子类3</ty><ty id="8">子类4</ty><ty id="9">子类5</ty><ty id="10">子类6</ty><ty id="11">子类7</ty><ty id="12">子类8</ty><ty id="13">子类9</ty><ty id="14">子类10</ty><ty id="15">子类11</ty></class></rss>

XML内容数据格式：
<?xml version="1.0" encoding="utf-8"?><rss version="5.0"><list page="1" pagecount="1" pagesize="20" recordcount="1"><video><last>2012-05-06 13:32:28</last><id>493</id><tid>9</tid><name><![CDATA[测试1]]></name><type>恐怖片</type><pic>http://localhost/uploads/20091130205750222.JPG</pic><lang>英语</lang><area>欧美</area><year>2012</year><state>0</state><note><![CDATA[]]></note><type>_9</type><actor><![CDATA[]]></actor><director><![CDATA[Ryan Schifrin]]></director><dl><dd from="qvod"><![CDATA[第1集$http://localhost/1.mp4|]]></dd></dl><des><![CDATA[<p>简单介绍。 <br /></p>]]></des><vlink><![CDATA[http://localhost/vod/?493.html]]></vlink><plink><![CDATA[http://localhost/vodplay/?493-1-1.html]]></plink></video></list></rss>

********************************
```