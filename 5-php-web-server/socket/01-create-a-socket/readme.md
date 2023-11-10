# Introduction to PHP Socket Programming

## Creating a socket

```php
Real time applications these days has become an important aspect of any web application
and most of us already has done a lot of things using tools like ajax to simulate real time data.
Although i use ajax too much but it has some limitations when it comes to critical operations that need speed and performance
for this Socket programming come into play.
In this tutorial i will show you how to use sockets in php with some examples

Requirements:

You must have knowledge with php language and how to run scripts from the command line.

This first thing to do is create a socket. The socket_create() function does this.
$sock = socket_create(AF_INET, SOCK_STREAM, 0);

The above code creates and returns a socket resource, 
also referred to as an endpoint of communication between two points (first one is the client and the second is the server).

Function socket_create() takes three parameters:

int $domain: specifies the protocol family to be used by the socket and can be 
(AF_INET for ipv4, AF_INET6 for ipv6, AF_UNIX for Local communication protocol family).
int $type: specifies the type of communication to be used by the socket. 
int $protocol: sets the specific protocol within the specified domain. Most common values ( SOL_TCP, and SOL_UDP).


Error handling

If any of the socket functions fail then the error information can be retrieved using the socket_last_error() and socket_strerror() functions.

if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created";

Now cd into the root of your project and run the above code in terminal as shown:
$ php index.php

If it displays “Socket created” now you have created a socket successfully. 
Let’s try to connect to some server using this socket. We can connect to www.google.com.
```



