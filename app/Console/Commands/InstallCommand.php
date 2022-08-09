<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to install this application from fresh';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->call('key:generate');

        $this->call('migrate:fresh', [
            '--seed' => null,
            '--force' => null,
        ]);

        $this->call('passport:keys');

        $this->call('passport:client', [
            '--password' => null,
            '--no-interaction' => true,
        ]);

        $this->table(
            ['Email', 'Role'],
            Role::get()
                ->map(function ($role) {
                    $user = $role->users()->first();

                    if ($user) {
                        return [
                            $user->email,
                            $role->name,
                        ];
                    }
                })
                ->toArray()
        );
    }
}
