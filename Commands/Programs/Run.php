<?php

namespace Commands\Programs;

use Commands\AbstractCommand;
use Commands\Argument;

class Run extends AbstractCommand{
  protected static string $alias = 'run';
  public static bool $isRequiredCommandValue = true;

  public static function getArguments(): array{
    return [
      new Argument('a')->description('a')->required(false)->allowAsShort(true),
    ];
  }

  public function execute(): int{
    echo 'this is run command';
    return 0;
  }
}