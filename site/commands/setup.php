<?php

use Kirby\Cms\App;
use Kirby\Filesystem\F;
use Kirby\Toolkit\Str;

return [
    'description' => 'Boilerplate Setup',
    'args' => [],
    'command' => static function (Kirby\CLI\CLI $cli): void {
        $input = $cli->confirm('Execute Setup?');

        if ($input->confirmed()) {
            $gitUrl = $cli->prompt('Project Git Repository URL:');

            $initCommand = "git init --initial-branch=main -q";
            $connectCommand = "git remote add origin $gitUrl";

            if (shell_exec($initCommand) !== null) {
                $cli->success("Init git repository!");
            }

            if (shell_exec($connectCommand) !== null) {
                $cli->success("Added origin for git repository!");
            }

            $envPath = App::instance()->root('config') . "/env.php.example";
            if (F::exists($envPath)) {
                F::move($envPath, Str::rtrim($envPath, ".example"), true);
            }

            $envPath = App::instance()->root('base') . "/.gitignore.example";
            if (F::exists($envPath)) {
                F::move($envPath, Str::rtrim($envPath, ".example"), true);
            }

            $cli->success("Done!");
        } else {
            $cli->info("Skipped setup!");
        }
    }
];
