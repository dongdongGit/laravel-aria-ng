#aria-ng 登录
## 配置环境
### 需配置的环境：
- [laravel 5.8 所需环境](https://laravel.com/docs/5.8/installation)
- mysql 
- node
- gulp
```  
cp .env.example .env (复制完后配置数据库信息)
composer install --no-dev
npm i
gulp clean build
php artisan key:generate
php artisan make:auth
php artisan db:seed --class=UsersTableSeeder
```