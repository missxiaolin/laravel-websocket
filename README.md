# laravel-websocket

### 项目
~~~
cp .env.example .env
php artisan key:generate
~~~

### 项目打包

生成模板文件

~~~
node public/tools/boot.js
~~~

### 执行打包

~~~
public/tools/r.js -o ../app.build.js
~~~

### 项目登录

账号：17135501103、17135501104
密码：123456

### socket启动

~~~
php artisan web:socket:server // 启动直播
php artisan web:socket:chat:server // 启动聊天室
~~~