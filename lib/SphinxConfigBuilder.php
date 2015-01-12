<?php
class SphinxConfigBuilder
{
    private  $types;
    private  $config;

    public function __construct(){
        $this->types = array('source', 'index');
    }

    public function searchd( $array ){
        $this->config['searchd'] = $array;
    }

    public function indexer( $array ){
        $this->config['indexer'] = $array;
    }

    public function addEntry( $type,  $name, $array){
        if(!in_array( $type, $this->types ) ){
            die('ERROR:addEntry $type param should be "source" or "index"');
        }
        else {
            $this->config[$type][$name] = $array;
        }
    }

    private function _format_row($value, $key) {
        echo sprintf( "\t%s = %s\n" , $key , $value );
    }

    public function output(){
        foreach ( $this->config as $k => $v ){
            if( in_array ($k, $this->types)){
                //iterate again because could be more than one source or index
                foreach ( $v as $k_entry => $v_entry  ){
                    echo "$k\t$k_entry\t";
                    echo "\n{\n";
                    array_walk($v[$k_entry], array($this, '_format_row'));
                    echo "}\n\n";
                }
            } else {
                echo "$k\t";
                echo "\n{\n";
                array_walk($v, array($this, '_format_row'));
                echo "}\n\n";
            }
        }
    }
}
