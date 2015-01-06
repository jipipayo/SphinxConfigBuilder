<?php
include_once 'SphinxConfigBuilder.php';
$builder = new SphinxConfigBuilder();


$src_vulns_arr = Array(
        'type' => 'mysql',
        'sql_host'  => 'localhost',
        'sql_user'  => 'lulz',
        'sql_pass'  => '12345',
        'sql_port'  => '3306',
    );
$builder->addEntry('source', 'src_test1', $src_vulns_arr);

$src_vulns_arr = Array(
        'type' => 'mysql',
        'sql_host'  => 'otherhost2',
        'sql_user'  => 'lulz',
        'sql_pass'  => '12345',
        'sql_port'  => '3306',
    );
$builder->addEntry('source', 'src_test2:src_test1', $src_vulns_arr);

$builder->searchd( Array(
        'listen' => '127.0.0.1',
        'read_timeout' => 5,
    ));

$builder->indexer( Array(
        'mem_limit' => '64m',
    ));

$builder->output();
