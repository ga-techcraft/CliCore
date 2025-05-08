<?php

namespace Commands;

use Exception;

abstract class AbstractCommand implements Command{
    protected static string $alias = '';
    private array $argsMap = [];
    public static bool $isRequiredCommandValue = false;

    public function __construct(){
        $args = $GLOBALS['argv'];
        $currentIndex = array_search(static::getAlias(), $args) + 1;

        // - または 何もない、かつコマンドバリューが必要な場合は、例外を投げる。
        if (!isset($args[$currentIndex]) || $args[$currentIndex] === '-') {
            if (static::isCommandValueRequired()) {
                throw new Exception("Command value is required.");
            }
        }
        else{
            $this->argsMap[static::getAlias()] = $args[$currentIndex];
            $currentIndex++;
        }

        $shellArgs = [];

        for ($i = $currentIndex; $i < count($args); $i++) {
            $arg = $args[$i];
            if (strlen($arg) >= 2 && $arg[0] . $arg[1] == '--') {
                $key = substr($arg, 2);
            } else if ($arg[0] == '-') {
                $key = substr($arg, 1);
            } else {
                throw new Exception("Options must start with - or --");
            }

            $shellArgs[$key] = true;

            if (isset($args[$i + 1]) && $args[$i + 1] !== '-') {
                $shellArgs[$key] = $args[$i + 1];
                $i++;
            }
        }

        foreach (static::getArguments() as $argument) {
            $argString = $argument->getArgument();
            $value = null;
            
            if($argument->isShortAllowed() && isset($shellArgs[$argString[0]])) $value = $shellArgs[$argString[0]];
            else if(isset($shellArgs[$argString])) $value = $shellArgs[$argString];

            if($value === null){
                if($argument->isRequired()) throw new Exception(sprintf('Could not find the required argument %s', $argString));
                else $this->argsMap[$argString] = false;
            }
            else $this->argsMap[$argString] = $value;
        }

        print_r($this->argsMap);
    }

    public static function getAlias(): string{
        return static::$alias;
    }

    public static function help(): string{
        return sprintf("this is %s command's help", static::getAlias());
    }

    public static function isCommandValueRequired(): bool{
        return static::$isRequiredCommandValue;
    }

    public function getArgumentValue(string $arg): bool | string{
        return $this->argsMap[$arg];
    }

}
