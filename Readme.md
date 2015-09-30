Blue Jeans Relay Mesh Example Server in PHP
===========================================

Mesh is an HTTP interface that allows [Blue Jeans Relay](http://bluejeans.com/features/relay) to integrate with otherwise unsupported Endpoints.

The Relay Listener Service can send commands like join and hangup to this custom Mesh server, which will use custom integration logic to cause the unsupported Endpoint to carry out the command.

See the [Relay API docs](https://relay.bluejeans.com/docs/mesh.html) for more details and API specifications.

## Requirements
- [Blue Jeans Relay account](http://bluejeans.com/features/relay#relay)
- [PHP](http://php.net/downloads.php)
- Web server with PHP support, like [Apache httpd](http://httpd.apache.org/download.cgi) or [Nginx](http://nginx.org/en/download.html)
- [Composer](https://getcomposer.org/download/)

## Installation
    cd /var/www # or wherever your server's web root is
    git clone https://github.com/Aldaviva/relay-mesh-example-php.git
    cd relay-mesh-example-php
    composer install

The HTTP interface will be served from <code>/relay-mesh-example-php</code>. If <code>mod_rewrite</code> and <code>AllowOverride</code> permit it, you can send a GET request to <code>http://127.0.0.1/relay-mesh-example-php/1.2.3.4/capabilities</code>, otherwise you must use <code>/relay-mesh-example-php/index.php/1.2.3.4/capabilities</code>.

Requests will be parsed and logged.

## Start coding

Check out the resource methods in `index.php`.

From here you can implement your own logic when different requests are handled.

