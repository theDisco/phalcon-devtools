<?php

/*
  +------------------------------------------------------------------------+
  | Phalcon Framework                                                      |
  +------------------------------------------------------------------------+
  | Copyright (c) 2011-2012 Phalcon Team (http://www.phalconphp.com)       |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file docs/LICENSE.txt.                        |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@phalconphp.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
  | Authors: Andres Gutierrez <andres@phalconphp.com>                      |
  |          Eduar Carvajal <eduar@phalconphp.com>                         |
  +------------------------------------------------------------------------+
*/

namespace Phalcon\Commands\Builtin;

use Phalcon\Script\Color;
use Phalcon\Commands\Command;
use Phalcon\Commands\CommandInterface;

/**
 * Phalcon\Commands\Enumerate
 *
 * List commands loaded in devtools
 */
class Enumerate extends Command implements CommandInterface
{

    public function run()
    {
        print Color::colorize('Available commands:', Color::FG_BROWN) . PHP_EOL ;
        foreach ($this->getScript()->getCommands() as $commands) {
            $providedCommands = $commands->getCommands();
            print '  ' . Color::colorize($providedCommands[0], Color::FG_GREEN);
            unset($providedCommands[0]);
            if (count($providedCommands)) {
                print ' (alias of: ' . Color::colorize(join(', ', $providedCommands)) . ')';
            }
            print PHP_EOL;
        }
        print PHP_EOL;
    }

    /**
     * Returns the commands provided by the command
     *
     * @return string|array
     */
	public function getCommands()
    {
		return array('commands', 'list', 'enumerate');
	}

    /**
     * Prints help on the usage of the command
     *
     */
	public function getHelp()
    {

	}

}