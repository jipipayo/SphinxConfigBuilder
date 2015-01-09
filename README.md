SphinxConfigBuilder
=========================

A php class to build the sphinx search configuration file dynamically from php.

<h3>Why this class?</h3>

Sphinx search (http://sphinxsearch.com/) usually works well with a simple plain text file with the configuration data used by searchd and indexer.
But sometimes in big projects you have to handle with this file that starts to grow, and run in different machines
or environments. You finally duplicate this file and loosing the control of the real state of this changes.

Readed this tweet and gave me the idea to pass a file on the fly as configuration:
https://twitter.com/pda/status/7368710004154368

With SphinxConfiguratorBuilder you create sphinx configurations dinamically: differents db confs, dev environment or prod, automatize, add to CI flows, smoke tests, etc...

<h3>Install</h3>
You can install with composer: https://getcomposer.org/
Simply add this line to your composer.json (required section):

        "jipipayo/sphinx-config-builder": "dev-master"
update your composer modules in your project:

    composer update
this will download and install this class and you are ready to start to use it.


<h3>How to use it?</h3>

Open the file config_sample.php, you will see a sample use case, modify this file and save it as sphinx_config.php (or other name)
add the SphinxConfiguratorBuilder to your project path.

Do not forget to start your sphinx_config.php file with the shebang as shown in the config_sample.php file:

    #!/usr/bin/env  php

now simply run:

    indexer --config /path/to/config_sample.php --all --rotate
  
or 

    searchd --config /path/to/config_sample.php
    
    
Inspired by this cpan module in perl : https://metacpan.org/pod/Sphinx::Config::Builder

