<?php

/*

* ==============================================================================================================
*
*
* The minimum requirements to get phpList working are in this file.
* If you are interested in tweaking more options, check out the config_extended.php file
* or visit http://resources.phplist.com/system/config
*
* ** NOTE: To use options from config_extended.php, you need to copy them to this file **
*
==============================================================================================================

*/

# what is your Mysql database server hostname
$database_host = "localhost";

# what is the name of the database we are using
$database_name = "phplistdb";

# what user has access to this database
$database_user = "phplistadmin";

# and what is the password to login to control the database
$database_password = 'bPwUj43FuSDn5SsP';


#===============================================
#   SMTP Settings


# if you have an SMTP server, set it here. Otherwise it will use the normal php mail() function
## if your SMTP server is called "smtp.mydomain.com" you enter this below like this:
##
##     define("PHPMAILERHOST",'smtp.mydomain.com');
define("PHPMAILERHOST",'192.168.30.12');

## required for Offie 365 smtp
# if you want to use smtp authentication when sending the email uncomment the following
# two lines and set the username and password to be the correct ones
#define("PHPMAILERHOST",'smtp.office365.com');
#$phpmailer_smtpuser = 'phplist@2civility.org';
#$phpmailer_smtppassword = 'C1p4m$$Q';
#$phpmailer_smtpsecure = ‘tls’;
#$phpmailer_smtpport = 587;


# if test is true (not 0) it will not actually send ANY messages, but display what it would have sent
# this is here, to make sure you edited the config file and mails are not sent "accidentally"
# on unmanaged systems

define ("TEST",0);



/*

==============================================================================================================
*
* Settings for handling bounces
*
* This section is OPTIONAL, and not necessary to send out mailings, but it is highly recommended to correctly
* set up bounce processing. Without processing of bounces your system will end up sending large amounts of
* unnecessary messages, which overloads your own server, the receiving servers and internet traffic as a whole
*
==============================================================================================================

*/

# Message envelope.
#
# This is the address that most bounces will be delivered to
# Your should make this an address that no PERSON reads
# but a mailbox that phpList can empty every so often, to process the bounces

$message_envelope = 'phplist@2civility.org';

# Handling bounces. Check README.bounces for more info
# This can be 'pop' or 'mbox'
$bounce_protocol = 'pop';

# set this to 0, if you set up a cron to download bounces regularly by using the
# commandline option. If this is 0, users cannot run the page from the web
# frontend. Read README.commandline to find out how to set it up on the
# commandline
define ("MANUALLY_PROCESS_BOUNCES",1);

# when the protocol is pop, specify these three
$bounce_mailbox_host = 'outlook.office365.com';
$bounce_mailbox_user = 'phplist@2civility.org';
$bounce_mailbox_password = 'C1p4m$$Q';

# the "port" is the remote port of the connection to retrieve the emails
# the default should be fine but if it doesn't work, you can try the second
# one. To do that, add a # before the first line and take off the one before the
# second line
#$bounce_mailbox_port = "110/pop3/notls";
#$bounce_mailbox_port = "110/pop3";

# it's getting more common to have secure connections, in which case you probably want to use
$bounce_mailbox_port = "995/pop3/ssl/novalidate-cert";

# when the protocol is mbox specify this one
# it needs to be a local file in mbox format, accessible to your webserver user
$bounce_mailbox = '/var/mail/listbounces';

# set this to 0 if you want to keep your messages in the mailbox. this is potentially
# a problem, because bounces will be counted multiple times, so only do this if you are
# testing things.
$bounce_mailbox_purge = 1;

# set this to 0 if you want to keep unprocessed messages in the mailbox. Unprocessed
# messages are messages that could not be matched with a user in the system
# messages are still downloaded into phpList, so it is safe to delete them from
# the mailbox and view them in phpList
$bounce_mailbox_purge_unprocessed = 1;

# how many bounces in a row need to have occurred for a user to be marked unconfirmed
$bounce_unsubscribe_threshold = 1;



# If you want to remove the image from the HTML emails, set this constant
# to be 1, the HTML emails will then only add a line of text as signature
define("EMAILTEXTCREDITS",1);

#=========================================================================
# Bandwidth / e-mail send management

# to avoid overloading the server that sends your email, you can add a little delay
# between messages that will spread the load of sending
# you will need to find a good value for your own server
# value is in seconds, and you can use fractions, eg "0.5" is half a second
# (or you can play with the autothrottle below)
define('MAILQUEUE_THROTTLE',0.25);

# define the amount of emails you want to send per period. If 0, batch processing
# is disabled and messages are sent out as fast as possible
define("MAILQUEUE_BATCH_SIZE",0);

# define the length of one batch processing period, in seconds (3600 is an hour)
define("MAILQUEUE_BATCH_PERIOD",3600);

# Domain Throttling
# You can activate domain throttling, by setting USE_DOMAIN_THROTTLE to 1
# define the maximum amount of emails you want to allow sending to any domain and the number
# of seconds for that amount. This will make sure you do not send too many emails to one domain
# which may cause blacklisting. Particularly the big ones are tricky about this.
# it may cause a dramatic increase in the amount of time to send a message, depending on how
# many users you have that have the same domain (eg hotmail.com)
# if too many failures for throttling occur, the send process will automatically add an extra
# delay to try to improve that. The example sends 1 message every 2 minutes.

# define('USE_DOMAIN_THROTTLE',0);
# define('DOMAIN_BATCH_SIZE',2);
# define('DOMAIN_BATCH_PERIOD',3600);

