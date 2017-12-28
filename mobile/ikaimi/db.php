<?php

class mysqlquery
{
	public $dblink;
	public $sql;
	public $query;
	public $num;
	public $r;
	public $id;

	public function query($query)
	{
		global $ecms_config;
		$this->sql = mysql_query($query, return_dblink($query)) || exit($ecms_config["db"]["showerror"] == 1 ? mysql_error() . "<br>" . str_replace($GLOBALS["dbtbpre"], "***_", $query) : "DbError");
		return $this->sql;
	}

	public function query1($query)
	{
		$this->sql = mysql_query($query, return_dblink($query));
		return $this->sql;
	}

	public function usequery($query)
	{
		global $ecms_config;
		$this->sql = mysql_query($query, $GLOBALS["link"]) || exit($ecms_config["db"]["showerror"] == 1 ? mysql_error() . "<br>" . str_replace($GLOBALS["dbtbpre"], "***_", $query) : "DbError");

		if ($GLOBALS["linkrd"]) {
			mysql_query($query, $GLOBALS["linkrd"]);
		}

		return $this->sql;
	}

	public function updatesql($query)
	{
		global $ecms_config;
		$this->sql = mysql_query($query, return_dblink($query)) || exit($ecms_config["db"]["showerror"] == 1 ? mysql_error() . "<br>" . str_replace($GLOBALS["dbtbpre"], "***_", $query) : "DbError");
		return $this->sql;
	}

	public function fetch($sql)
	{
		$this->r = mysql_fetch_array($sql);
		return $this->r;
	}

	public function fetch1($query)
	{
		$this->sql = $this->query($query);
		$this->r = mysql_fetch_array($this->sql);
		return $this->r;
	}

	public function num($query)
	{
		$this->sql = $this->query($query);
		$this->num = mysql_num_rows($this->sql);
		return $this->num;
	}

	public function num1($sql)
	{
		$this->num = mysql_num_rows($sql);
		return $this->num;
	}

	public function gettotal($query)
	{
		$this->r = $this->fetch1($query);
		return $this->r["total"];
	}

	public function free($sql)
	{
		mysql_free_result($sql);
	}

	public function seek($sql, $pit)
	{
		mysql_data_seek($sql, $pit);
	}

	public function lastid()
	{
		$this->id = mysql_insert_id($GLOBALS["link"]);

		if ($this->id < 0) {
			$this->id = $this->gettotal("SELECT last_insert_id() as total");
		}

		return $this->id;
	}

	public function affectnum()
	{
		return mysql_affected_rows($GLOBALS["link"]);
	}
}

function db_connect()
{
	global $ecms_config;
	$dblink = do_dbconnect($ecms_config["db"]["dbserver"], $ecms_config["db"]["dbport"], $ecms_config["db"]["dbusername"], $ecms_config["db"]["dbpassword"], $ecms_config["db"]["dbname"]);
	return $dblink;
}

function do_dbconnect($dbhost, $dbport, $dbusername, $dbpassword, $dbname)
{
	global $ecms_config;
	$dblocalhost = $dbhost;

	if ($dbport) {
		$dblocalhost .= ":" . $dbport;
	}

	$dblink = @mysql_connect($dblocalhost, $dbusername, $dbpassword);

	if (!$dblink) {
		echo "Cann't connect to DB!";
		exit();
	}

	if ("4.1" <= $ecms_config["db"]["dbver"]) {
		$q = "";

		if ($ecms_config["db"]["setchar"]) {
			$q = "character_set_connection=" . $ecms_config["db"]["setchar"] . ",character_set_results=" . $ecms_config["db"]["setchar"] . ",character_set_client=binary";
		}

		if ("5.0" <= $ecms_config["db"]["dbver"]) {
			$q .= (empty($q) ? "" : ",") . "sql_mode=''";
		}

		if ($q) {
			@mysql_query("SET " . $q, $dblink);
		}
	}

	@mysql_select_db($dbname, $dblink);
	return $dblink;
}

function return_dblink($query)
{
	$dblink = $GLOBALS["link"];
	return $dblink;
}

error_reporting(32767 ^ 8);
define("InEmpireCMS", true);
define("ECMS_PATH", substr(dirname(__FILE__), 0, -7));
define("MAGIC_QUOTES_GPC", function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc());
define("STR_IREPLACE", function_exists("str_ireplace"));
require "config.php";

if (!defined("EmpireCMSConfig")) {
	exit();
}

if ($public_r["php_outtime"]) {
	@set_time_limit($public_r["php_outtime"]);
}

if ($ecms_config["sets"]["setpagechar"] == 1) {
	if (($ecms_config["sets"]["pagechar"] == "gb2312") || ($ecms_config["sets"]["pagechar"] == "big5") || ($ecms_config["sets"]["pagechar"] == "utf-8")) {
		@header("Content-Type: text/html; charset=" . $ecms_config["sets"]["pagechar"]);
	}
}

if (function_exists("date_default_timezone_set")) {
	@date_default_timezone_set("PRC");
}

define("InEmpireCMSDbSql", true);

?>
