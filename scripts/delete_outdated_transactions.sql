use yatss;

lock tables basket write;
delete from basket
	where start_of_transaction < date_sub(CURRENT_TIMESTAMP, interval 700 second);

unlock tables;
