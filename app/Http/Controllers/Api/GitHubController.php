<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class GitHubController extends ApiController
{
    public function Push(Request $request)
    {
        // sudo -u www-data ssh-keygen - генерим ssh ключи под www-data
        // chmod 600 /var/www/.ssh/ida_rsa - для работы git pull под www-data
        echo 'git pull start' . PHP_EOL;
        echo shell_exec('git pull');
        echo 'git pull complete' . PHP_EOL;

        echo 'php artisan migrate start' . PHP_EOL;
        echo shell_exec('php artisan migrate');
        echo 'php artisan migrate complete' . PHP_EOL;

    }
}
