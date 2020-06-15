<?php
use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;
use function GuzzleHttp\json_decode;

function call_fb($method, $url, $data){
    if($method=='get'){
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebasekey.json');
    $firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://intro-2b6f3.firebaseio.com/')->create();

    $database = $firebase->getDatabase();
    $reference = $database->getReference($url);
        $snapshot = $reference->getSnapshot();
        $k1 = $snapshot->getValue();
        $b = json_decode(json_encode($k1), true);

        return $b;
    }
    else if($method=='update'){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebasekey.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://intro-2b6f3.firebaseio.com/')->create();
    
        $database = $firebase->getDatabase();
        $database->getReference(''.$url)->set($data);
    }
    else if($method=='create'){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebasekey.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://intro-2b6f3.firebaseio.com/')->create();
    
        $database = $firebase->getDatabase();
        $ref = $database->getReference(''.$url);
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set($data);
    }
}
