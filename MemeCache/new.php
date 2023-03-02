<?php
    if (class_exists('Memcache')) {
        $cache = new Memcache();
        $cache->connect('localhost',11211);
       }else {
        print "Not connected to cache server";
       }
       