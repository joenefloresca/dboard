<?php namespace App\Http\Models;

use DB;
class Inhouse extends \Eloquent  {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'inhouse';


	public function getColumnHeader($from, $to, $campaign)
	{
		$data = DB::connection('inhouse')->select("SELECT DISTINCT(ColumnHeaderName) as ColumnHeaderName 
			FROM $campaign WHERE CalledDate BETWEEN '".$from."' AND '".$to."'");
		return $data;
	}

	public function queryProduced($from, $to, $header, $campaign)
	{
		$data = DB::connection('inhouse')->select("SELECT telephone,costprice FROM $campaign WHERE CalledDate BETWEEN '".$from."' AND '".$to."' AND ColumnHeaderName ='".$header."'");
		return $data;
	}


	public function queryDelivered($from, $to, $header, $campaign)
	{
		$data = DB::connection('inhouse')->select("SELECT telephone FROM $campaign WHERE CalledDate BETWEEN '".$from."' AND '".$to."' AND ColumnHeaderName ='".$header."' AND verified ='p' AND uin is not null AND (rejectreason is null AND clientreject is null)");
		return $data;
	}

	public function queryInhouseReject($from, $to, $header, $campaign)
	{
		$data = DB::connection('inhouse')->select("SELECT telephone FROM $campaign WHERE CalledDate BETWEEN '".$from."' AND '".$to."' AND ColumnHeaderName ='".$header."' AND rejectreason is not null");
		return $data;
	}

	public function queryQAReject($from, $to, $header, $campaign)
	{
		$data = DB::connection('inhouse')->select("SELECT telephone FROM $campaign WHERE CalledDate BETWEEN '".$from."' AND '".$to."' AND ColumnHeaderName ='".$header."' AND verified !='p' ");
		return $data;
	}

	public function queryClientReject($from, $to, $header, $campaign)
	{
		$data = DB::connection('inhouse')->select("SELECT telephone FROM $tabledb2 WHERE CalledDate BETWEEN '".$from."' AND '".$to."' AND ColumnHeaderName ='".$campaign."' AND clientreject is not null AND rejectreason is null");
		return $data;
	}

	public function queryUnused($from, $to, $header, $campaign)
	{
		$data = DB::connection('inhouse')->select("SELECT telephone FROM $campaign WHERE CalledDate BETWEEN '".$from."' AND '".$to."' AND ColumnHeaderName ='".$header."' AND rejectreason is null AND uin is null AND clientreject is null AND (answer1 not in ('4','Reject') AND answer2 not in ('4','Reject') AND answer3 not in ('4','Reject') AND answer4 not in ('4','Reject'))");
		return $data;
	}

}