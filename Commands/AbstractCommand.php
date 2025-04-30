<?php

namespace Commands;

use Exception;

 abstract class AbstractCommand implements Command{
  protected static string $alius;
  protected static bool $requireCommandValue = false;

  public function __construct() {
    $this->setUpArgsMap();
  }

  private function setUpArgsMap(): void{
    $commandValue = isset($GLOBALS['argv'][2]) ? $GLOBALS['argv'][2] : false;

    if ($commandValue === false) {
      if (static::$requireCommandValue === true){
        throw new Exception(sprintf("%sにはcommand value が必要です。", static::$alius));
      }
    }
  }

  public static function getAlius(): string{
    return static::$alius;
  }

  public static function isCommandValueRequired(): bool{
    return static::$requireCommandValue;
  }

  public abstract function execute(): int;
}
// コマンド名を取得

// 引数パース

// ログ出力

// getHelp()生成