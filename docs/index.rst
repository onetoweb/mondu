.. title:: Index

===========
Basic Usage
===========

Setup client

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\Mondu\Client;
    
    // params
    $apiKey = 'api_key';
    $sandbox = true;
    $version = 1;
    
    // init client
    $client = new Client($apiKey, $sandbox, $version);


Webhook Authentication

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Symfony\Component\HttpFoundation\Request;
    use Onetoweb\Mondu\WebhookAuthenticater;
    
    /**
     * Use the client to get your webhook secret
     * @see https://github.com/onetoweb/mondu/blob/master/docs/webhook.rst#get-webhook-Key
     */
    $webhookSecret = 'webhook_secret';
    $sandbox = true;
    
    // init webhook authenticater
    $webhookAuthenticater = new WebhookAuthenticater($webhookSecret, $sandbox);
    
    // get request object
    $request = Request::createFromGlobals();
    
    /**
     * Example webhook authentication with symfony HttpFoundation Request object
     */
    $valid = $webhookAuthenticater->authenticate(
        $request->getContent(),
        $request->headers->get('x-mondu-signature'),
        $request->getClientIp()
    );
    
    if ($valid) {
        
        // webhook stuff
    }


========
Examples
========

* `Orders <order.rst>`_
* `Invoices <invoice.rst>`_
* `Webhooks <webhook.rst>`_
