# ベースイメージを指定
FROM node:20.8.0

# 作業ディレクトリを設定
WORKDIR /app

# キャッシュ利用で効率化するために別でコピー
COPY ./package.json ./

# 依存関係をインストール
RUN npm install

# アプリケーションを起動
CMD ["npm","run","dev"]
