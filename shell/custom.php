<?php
/**
 * Sect 8: Writing shell scripts
 */

require_once 'abstract.php';


class Mage_Shell_Custom extends Mage_Shell_Abstract
{
    public function run()
    {
        if ($this->getArg('example')) {
            echo "Hello World! \n";
        } else {
            echo $this->usageHelp();
        }
    }

    public function usageHelp()
    {
        return <<<USAGE
Usage: php -f custom.php -- [options]
       php -f custom     -- example
       
  example       echo Hello World!
  help          This help

USAGE;
    }
}

(new Mage_Shell_Custom())->run();
