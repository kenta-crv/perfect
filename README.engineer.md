# Laravel Template
It's a template for develop project "rapidly" under the environment Laravel / Docker


## プロジェクトの始め方
1. Git Hub上でプロジェクト用の空リポジトリを作成<br>
※このとき作成したリポジトリ名を以下 \<ProjectName\> で表します<br>

2. プロジェクトフォルダを配置するディレクトリで以下のコマンドを実行<br>
```bash
$ git clone --bare git@github.com:Innovation-Lab/laravel-template.git
$ cd ./laravel-template.git
$ git push --mirror git@github.com:Innovation-Lab/<ProjectName>
$ cd ..
$ git clone git@github.com:Innovation-Lab/<ProjectName> #sourceTree, その他のgitクライアントでクローンでもOK
$ rm -rf laravel-template.git #不要なので削除
$ cd <ProjectName>
$ make establish
```
※MakeコマンドについてはMakefileを参照

## TIPS
### mailhogについて
メール送信機能のテスト用のSMTPサーバーとしてsmtpコンテナを用意してあります。<br>
これはmailhogというテスト用のSMTPサーバーソフトウェアで、.envにはデフォルトでこのコンテナへの接続情報を記してあります。<br>
使用するにあたって、特に設定は必要ありません。（.envに設定済みのため）<br>

アプリケーションから送信されたメールの確認はブラウザで以下のURLに接続することで確認できます。<br>
```
http://localhost:8025
```

### 各コンテナのログを確認したい
- web
    - ./docker/web/nginx/volumes/log ディレクトリ内に格納されている<br>

|file name|description|
|:---|:---|
| access.log | アクセスログ |
| error.log | エラーログ |

- db
    - ./docker/db/mysql/volumes/log ディレクトリ内に格納されている<br>
    
|file name|description|
|:---|:---|
| error.log | エラーログ |
| slowquery.log | 実行に1秒以上時間を要したクエリが記録される |
| mysql-general.log | 実行したクエリが記録される |

### 本番環境用にhttps化したい
- docker-compose.ymlファイルのservices:web:volumes欄に記載されている
```
#      ローカル環境での開発用設定ファイル
- ./docker/web/nginx/conf.d/default.conf:/etc/nginx/conf.d/default.conf
```
をコメントアウトし、
```
#      本番環境でHTTPS化する際の設定ファイル
#      - ./docker/web/nginx/conf.d/default.conf:/etc/nginx/conf.d/default.conf
```
のコメントアウトを外す<br>

- ./docker/web/nginx/conf.d/ssl.conf ファイルの33行目以降にSSL証明書の設定を記載する


## 環境構成
|コンテナ名|環境|ベースイメージ|  
|:---|:---|:---|
|web|nginx|nginx:1.19.2 - alpine|
|db|MySQL 5.7|mysql:5.7|
|app|PHP 7.4 & Laravel 6.2 LTS|php:7.4 - fpm|
|smtp|mailhog|alpine:3.4|


## コンテナ構造
```
client --> web <--> app <--> db
  |                  |
  └------> smtp <----┘        
```
