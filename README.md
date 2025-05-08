# コマンドシステム自作用まとめ（設計図）

## システムの目的
- ターミナルからコマンド名と引数を受け取り、対応するクラスを実行する
- コマンドは共通のルールに従う
- 共通処理（引数解析・エラーチェック・ヘルプ生成）は親クラスにまとめる

---

## ファイル構成

| ファイル | 内容 |
|:--|:--|
| `console` | エントリーポイント。コマンド選択＆実行 |
| `Commands/Command.php` | コマンド用インターフェース |
| `Commands/AbstractCommand.php` | コマンドの共通処理 |
| `Commands/Programs/Greet.php` | 例：greetコマンドクラス |
| `Commands/registry.php` | 登録コマンドリスト |
| `Commands/Argument.php` | オプション引数用クラス |

---

## 各ファイルの役割（イメージ）

### 1. `console`
- `$argv`からコマンド名を取得
- 登録コマンド一覧と照合
- マッチしたらnewして`execute()`を呼び出す

### 2. `Command.php`
- `getAlias(): string`
- `getArguments(): array`
- `execute(): int`
を定義するインターフェース

### 3. `AbstractCommand.php`
- `$argv`から引数をパース
- 必須引数チェック
- ログ出力メソッド
- ヘルプテキスト生成

### 4. `Greet.php`
- `AbstractCommand`を継承
- `getAlias()`で `'greet'`を返す
- `getArguments()`で `--name`を定義
- `execute()`で「こんにちは、○○さん！」を表示

### 5. `registry.php`
- 使用可能なコマンドクラスを配列で返す

---

## 最低目標（MVP）

- コマンド名でクラスが切り替わる
- 必須オプションを受け取れる
- execute()が動いて何か出力できる

---

## 開発手順

1. `console`を作成して、コマンド起動ロジックを作る
2. `Command`インターフェースを作成
3. `AbstractCommand`に引数パース処理を書く
4. 最初のコマンド (`Greet`)を作成
5. `registry.php`にコマンドを登録
6. 正常実行できたら、オプション機能・ヘルプ機能を追加

## 学び