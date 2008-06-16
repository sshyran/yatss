<?php
require_once('set_env.php');
require_once('handleQuery.php');

if ($a->checkAuth() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ==1) {
//	$myarray=executeQuery('select username as "nickname", firstname as "first name", lastname as "last name", email from users');
}
//$t->assign('display_first_row',1);
//$t->assign('data',$myarray);


// Prepare data for pie chart (sold / unsold tickets)
$p_data = executeQuery("SELECT tickets.num_of_tickets as total, tickets.available_tickets as unsold, tickets.num_of_tickets-tickets.available_tickets as sold FROM tickets");

$totalUnsold = 0;
$totalSold = 0;
$totalTickets = 0;

for($k=0; $k<count($p_data); $k++)
{
	$totalUnsold += $p_data[$k]['unsold'];
	$totalSold += $p_data[$k]['sold'];
	$totalTickets += $p_data[$k]['total'];
}

$totalTickets = $totalUnsold + $totalSold;
$percentageSold = ($totalSold/$totalTickets)*100;
$percentageUnsold = 100 - $percentageSold;

$pieurl = "'http://chart.apis.google.com/chart?chs=400x180&cht=p3&chl=Sold(".$percentageSold."%)|Unsold(".$percentageUnsold."%)&chd=t:".$percentageSold.",".$percentageUnsold."&chtt=Total+Ticket+Distribution'";

//$t->assign('piesrc','http://chart.apis.google.com/chart?chs=400x180&cht=p3&chl=Sold(40%)|Unsold(60%)&chd=t:40.0,60.0&chtt=Total+Ticket+Distribution');
$t->assign('piesrc',$pieurl);

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
$barurl = 'http://chart.apis.google.com/chart?chs=520x250&cht=bvs&chd=t:'.$revenue_by_month[1].','.$revenue_by_month[2].','.$revenue_by_month[3].','.$revenue_by_month[4].','.$revenue_by_month[5].','.$revenue_by_month[6].','.$revenue_by_month[7].','.$revenue_by_month[8].','.$revenue_by_month[9].','.$revenue_by_month[10].','.$revenue_by_month[11].','.$revenue_by_month[12].'&chl=Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec&chtt=Total%20Revenue%20By%20Month&chco=999999&chxl=1:|0|USD&chxt=x,y&chds=0,600&chm=t$'.$revenue_by_month[1].',000000,0,0,10|t$'.$revenue_by_month[2].',000000,0,1,10|t$'.$revenue_by_month[3].',000000,0,2,10|t$'.$revenue_by_month[4].',000000,0,3,10|t$'.$revenue_by_month[5].',000000,0,4,10|t$'.$revenue_by_month[6].',000000,0,5,10|
t$'.$revenue_by_month[7].',000000,0,6,10|t$'.$revenue_by_month[8].',000000,0,7,10|t$'.$revenue_by_month[9].',000000,0,8,10|t$'.$revenue_by_month[10].',000000,0,9,10|t$'.$revenue_by_month[11].',000000,0,10,10|t$'.$revenue_by_month[12].',000000,0,11,10&chbh=30,10';


$t->assign('barsrc',$barurl);

/*$t->assign('barsrc','http://chart.apis.google.com/chart?chs=440x250&cht=bvs&chd=t:25.00,250.00,10.00,175.00,500.00,125.00,50.00,50.00,70.00,150.00,200.00,55.00&chl=Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec&chtt=Ticket%20Revenue%20By%20Month&chco=999999&chxl=1:|0|USD&chxt=x,y&chds=0,600&chm=t25.00,000000,0,0,10|t250.00,000000,0,1,10|t10.00,000000,0,2,10|t175.00,000000,0,3,10|t500.00,000000,0,4,10|t125.00,000000,0,5,10|
t50.00,000000,0,6,10|t50.00,000000,0,7,10|t70.00,000000,0,8,10|t150.00,000000,0,9,10|t200.00,000000,0,10,10|t55.00,000000,0,11,10');*/


$t->assign('total_tickets', $totalTickets);
$t->assign('tickets_sold',$totalSold);
$t->assign('tickets_unsold', $totalUnsold);
$t->assign('total_revenue', $total_revenue);
?>