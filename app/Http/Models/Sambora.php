<?php namespace App\Http\Models;

use DB;
class Sambora extends \Eloquent  {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'sambora';
	//protected $table = 'QDS$';

	public function getChrisData($from, $to)
	{
		$data = DB::connection('sambora')->select("SELECT [Date],[Charity],[Filename],[Cnt]
	      ,[Comments]
	      ,[Order Number] as [OrderNumber]
	      ,[BlameFile]
      	  ,[WP_Count] FROM QDS$ WHERE DATE BETWEEN '".$from."' AND '".$to."' ORDER BY DATE");
		return $data;
	}

}