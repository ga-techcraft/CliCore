<?php

namespace Commands;

interface Command{
  public static function isCommandValueRequired(): bool;

  public function execute(): int;
}

// getAlias()

// get Arguments()

// execute()