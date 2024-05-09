# メルカリ風アプリ

## プロダクト概要
COACHTECHブランドの商品の購入、出品を自由に行えるフリーマーケットアプリ  
*目的: coachtechブランドのアイテムを出品  
*市場ポジショニング：既存のアプリは機能や画面が複雑で使いづらいことに着目したUI/UX改善による新規取込  
* 機能:  
    * 商品の出品、検索、購入  
    * 安全な決済システム  
    * ユーザーコメントと店舗代表者コメントシステム  
    * 商品のお気に入り、購入履歴、出品履歴の管理  
    * 購入後の配送先変更  
    * ユーザープロフィール登録  
    * ユーザ管理機能  
* 技術スタック  
    * バックエンド：laravel 10  
    * データベース：MySQL  
    * 決済システム：Stripe API   

## 環境構築

ディレクトリに、20240509_fleamarcket.gitをクローン
```
git clone git@github.com:Fujita-Hi/20240509_fleamarcket.git
```
dockerで環境を構築
```
docker-compose up -d --build
```
パッケージをインストール
```
docker-compose exec php bash
```
PHPコンテナ上で実行
```
composer install
php artisan key:generate
```
画像格納のためにシンボリックリンク作成
```
php artisan storage:link
```
ターミナル上でsrc配下に移動し.envを.env.exampleを下に作成し必要に応じ編集  
```
cd src/
cp .env.example .env
```
Stripe APIのために.envファイルに使用者のAPIキーを追記
```
STRIPE_KEY=公開可能キー
STRIPE_SECRET=シークレットキー
```
