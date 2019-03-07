# Staff Profile Sync
Module to sync staff profile entities with data found in a central database

Using this module requires adding a second database to the config.php with the name STAFF_DB
Example:

$database['STAFF_DB']['default'] = array(
  'database' => 'staff_info',
  'username' => 'root',
  'password' => 'password',
  'prefix' => '',
  'host' => php_sapi_name() == 'cli' ? '127.0.0.1' : 'localhost',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
