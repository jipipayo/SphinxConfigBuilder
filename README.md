SphinxConfigBuilder
=========================

A php class to build the sphinx search configuration file dynamically from php.

Why this class?

Sphinx search (http://sphinxsearch.com/) usually works well with a simple plain text file with the configuration data used by searchd and indexer.
But sometimes in big projects you have to handle with this file that starts to grow, and run in different machines
or environments. You finally duplicate this file and loosing the control of the real state of this changes.

With SphinxConfiguratorBuilder you could achieve 2 important goals:

1) using SphinxConfigBuilder now the sphinx configuration is part of the code of your application.

2) you could generate sphinx configurations dinamically: differents db confs, dev environment or prod, automatize, add to CI flows, smoke tests, etc...


How to use it?

Open the file config_sample.php, you will see a sample use case, modify this file and save it as sphinx_config.php (or other name)
add the SphinxConfiguratorBuilder to your project path.

Do not forget to start your sphinx_config.php file with the shebang as shown in the config_sample.php file:

    #!/usr/bin/php

now simply run:

    indexer --config /path/to/config_sample.php --all --rotate
  
or 

    searchd --config /path/to/config_sample.php
    
    
Inspired by this cpan module in perl : https://metacpan.org/pod/Sphinx::Config::Builder

