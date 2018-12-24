网页版天气预报的页面逻辑可在public/miniweather下查看，在static下部署了网页前端css/js文件。
调用jssdk接口获取位置信息，并在公众号内访问天气预报网页，代码在public/wx下查看。主要php+html为sample1.php。
主要实现：
调用jssdk接口，在公众号内获取查询地理位置的功能并把位置信息作为参数返回给天气预报程序，
天气预报通过查询在线数据库，获取并显示天气信息。


