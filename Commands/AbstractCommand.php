<?php

namespace Commands;

use Exception;

 abstract class AbstractCommand implements Command{
  protected static ?string $alius = null;
  protected static bool $requireCommandValue = false;

  public function __construct() {
    $this->setUpArgsMap();
  }

  private function setUpArgsMap(): void{
    $args = $GLOBALS['argv'];
    $startIndex = array_search($this->getAlius(), $args);

    if ($startIndex === false) throw new Exception(sprintf(sprintf("%sは存在しません"), $this->getAlius()));
    else $startIndex++;

    if (!isset($args[$startIndex]) || $args[$startIndex][0] === '-') {
      if (static::$requireCommandValue === true) {
        throw new Exception(sprintf("%sにはcommand value が必要です。", static::$alius));
      }
    } else {
      
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