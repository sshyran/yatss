{include file="header.tpl" title="yatss main page"}
{include file="loginoutbox.tpl"}
<p></p>


 <p>Hello, {$smarty.session.user}!</p>
<!--<p>
Date: {$smarty.now|date_format:"%Y-%m-%d"}<br />

{$smarty.session.i} 

</p>


{html_checkboxes name='id' values=$cust_ids output=$cust_names
   selected=$customer_id  separator='<br />'} -->



{include file="footer.tpl"}