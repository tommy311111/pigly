# mogitate

## 環境構築
**Dockerビルド**
1. `git clone git@github.com:tommy311111/mogitate-form.git`
2. DockerDesktopアプリを立ち上げる
3. `docker-compose up -d --build`

**Laravel環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
4. .envに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
5. アプリケーションキーの作成
``` bash
php artisan key:generate
```

6. マイグレーションの実行
``` bash
php artisan migrate
```

7. シーディングの実行
``` bash
php artisan db:seed
```

## 使用技術(実行環境)
- PHP7.4.9
- Laravel8.83.3
- MySQL8.0.26

## ER図

![erd](https://github.com/user-attachments/assets/f5d46a0b-2aaf-4f59-9362-0b2fea09692c)

## URL
- 開発環境：http://localhost/products
- phpMyAdmin:：http://localhost:8080/
