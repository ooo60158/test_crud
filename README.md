# Laravel CRUD 基礎實作 (windows)

### 1.安裝環境設定跟laravel專案

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

### 2.安裝編輯器
我是用vscode  [可參考這篇](https://dometi.com.tw/blog/laravel-beginner-04)<br>


### 3.建立聯絡我們表單

1.在 routes/web.php 裡增加 route GET /contactUs，並指向 ContactUsController@index<br>
2.下指令建 controller $ php artisan make:controller ContactUsController<br>
3.修改 index method 回傳 return view('contact.index'); 對應的檔案是 resources/views/contact/index.blade.php<br>
4.手動建立 resources/views/contact/index.blade.php<br>
5.下載找了一個[Bootstrapious](https://bootstrapious.com/p/how-to-build-a-working-bootstrap-contact-form)<br>
6.把index程式碼貼到index.blade.php<br>
7.舉例，要引用 jquery.min.js 請下載後放在 public/js 下；要引用 bootstrap.min.css 請下載後放在 public/css`下，在 contact/index.blade.php 裡這樣寫：
``` html
<link rel="stylesheet" href="/css/bootstrap.min.css" />
<script src="/js/jquery.min.js"></script>
```

8.重新整理 <http://localhost:8000/contactUs> 看到「聯絡我們」表單<br>


### 4.表單 POST 傳送資料到後端並顯示


1.聯絡我們表單舉例，重點在 action="/submitContact" 和 method='POST'
```
<form action="/submitContact" method="POST">
    // 中間略
    <button type="submit">送出</button>
</form>
```
2.在 route 中加入 `POST /submitContact` 並指向 `ContactUsController@store`<br>
3.在 ContactUsController 中新增 `store` method 來處理 POST 進來的資料<br>
4. 在 store` method 中寫 `dd( request()->all() ); 可以 die & dump 所有 POST 進來的資料，用做 debug<br>
5. 再回到 <http://localhost:8000/contactUs> 輸入假資料按 `送出`，認識一下 TokenMismatchException 的錯誤訊息<br>
6. 在表單加入 {{ csrf_field() }}，如下：
```
<form action="/submitContact" method="POST">
    {{ csrf_field() }}
    // 中間略
    <button type="submit">送出</button>
</form>
```

8.再回到 <http://localhost:8000/contactUs> 輸入假資料按 `送出`，畫面上應該會出現你剛剛輸入的資料了。<br>

### 5.資料庫連線

1. 建立 l53_crud 資料庫<br>
2. 建立 homestead 使用者，設密碼為 secret<br>
3. 把 l53_crud 資料庫的權限開給 homestead 使用者，權限全開<br>
4. 編輯 .env 檔<br>

DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=l53_crud<br>
DB_USERNAME=homestead<br>
DB_PASSWORD=secret<br>


