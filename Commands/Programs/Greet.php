<?php
namespace Commands\Programs;

use Commands\AbstractCommand;

class Greet extends AbstractCommand{
  protected static ?string $alius = "greet";

  public function execute(): int{
    echo "this is greet command";
    return 0;
  }
}
// AbstractCommandを継承

// getAliau()で'greet'を返す

// getArguments()で--name引数を定義

// execute()で挨拶する