<?php namespace App\Http\Models;

use DB;
class DeliveryTracking extends \Eloquent  {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'qds106';


	public function getDeliveries($date_from = null, $date_to = null)
	{
		$query = "Select order_confirmation.oc_number as oc,
		order_confirmation.count as cnt,
		order_confirmation.status as stat,
		order_confirmation.po_number as pon,
		order_summary.date_delivered as dd,
		order_summary.delivery_quantity as dq,
		order_summary.is_invoiced as iin,
		order_summary.filename as fn,
		order_summary.invoice_number as inum,
		order_summary.oc_idfk as ocidfk,
		order_summary.date_invoiced as di
		FROM
		order_confirmation,order_summary
		where order_confirmation.id = order_summary.oc_idfk";

		if (isset($date_from)) {
			if (!empty($date_from))
			{
				$query .= " and right(REPLACE(order_summary.date_delivered, '-', ''),4)+'-'+
right(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4),
len(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4))
-2)+'-'+left(REPLACE(order_summary.date_delivered, '-', ''),2) >= '".$date_from."'";
			}
		}
	
		if (isset($date_to)) {
			if (!empty($date_to)) 
			{
				$query .= " and right(REPLACE(order_summary.date_delivered, '-', ''),4)+'-'+
right(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4),
len(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4))
-2)+'-'+left(REPLACE(order_summary.date_delivered, '-', ''),2) <= '".$date_to."'";
			}
		}
		
		$query.=" order by order_confirmation.id DESC";


		$data = DB::connection('qds106')->select($query);
		          
		return $data;
	}

	public function getAllDeliveriesCompleted()
	{
		$query = "Select order_confirmation.oc_number as oc,
		order_confirmation.count as cnt,
		order_confirmation.status as stat,
		order_confirmation.po_number as pon,
		right(REPLACE(order_summary.date_delivered, '-', ''),4)+'-'+
right(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4),
len(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4))
-2)+'-'+left(REPLACE(order_summary.date_delivered, '-', ''),2) as dd,
		order_summary.delivery_quantity as dq,
		order_summary.is_invoiced as iin,
		order_summary.filename as fn,
		order_summary.invoice_number as inum,
		order_summary.oc_idfk as ocidfk,
		order_summary.date_invoiced as di
		FROM
		order_confirmation,order_summary
		where order_confirmation.id = order_summary.oc_idfk AND order_confirmation.status = 'Completed' AND right(REPLACE(order_summary.date_delivered, '-', ''),4)+'-'+
right(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4),
len(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4))
-2)+'-'+left(REPLACE(order_summary.date_delivered, '-', ''),2) = SUBSTRING(CONVERT(VARCHAR,GETDATE(),120),1,10) order by order_confirmation.id DESC";

		$data = DB::connection('qds106')->select($query);
		          
		return $data;
	}

	public function getAllDeliveriesPending()
	{
		$query = "Select TOP 300 order_confirmation.oc_number as oc,
		order_confirmation.count as cnt,
		order_confirmation.status as stat,
		order_confirmation.po_number as pon,
		right(REPLACE(order_summary.date_delivered, '-', ''),4)+'-'+
right(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4),
len(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4))
-2)+'-'+left(REPLACE(order_summary.date_delivered, '-', ''),2) as dd,
		order_summary.delivery_quantity as dq,
		order_summary.is_invoiced as iin,
		order_summary.filename as fn,
		order_summary.invoice_number as inum,
		order_summary.oc_idfk as ocidfk,
		order_summary.date_invoiced as di
		FROM
		order_confirmation,order_summary
		where order_confirmation.id = order_summary.oc_idfk AND order_confirmation.status = 'Pending' AND right(REPLACE(order_summary.date_delivered, '-', ''),4)+'-'+
right(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4),
len(left(REPLACE(order_summary.date_delivered, '-', ''),len(REPLACE(order_summary.date_delivered, '-', ''))-4))
-2)+'-'+left(REPLACE(order_summary.date_delivered, '-', ''),2) = SUBSTRING(CONVERT(VARCHAR,GETDATE(),120),1,10) order by order_confirmation.id DESC";

		$data = DB::connection('qds106')->select($query);
		          
		return $data;
	}

}