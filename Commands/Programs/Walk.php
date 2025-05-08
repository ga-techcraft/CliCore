<?php

namespace Commands\Programs;

use Commands\AbstractCommand;
use Commands\Argument;

class Walk extends AbstractCommand{
  protected static string $alias = 'walk';

  public static function getArguments(): array{
    return [
      new Argument('a')->description('a')->required(false)->allowAsShort(true),
    ];
  }

  public function execute(): int{
    echo 'this is walk command';
    return 0;
  }
}