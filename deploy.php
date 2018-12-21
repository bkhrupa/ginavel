<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'ginery');

// Project repository
set('repository', 'git@github.com:bkhrupa/ginery.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);

// Hosts
host('lizard-if-ua')
    ->stage('prod')
    ->set('writable_mode', 'chmod')
    ->set('branch', 'develop')
    ->set('deploy_path', '~/ginery-bill.lizard.if.ua');
    
// Tasks

// Events
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

before('deploy:symlink', 'artisan:down');
// Migrate database before symlink new release.
after('artisan:down', 'artisan:migrate');
after('cleanup', 'artisan:up');
