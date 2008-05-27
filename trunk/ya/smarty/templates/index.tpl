{include file="header.tpl" title="User Info"}



<p>Hello, {$name|capitalize}!</p>
<p>{$xxx}
Date: {$smarty.now|date_format:"%Y-%m-%d"}<br />
</p>


{include file="footer.tpl"}