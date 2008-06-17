<?php
require_once('set_env.php');
require_once('util.php');

if ($a->checkAuth() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ==1) {
//	$myarray=executeQuery('select username as "nickname", firstname as "first name", lastname as "last name", email from users');
}
//$t->assign('display_first_row',1);
//$t->assign('data',$myarray);


/*----------------------------------- CREATE PIE GRAPH FROM GOOGLE CHARTS (Ticket Distribution) ------------------------------ */
//$p_data = executeQuery("SELECT tickets.num_of_tickets as total, tickets.available_tickets as unsold, tickets.num_of_tickets-tickets.available_tickets as sold FROM tickets");

$p_data=executeQuery("select sum(tickets_sold) as total_tickets_sold, sum(tickets_unsold) as total_tickets_unsold, sum(revenue) as total_revenue from view_statistics");

/*$totalUnsold = 0;
$totalSold = 0;
$totalTickets = 0;

for($k=0; $k<count($p_data); $k++)
{
	$totalUnsold += $p_data[$k]['unsold'];
	$totalSold += $p_data[$k]['sold'];
	$totalTickets += $p_data[$k]['total']; 
} */

$totalTickets = $p_data[0]['total_tickets_sold'] + $p_data[0]['total_tickets_unsold'];
$percentageSold = (!$totalTickets)?0:($p_data[0]['total_tickets_sold']/$totalTickets)*100;
$percentageUnsold = 100 - $percentageSold;

$total_ticket_dist_url = "http://chart.apis.google.com/chart?chs=400x180&cht=p3&chl=Sold(".round($percentageSold)."%)|Unsold(".round($percentageUnsold)."%)&chd=t:".$percentageSold.",".$percentageUnsold."&chtt=Total+Ticket+Distribution&chco=607955";

//$t->assign('piesrc','http://chart.apis.google.com/chart?chs=400x180&cht=p3&chl=Sold(40%)|Unsold(60%)&chd=t:40.0,60.0&chtt=Total+Ticket+Distribution');
$t->assign('piesrc',$total_ticket_dist_url);


/*--------------------------------- CREATE BAR CHART FROM GOOGLE CHARTS (Total Revenue By Month) --------------------------------*/
$now = getDate();
$current_year = $now['year'];
$r_data = executeQuery("SELECT MONTH(orders.date_of_order) as month, transactions.transaction_total FROM orders, transactions WHERE orders.id = transactions.order_id AND YEAR(orders.date_of_order) = ?", array($current_year));

// Set up revenue by month array
$revenue_by_month = array();
$total_revenue = 0;
for($j=1; $j<=12; $j++)
{
	$revenue_by_month[$j] = 0;
}

// Fill revenue_by_month with revenue values from transactions table
for($i=0; $i<count($r_data); $i++)
{
	$revenue_by_month[$r_data[$i]['month']] += $r_data[$i]['transaction_total'];
	$total_revenue += $r_data[$i]['transaction_total'];
}

// Background Color : chf=bg,s,fafafa&
$revenue_by_month_url = 'http://chart.apis.google.com/chart?chs=445x250&cht=bvs&chd=t:'.$revenue_by_month[1].','.$revenue_by_month[2].','.$revenue_by_month[3].','.$revenue_by_month[4].','.$revenue_by_month[5].','.$revenue_by_month[6].','.$revenue_by_month[7].','.$revenue_by_month[8].','.$revenue_by_month[9].','.$revenue_by_month[10].','.$revenue_by_month[11].','.$revenue_by_month[12].'&chl=Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec&chtt=Total%20Revenue%20By%20Month&chco=999999&chxl=1:|0|USD&chxt=x,y&chds=0,600&chm=t$'.$revenue_by_month[1].',000000,0,0,10|t$'.$revenue_by_month[2].',000000,0,1,10|t$'.$revenue_by_month[3].',000000,0,2,10|t$'.$revenue_by_month[4].',000000,0,3,10|t$'.$revenue_by_month[5].',000000,0,4,10|t$'.$revenue_by_month[6].',000000,0,5,10|
t$'.$revenue_by_month[7].',000000,0,6,10|t$'.$revenue_by_month[8].',000000,0,7,10|t$'.$revenue_by_month[9].',000000,0,8,10|t$'.$revenue_by_month[10].',000000,0,9,10|t$'.$revenue_by_month[11].',000000,0,10,10|t$'.$revenue_by_month[12].',000000,0,11,10&chbh=30,5';


$t->assign('barsrc',$revenue_by_month_url);

/*$t->assign('barsrc','http://chart.apis.google.com/chart?chs=440x250&cht=bvs&chd=t:25.00,250.00,10.00,175.00,500.00,125.00,50.00,50.00,70.00,150.00,200.00,55.00&chl=Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec&chtt=Ticket%20Revenue%20By%20Month&chco=999999&chxl=1:|0|USD&chxt=x,y&chds=0,600&chm=t25.00,000000,0,0,10|t250.00,000000,0,1,10|t10.00,000000,0,2,10|t175.00,000000,0,3,10|t500.00,000000,0,4,10|t125.00,000000,0,5,10|
t50.00,000000,0,6,10|t50.00,000000,0,7,10|t70.00,000000,0,8,10|t150.00,000000,0,9,10|t200.00,000000,0,10,10|t55.00,000000,0,11,10');*/


/*-------------------------------- CREATE BAR CHART FROM GOOGLE CHARTS (Total Revenue By State) ---------------------------------------*/

$rbs_data = executeQuery("SELECT address.state_id, sum(transactions.transaction_total) as transaction_total FROM transactions, orders, users, address WHERE transactions.order_id = orders.id AND orders.user_id = users.id AND users.address_id = address.id GROUP BY address.state_id");
//print_r($rbs_data);

/*$us_states = executeQuery("SELECT us_states.id FROM us_states ORDER BY us_states.id ASC");
echo("# of states = ". count($us_states) . "<br>");*/
//print_r($us_states);

$valueString = "";
$labelString = "";
$barLabelString = "";
$counter = 0;

for($i=0; $i<count($rbs_data); $i++)
{
	if($i == count($rbs_data)-1)
	{
		$valueString .= ($rbs_data[$i]['transaction_total']);
		$labelString .= ($rbs_data[$i]['state_id']);
		$barLabelString .= ("t$" . $rbs_data[$i]['transaction_total'] . ",000000,0," . $counter . ",10");
		$counter++;
	}
	else
	{
		$valueString .= ($rbs_data[$i]['transaction_total'] . ",");
		$labelString .= ($rbs_data[$i]['state_id'] . "|");
		$barLabelString .= ("t$" . $rbs_data[$i]['transaction_total'] . ",000000,0," . $counter . ",10|");
		$counter++;
	}
}

$num_of_states = count($rbs_data);
$barWidth = 1744.7 * pow($num_of_states,-1.7273) - 50;
$barWidth=($barWidth > 520)?520:$barWidth/2;
//echo("<br>Bar Width = ". $barWidth . "<br>") ; 
$barSpacing =10;

$revenue_by_state_url = "http://chart.apis.google.com/chart?chs=520x250&cht=bvs&chd=t:".$valueString."&chl=".$labelString."&chtt=Total%20Revenue%20By%20State&chco=999999&chxl=1:|0|USD&chxt=x,y&chds=0,600&chm=".$barLabelString."&chbh=".round($barWidth).",".$barSpacing."";

//echo($revenue_by_state_url);

$t->assign('rev_by_state', $revenue_by_state_url);

//print_r($rbs_data);

/*--------------------- Google - o - meter test ------------------*/

$gom_url = "http://chart.apis.google.com/chart?chs=150x100&cht=gom&chd=t:50&chl=Tickets%20Available&chco=eeeeee,607955";
$t->assign('gom_url',$gom_url);



$t->assign('total_tickets', $totalTickets);
$t->assign('tickets_sold',$p_data[0]['total_tickets_sold']);
$t->assign('tickets_unsold', $p_data[0]['total_tickets_unsold']);
$t->assign('total_revenue', $total_revenue);
?>