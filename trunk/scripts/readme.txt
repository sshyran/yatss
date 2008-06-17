install PEAR::MDB2 and PEAR::MDB2_Driver_mysqli PEAR::Auth
pear -d preferred_state=beta install MDB2_Driver_mysqli
pear -d preferred_state=beta upgrade MDB2


create a cron job:
*/5 * * * * /path/to/yatssdbcleanup.sh 

edit yatssdbcleanup.sh and change the path to mysql and dbbatchfile