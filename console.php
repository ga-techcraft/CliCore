<?php
spl_autoload_extensions(".php");
spl_autoload_register(function($class) {
    $file = __DIR__ . '/'  . str_replace('\\', '/', $class). '.php';
    if (file_exists(stream_resolve_include_path($file))) include($file);
});

$commands = include "Commands/registry.php";

$inputCommand = $argv[1];

foreach ($commands as $commandClass) {
    if ($inputCommand === $commandClass::getAlius()) {
        try {
            $command = new $commandClass();
            $command->execute();
            exit(0);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

fwrite(STDERR, "Failed to run any commands");

// コマンドライン引数からコマンド名を取得

// registryからコマンド一覧を取得

// マッチするクラスをnewしてexecute()


// ✅ 最初に目指す最低ライン
// コマンド名でクラスが切り替わる

// 必須オプションを受け取れる

// execute()が動いて何かメッセージを出す

// これだけできたら一旦「最小コマンドシステム完成」！

// ✅ 最後に「大まかな開発手順」
// app.phpでコマンドを読み込んで実行できるようにする

// Commandインターフェースを作る

// AbstractCommandに引数パース機能を書く

// 最初のコマンド（Greet）を作る

// registryに登録して実行できるようにする

// 余裕があればエラー処理やヘルプも追加する