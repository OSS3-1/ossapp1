<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Alaxos' => $baseDir . '/vendor/alaxos/cakephp3-libs/',
        'Alaxos/BootstrapTheme' => $baseDir . '/vendor/alaxos/cakephp3-bootstrap-theme/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Proffer' => $baseDir . '/vendor/davidyell/proffer/'
    ]
];