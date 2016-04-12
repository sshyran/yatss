## Known Project Weaknesses ##

  * Internationalization is not supported - This project will support only the English language, and will not have native support for additional languages.

  * checkout\_confirmation.php allows redirection from other sites with url containing page=checkout (regexp check)

  * Checkout process allows user to leave checkout process with basket timer still being updated from the original ten minutes.  This would allow a user to keep entering / exiting checkout process so they may keep their tickets in the basket from expiring.