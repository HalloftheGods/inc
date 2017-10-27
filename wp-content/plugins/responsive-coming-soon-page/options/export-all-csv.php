<?php/**
 * Export to CSV for subscriber list.
 **/
require_once '../../../../wp-load.php';
header('Content-Type: text/csv');
header('Content-Disposition: inline; filename="all-subscriber-list-'.date('YmdHis').'.csv"');
$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix . "rcsm_subscribers");
echo "Name, Email, Date, Subscription Status, Activate-code\r\n";   
if (count($results))  {
	foreach($results as $row) {
		if($row->flag == '1') {			 $flags='Subscribed';		} else {			$flags='Pending';		}
		echo $row->f_name ." ".$row->l_name .", ".$row->email .", ".$row->date .", ".$flags.",".$row->act_code ."\r\n";
	}
}