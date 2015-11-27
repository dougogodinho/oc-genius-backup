<?php namespace Genius\Backup\Console;

use Illuminate\Support\Facades\Config;
use Storage;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use System\Models\File;

class Backup extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'backup';

    /**
     * @var string The console command description.
     */
    protected $description = 'Fast Backup all Application.';

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
        // início
        $this->info('--');

        $mysqldump = $this->getDumpCommand();
        $conn = Config::get('database.default');
        $host = Config::get("database.connections.$conn.host");
        $database = Config::get("database.connections.$conn.database");
        $username = Config::get("database.connections.$conn.username");
        $password = Config::get("database.connections.$conn.password");

        $sql_file = date('Y-m-d_H-i-s'). '.sql';
        $zip_file = date('Y-m-d_H-i-s'). '.zip';

        $base_path = base_path();
        $files = implode(' ',[
            'bootstrap/*',
            'config/*',
            'modules/*',
            'plugins/*',
            'storage/*',
            'themes/*',
            'vendor/*',
            '.htaccess',
            'index.php',
        ]);

        system("cd $base_path && $mysqldump -h$host -u$username -p$password --lock-tables $database > $sql_file && zip $zip_file $files");

        // fim
        $this->info('--');
    }

    private function getDumpCommand() {

        $available = array(
            '/usr/bin/mysqldump', // Linux
            '/usr/local/mysql/bin/mysqldump', //Mac OS X
            '/usr/local/bin/mysqldump', //Linux
            '/usr/mysql/bin/mysqldump' //Linux
        );

        foreach($available as $dumpCommand) {

            if (is_executable($dumpCommand)){

                return $dumpCommand;
            }
        }
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}
