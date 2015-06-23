<?php namespace App\Http\Models;

use DB;
class Qds extends \Eloquent  {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'qds';


	public function getMISData($from, $to)
	{
		$data = DB::connection('qds')->select("SELECT * FROM Loading_Summary WHERE DATE BETWEEN '".$from."' AND '".$to."' ORDER BY DATE");
		return $data;
	}

}