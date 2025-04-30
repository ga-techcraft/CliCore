<?php
namespace Commands\Programs;

use Commands\AbstractCommand;

class Eat extends AbstractCommand{
  protected static string $alius = "eat";
  protected static bool $requireCommandValue = true;

  public function execute(): int{
    echo "this is eat command";
    return 0;
  }
}