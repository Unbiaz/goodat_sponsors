<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;

trait SaveDBTrait {

    public function saveDB() {

		$debugMe = true;
    
        $toDay = date('d-m-Y');

		$dbconfig = ConnectionManager::config('default');
		//debug('Log:' );
		//debug($dbconfig);
		
	    $dbhost = $dbconfig['host'];
	    $dbuser = $dbconfig['username'];
	    $dbpass = $dbconfig['password'];
	    $dbname = $dbconfig['database'];
    	
    	//define('SQLDUMP', ROOT . DS . 'sql_dumps');

    	$directory = ROOT . DS . 'sql_dumps';
    	$filename = $directory . DS . "GAD_".$toDay."_DB.sql";

		if (!file_exists($filename)) {
						
	    	exec("cd $directory; gzip *.sql > /dev/null &");
	    	exec("mysqldump --user=$dbuser --password='$dbpass' --host=$dbhost $dbname > $filename &");

		}
    }
}

?>