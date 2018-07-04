# Laravel CRUD 基礎實作 (windows)

### 安裝環境設定跟laravel專案

laravel安裝環境如下:

PHP >= 7.0.0<br>
OpenSSL PHP Extension<br>
PDO PHP Extension<br>
Mbstring PHP Extension<br>
Tokenizer PHP Extension<br>
XML PHP Extension<br>
Composer (PHP Dependency Manager)<br>

我們使用懶人包xampp就行，建議安裝位置不要再C槽。<br>

### 安裝Composer<br>
1.下載安裝[Composer](https://getcomposer.org/download/)<br>
2. php composer.phar -v確認是否安裝成功<br>
3. 安裝laravel  輸入composer global require "laravel/installer"<br>
4. 建立專案，設定路徑位置，例如:我是設定D:\xampp\htdocs<br>
5. 輸入laravel new crud (new後面隨便設定一個名稱)，跑完之後會在D:\xampp\htdocs 出現一個crud專案<br>
6. 以編輯器開啟D:\xampp\apache\conf\extra\httpd-vhosts.conf<br>
7. 第16行輸入LISTEN 8000。27行改<VirtualHost *:8000>。 
       29行改DocumentRoot "D:\xampp\htdocs\crud\public"<br>
       
8.執行php artisan serve並打開<http://localhost:8000/> 應該可以看到 Laravel 專案初始的首頁 (記得XAMPP要開啟Apache跟MySQL)<br>

### 安裝編輯器
我是用vscode  [可參考這篇](https://dometi.com.tw/blog/laravel-beginner-04)<br>


### 建立聯絡我們表單

1.在 `routes/web.php` 裡增加 route `GET /contactUs`，並指向 `ContactUsController@index`<br>
2.下指令建 controller `$ php artisan make:controller ContactUsController`<br>
3.修改 index method 回傳 `return view('contact.index');` 對應的檔案是 `resources/views/contact/index.blade.php`<br>
4.手動建立 `resources/views/contact/index.blade.php`<br>
5.下載找了一個[Bootstrapious](https://bootstrapious.com/p/how-to-build-a-working-bootstrap-contact-form)<br>
6.把index程式碼貼到index.blade.php<br>
7.舉例，要引用 `jquery.min.js` 請下載後放在 `public/js` 下；要引用 `bootstrap.min.css` 請下載後放在 `public/css` 下，在 `contact/index.blade.php` 裡這樣寫：<br>

<link rel="stylesheet" href="/css/bootstrap.min.css" /><br>
<script src="/js/jquery.min.js"></script><br>

8.重新整理 <http://localhost:8000/contactUs> 看到「聯絡我們」表單<br>
