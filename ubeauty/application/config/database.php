<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = HOSTNAME;//'localhost';
$db['default']['username'] = DB_USER;
$db['default']['password'] = DB_PASS;
$db['default']['database'] = DB_NAME;
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

/*GAME*/

//
//$active_group = 'userdata';
//$active_record = TRUE;
/*
$db['userdata']['hostname'] = "103.27.62.167";
$db['userdata']['port'] = 1433;
$db['userdata']['username'] = 'UShaiyaGaming';
$db['userdata']['password'] = '@UNION1UShaiya';
$db['userdata']['database'] = 'PS_UserData';
$db['userdata']['dbdriver'] = 'sqlsrv';
$db['userdata']['dbprefix'] = '';
$db['userdata']['pconnect'] = FALSE;
$db['userdata']['db_debug'] = TRUE;
$db['userdata']['cache_on'] = FALSE;
$db['userdata']['cachedir'] = '';
$db['userdata']['char_set'] = 'utf8';
$db['userdata']['dbcollat'] = 'utf8_general_ci';
$db['userdata']['swap_pre'] = '';
$db['userdata']['autoinit'] = TRUE;
$db['userdata']['stricton'] = FALSE;
*/
//
//
//$active_group = 'webgame';
//$active_record = TRUE;
//$db['webgame']['hostname'] = "103.27.62.167";
//$db['webgame']['port'] = 1433;
//$db['webgame']['username'] = 'UShaiyaGaming';
//$db['webgame']['password'] = '@UNION1UShaiya';
//$db['webgame']['database'] = 'db_test';
//$db['webgame']['dbdriver'] = 'sqlsrv';
//$db['webgame']['dbprefix'] = '';
//$db['webgame']['pconnect'] = FALSE;
//$db['webgame']['db_debug'] = TRUE;
//$db['webgame']['cache_on'] = FALSE;
//$db['webgame']['cachedir'] = '';
//$db['webgame']['char_set'] = 'utf8';
//$db['webgame']['dbcollat'] = 'utf8_general_ci';
//$db['webgame']['swap_pre'] = '';
//$db['webgame']['autoinit'] = TRUE;
//$db['webgame']['stricton'] = FALSE;

//$active_group = 'gamedata';
//$active_record = TRUE;
/*
$db['gamedata']['hostname'] = "103.27.62.167";
$db['gamedata']['port'] = 1433;
$db['gamedata']['username'] = 'UShaiyaGaming';
$db['gamedata']['password'] = '@UNION1UShaiya';
$db['gamedata']['database'] = 'PS_GameData';
$db['gamedata']['dbdriver'] = 'sqlsrv';
$db['gamedata']['dbprefix'] = '';
$db['gamedata']['pconnect'] = FALSE;
$db['gamedata']['db_debug'] = TRUE;
$db['gamedata']['cache_on'] = FALSE;
$db['gamedata']['cachedir'] = '';
$db['gamedata']['char_set'] = 'utf8';
$db['gamedata']['dbcollat'] = 'utf8_general_ci';
$db['gamedata']['swap_pre'] = '';
$db['gamedata']['autoinit'] = TRUE;
$db['gamedata']['stricton'] = FALSE;
*/
/* End of file database.php */
/* Location: ./application/config/database.php */
//
//$db[2] = array(
//    "dbhost" => 'localhost',
//    "dbuser" => 'webmaster',
//    "dbpw" => '#UNImaster)^09',
//    "dbname" => 'PS_UserData',
//
//);
//$db[3] = array(
//    "dbhost" => 'localhost',
//    "dbuser" => 'webmaster',
//    "dbpw" => '#UNImaster)^09',
//    "dbname" => 'OMG_GameWEB',
//);
//
//
//$db[4] = array(
//    "dbhost" => 'localhost',
//    "dbuser" => 'webmaster',
//    "dbpw" => '#UNImaster)^09',
//    "dbname" => 'PS_GameData',
//);
