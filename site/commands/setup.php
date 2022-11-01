<?php

return [
    'description' => 'Boilerplate Setup',
    'args' => [],
    'command' => static function (Kirby\CLI\CLI $cli): void {
        $input = $cli->confirm('Execute Setup?');

        if ($input->confirmed()) {
            $cli->success("Done!");
        } else {
            $cli->info("Skipped setup!");
        }
    }
];
