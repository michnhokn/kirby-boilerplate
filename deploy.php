<?php

namespace Deployer;

require 'recipe/common.php';

set('keep_releases', 3);
set('repository', 'REPOSITORY_URL');

add('shared_files', [
    'site/config/.license',
    'site/config/env.php',
    'site/config/retour.yml'
]);
add('shared_dirs', [
    'content',
    'storage/accounts',
    'storage/sessions',
    'storage/logs'
]);
add('writable_dirs', []);

// Hosts
host('REMOTE_HOST')
    ->set('remote_user', 'REMOTE_USER')
    ->set('deploy_path', 'DEPLOY_PATH');

// custom tasks
task('build_assets', function () {
    runLocally('npm install');
    runLocally('npm run build');
    upload(__DIR__ . "/public/dist", '{{release_path}}/public');
});

task('upload_content', function () {
    upload(__DIR__ . "/content/", '{{deploy_path}}/shared/content/');
});

task('download_content', function () {
    download('{{deploy_path}}/shared/content/', __DIR__ . "/content/");
});

// Hooks
after('deploy:failed', 'deploy:unlock');
after('deploy:update_code', 'build_assets');
after('deploy:update_code', 'deploy:vendors');
