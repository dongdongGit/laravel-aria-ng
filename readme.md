#aria-ng 登录
## 配置环境
### 需配置的环境：
- [laravel 5.8 所需环境](https://laravel.com/docs/5.8/installation)
- mysql 
- node
- gulp
     
 1. cp .env.example .env (复制完后配置数据库信息)
 2. composer i
 3. npm i
 4. gulp clean build
 5. php artisan key:generate
 6. php artisan make:auth
 7. php artisan db:seed --class=UsersTableSeeder