### Server Programming

```php 
     

Share

Real time applications these days has become an important aspect of any web application 
and most of us already has done a lot of things using tools like ajax to simulate real time data. 
Although i use ajax too much but it has some limitations when it comes to critical operations that need speed 
and performance for this Socket programming come into play.


### Creating a socket

This first thing to do is create a socket. The socket_create() function does this.
$sock = socket_create(AF_INET, SOCK_STREAM, 0);

The above code creates and returns a socket resource, also referred to as an endpoint of communication between two points (first one is the client and the second is the server).

 

Function socket_create() takes three parameters:

    int $domain: specifies the protocol family to be used by the socket and can be (AF_INET for ipv4, AF_INET6 for ipv6, AF_UNIX for Local communication protocol family).
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

If it displays “Socket created” now you have created a socket successfully. Let’s try to connect to some server using this socket. We can connect to www.google.com.

 
### Connect to a Server

We connect to a remote server on a certain port number. So we need 2 things , IP address and port number to connect to. So you need to know the IP address of the remote server you are connecting to. Here we used the ip address of google.com as a sample.
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

It creates a socket and then connects.

OK, so we are now connected. Lets do the next thing , sending some data to the remote server.
 
### Sending Data

Function socket_send() will simply send data. It needs the socket resource , the data to send and its size.

Let’s look at this example:
if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
//Connect socket to remote server
if(!socket_connect($sock , '74.125.235.20' , 80))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not connect: [$errorcode] $errormsg \n");
}
 
echo "Connection established \n";
 
$message = "GET / HTTP/1.1\r\n\r\n";
 
//Send the message to the server
if( ! socket_send ( $sock , $message , strlen($message) , 0))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not send data: [$errorcode] $errormsg \n");
}
 
echo "Message send successfully \n";

In the above example , we first connect to an ip address and then send the string message “GET / HTTP/1.1\r\n\r\n” to it.
The message is actually a http command to fetch the mainpage of a website.

There is also another function socket_sendto() which sends a message to a socket, whether it is connected or not

Now that we have send some data , its time to receive a reply from the server. So lets do it.

 
### Receiving Data

socket_recv() — Receives data from a connected socket
<?php
 
if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
//Connect socket to remote server
if(!socket_connect($sock , '74.125.235.20' , 80))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not connect: [$errorcode] $errormsg \n");
}
 
echo "Connection established \n";
 
$message = "GET / HTTP/1.1\r\n\r\n";
 
//Send the message to the server
if( ! socket_send ( $sock , $message , strlen($message) , 0))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not send data: [$errorcode] $errormsg \n");
}
 
echo "Message send successfully \n";
 
//Now receive reply from server
if(socket_recv ( $sock , $buf , 2045 , MSG_WAITALL ) === FALSE)
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not receive data: [$errorcode] $errormsg \n");
}
 
//print the received message
echo $buf;

Function socket_recv() takes a socket resource created with socket_create() and len bytes of data in buf from socket as shown above

Here is the output of the above code:
$ php index.php 
Socket created 
Connection established 
Message send successfully 
HTTP/1.1 302 Found
Location: http://www.google.co.in/
Cache-Control: private
Content-Type: text/html; charset=UTF-8
Set-Cookie: expires=; expires=Mon, 01-Jan-1990 00:00:00 GMT; path=/; domain=www.google.com
Set-Cookie: path=; expires=Mon, 01-Jan-1990 00:00:00 GMT; path=/; domain=www.google.com
Set-Cookie: domain=; expires=Mon, 01-Jan-1990 00:00:00 GMT; path=/; domain=www.google.com
Set-Cookie: expires=; expires=Mon, 01-Jan-1990 00:00:00 GMT; path=/; domain=.www.google.com
Set-Cookie: path=; expires=Mon, 01-Jan-1990 00:00:00 GMT; path=/; domain=.www.google.com
Set-Cookie: domain=; expires=Mon, 01-Jan-1990 00:00:00 GMT; path=/; domain=.www.google.com
Set-Cookie: expires=; expires=Mon, 01-Jan-1990 00:00:00 GMT; path=/; domain=google.com

We can see what reply was send by the server. It looks something like Html, well IT IS html. Google.com replied with the content of the page we requested. Quite simple!

 

Now that we have received our reply, its time to close the socket to release resources.
 
Close socket
socket_close($sock);

As shown above function socket_close() takes a socket resource to close it.

 
So we learned how to:

1. Create a socket
2. Connect to remote server
3. Send some data
4. Receive a reply

Its useful to know that your web browser also does the same thing when you open www.google.com
This kind of socket activity represents a CLIENT. A client is a system that connects to a remote system to fetch data.

The other kind of socket activity is called a SERVER. A server is a system that uses sockets to receive incoming connections and provide them with data. It is just the opposite of Client. So www.google.com is a server and your web browser is a client. Or more technically www.google.com is a HTTP Server and your web browser is an HTTP client.

 

Let’s now do some server tasks with sockets

 
### Server Programming

OK now onto server things. Servers basically do the following :

1. Open a socket
2. Bind to a address(and port).
3. Listen for incoming connections.
4. Accept connections
5. Read/Send
Bind a socket

socket_bind can be used to bind a socket to a particular address and port. It needs a sockaddr_in structure similar to connect function.
if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
// Bind the source address
if( !socket_bind($sock, "127.0.0.1" , 5000) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not bind socket : [$errorcode] $errormsg \n");
}
 
echo "Socket bind OK \n";

The above code will bind ip “127.0.0.1” to the specified $sock. The key point here about bind we bind a socket to a particular IP address and a certain port number. By doing this we ensure that all incoming data which is directed towards this port number is received by this application. 

This makes it obvious that you cannot have 2 sockets bound to the same port

Note that socket_bind() must be called before socket_connect() or socket_listen().
 
Listen for connections

After binding a socket to a port the next thing we need to do is listen for connections. For this we need to put the socket in listening mode. Function socket_listen() is used to put the socket in listening mode. Just add the following line after bind.
socket_listen ($sock , 10);

Again socket_listen() takes the socket_resource and a maximum number of backlog incoming connections that are kept “waiting” if the program is already busy. So by specifying 10, it means that if 10 connections are already waiting to be processed, then the 11th connection request shall be rejected.

 

Now comes the main part of accepting new connections.

 
### Accept connection

Function socket_accept() is used for this.
if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
// Bind the source address
if( !socket_bind($sock, "127.0.0.1" , 5000) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not bind socket : [$errorcode] $errormsg \n");
}
 
echo "Socket bind OK \n";
 
if(!socket_listen ($sock , 10))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not listen on socket : [$errorcode] $errormsg \n");
}
 
echo "Socket listen OK \n";
 
echo "Waiting for incoming connections... \n";
 
//Accept incoming connection - This is a blocking call
$client = socket_accept($sock);
     
//display information about the client who is connected
if(socket_getpeername($client , $address , $port))
{
    echo "Client $address : $port is now connected to us.";
}
 
socket_close($client);
socket_close($sock);

Run the the script. It should show
$ php server.php
Socket created
Socket bind OK
Socket listen OK
Waiting for incoming connections... 

So now this program is waiting for incoming connections on port 5000. Dont close this program , keep it running.
Now a client can connect to it on this port. We shall use the telnet client for testing this. Open a terminal and type
$ telnet localhost 5000
Trying 127.0.0.1...
Connected to localhost.
Escape character is '^]'.
Connection closed by foreign host. 

And the server output will show
 Client 127.0.0.1 : 36689 is now connected to us. 

So we can see that the client connected to the server.

The socket_getpeername() function is used to get info about the client which is connected to the server via a particular socket.

We accepted an incoming connection but closed it immediately. This was not very productive. There are lots of things that can be done after an incoming connection is established. Afterall the connection was established for the purpose of communication. So lets reply to the client.

 

Function socket_write() can be used to write something to the socket of the incoming connection and the client should see it. Here is an example :
if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
// Bind the source address
if( !socket_bind($sock, "127.0.0.1" , 5000) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not bind socket : [$errorcode] $errormsg \n");
}
 
echo "Socket bind OK \n";
 
if(!socket_listen ($sock , 10))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not listen on socket : [$errorcode] $errormsg \n");
}
 
echo "Socket listen OK \n";
 
echo "Waiting for incoming connections... \n";
 
//Accept incoming connection - This is a blocking call
$client =  socket_accept($sock);
 
//display information about the client who is connected
if(socket_getpeername($client , $address , $port))
{
    echo "Client $address : $port is now connected to us. \n";
}
 
//read data from the incoming socket
$input = socket_read($client, 1024000);
 
$response = "OK .. $input";
 
// Display output  back to client
socket_write($client, $response);
socket_close($client);

The function socket_read() reads from the socket resource $client and takes the maximum number of bytes read.

Run the above code in 1 terminal. And connect to this server using telnet from another terminal and you should see this :
$ telnet localhost 5000
Trying 127.0.0.1...
Connected to localhost.
Escape character is '^]'.
happy
OK .. happy
Connection closed by foreign host.

So the client(telnet) received a reply from server.

 

We can see that the connection is closed immediately after that simply because the server program ends after accepting and sending reply. So how to manage this to be a live server running and listening for all incoming connections.

### Live Server

To be able to make our server still running one of the common methods is to use infinite while loop and listen for connections as shown below:
if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
// Bind the source address
if( !socket_bind($sock, "127.0.0.1" , 5000) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not bind socket : [$errorcode] $errormsg \n");
}
 
echo "Socket bind OK \n";
 
if(!socket_listen ($sock , 10))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not listen on socket : [$errorcode] $errormsg \n");
}
 
echo "Socket listen OK \n";
 
echo "Waiting for incoming connections... \n";
 
//start loop to listen for incoming connections
while (true) 
{
    //Accept incoming connection - This is a blocking call
    $client =  socket_accept($sock);
     
    //display information about the client who is connected
    if(socket_getpeername($client , $address , $port))
    {
        echo "Client $address : $port is now connected to us. \n";
    }
     
    //read data from the incoming socket
    $input = socket_read($client, 1024000);
     
    $response = "OK .. $input";
     
    // Display output  back to client
    socket_write($client, $response);
}

Now run the server program in 1 terminal , and open 3 other terminals.
From each of the 3 terminal do a telnet to the server port.

Each of the telnet terminal would show :
$ telnet localhost 5000
Trying 127.0.0.1...
Connected to localhost.
Escape character is '^]'.
happy
OK .. happy
Connection closed by foreign host. 

And the server terminal would show
$ php server.php
Socket created
Socket bind OK
Socket listen OK
Waiting for incoming connections...
Client 127.0.0.1 : 37119 is now connected to us.
Client 127.0.0.1 : 37122 is now connected to us.
Client 127.0.0.1 : 37123 is now connected to us. 

So now the server is running nonstop and the telnet terminals are also connected nonstop. Now close the server program. All telnet terminals would show “Connection closed by foreign host.”
 

Now it’s time to handle many connections so we need a capability that allow us run each connection as a separate thread. The main server program accepts a connection and creates a new thread to handle communication for the connection, and then the server goes back to accept more connections. However php does not yet support threading directly.

One solution to this is to use socket’s select() function . The select function basically ‘polls’ or observers a set of sockets for certain events like if its readable, or writable or had a problem or not etc.
<?php
error_reporting(~E_NOTICE);
set_time_limit (0);
$address = "0.0.0.0";
$port = 5003;
$max_clients = 10;
if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
echo "Socket created \n";
// Bind the source address
if( !socket_bind($sock, $address , 5007) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    die("Could not bind socket : [$errorcode] $errormsg \n");
}
echo "Socket bind OK \n";
if(!socket_listen ($sock , 10))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    die("Could not listen on socket : [$errorcode] $errormsg \n");
}
echo "Socket listen OK \n";
echo "Waiting for incoming connections... \n";
//array of client sockets
$client_socks = array();
//array of sockets to read
$read = array();
//start loop to listen for incoming connections and process existing connections
while (true)
{
    //prepare array of readable client sockets
    $read = array();
    //first socket is the master socket
    $read[0] = $sock;
    //now add the existing client sockets
    for ($i = 0; $i < $max_clients; $i++)
    {
        if($client_socks[$i] != null)
        {
            $read[$i+1] = $client_socks[$i];
        }
    }
    //now call select - blocking call
    if(socket_select($read , $write , $except , null) === false)
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);
        die("Could not listen on socket : [$errorcode] $errormsg \n");
    }
    //if ready contains the master socket, then a new connection has come in
    if (in_array($sock, $read))
    {
        for ($i = 0; $i < $max_clients; $i++)
        {
            if ($client_socks[$i] == null)
            {
                $client_socks[$i] = socket_accept($sock);
                //display information about the client who is connected
                if(socket_getpeername($client_socks[$i], $address, $port))
                {
                    echo "Client $address : $port is now connected to us. \n";
                }
                //Send Welcome message to client
                $message = "Welcome to php socket server version 1.0 \n";
                $message .= "Enter a message and press enter, and i shall reply back \n";
                socket_write($client_socks[$i] , $message);
                break;
            }
        }
    }
    //check each client if they send any data
    for ($i = 0; $i < $max_clients; $i++)
    {
        if (in_array($client_socks[$i] , $read))
        {
            $input = socket_read($client_socks[$i] , 1024);
            if ($input == null)
            {
                //zero length string meaning disconnected, remove and close the socket
                unset($client_socks[$i]);
                socket_close($client_socks[$i]);
            }
            $n = trim($input);
            $output = $client_socks[$i]." Said: ... $input";
            echo "Sending output to client \n";
            //send response to client
            //socket_write($client_socks[$i] , $output);
            // send response to other client
            foreach (array_diff_key($client_socks, array($i => 0)) as $client_sock) {
                socket_write($client_sock , $output);
            }
        }
    }
}

As shown above the first steps that we discussed previously then i added the loop. Here inside the loop i check every time to see if there is a new client connecting then i added socket_write() to send response to all clients except the one that is sending. Note that to get the full picture try to the debug the code especially the while loop.

 

Run the above server and open 3 terminals like before. Now the server will create a thread for each client connecting to it.

The telnet terminals would show :
$ telnet localhost 5000
Trying 127.0.0.1...
Connected to 127.0.0.1.
Escape character is '^]'.
Welcome to php socket server version 1.0 
Enter a message and press enter, and i shall reply back 
hello
OK ... hello
how are you
OK ... how are you

The server terminal might look like this
$ php server.php 
Socket created 
Socket bind OK 
Socket listen OK 
Waiting for incoming connections... 
Client 127.0.0.1 : 36259 is now connected to us. 
Sending output to client 
Sending output to client 
Client 127.0.0.1 : 36274 is now connected to us. 
Sending output to client 
Sending output to client 
Client 127.0.0.1 : 36276 is now connected to us. 
Sending output to client 
Sending output to client

The above connection handler takes some input from the client and replies back to the other clients.

 
Conclusion

In this tutorial you learned the basics of sockets using php note that there is more you can do in this topic. With web sockets you can build real time applications like Chat and messaging applications.
```