# Connect to a Server

```php
We connect to a remote server on a certain port number. 
So we need 2 things , IP address and port number to connect to. 
So you need to know the IP address of the remote server you are connecting to. 
Here we used the ip address of google.com as a sample.

if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
if(!socket_connect($sock , '74.125.235.20' , 80))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not connect: [$errorcode] $errormsg \n");
}
 
echo "Connection established \n";

Function socket_connect() takes a socket resource, an ip address and port number now run the script into the terminal:

$ php index.php
Socket created
Connection established 

================================================================
It creates a socket and then connects.
OK, so we are now connected. Lets do the next thing , sending some data to the remote server.
```


