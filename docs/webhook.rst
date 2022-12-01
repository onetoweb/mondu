.. title:: Webhooks

`Back to index <index.rst>`_

========
Webhooks
========

.. contents::
    :local:


Get Webhook Key
```````````````

.. code-block:: php
    
    $result = $client->get('/webhooks/keys');


List Webhooks
`````````````

.. code-block:: php
    
    $result = $client->get('/webhooks', [
        'page' => 1,
        'per_page' => 20,
    ]);


Create Webhook
``````````````

.. code-block:: php
    
    $result = $client->post('/webhooks', [
        'topic' => 'order',
        'address' => 'https://example.com/webhook.php',
    ]);


Delete Webhook
``````````````

.. code-block:: php
    
    $webhookUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $client->delete("/webhooks/$webhookUuid");


Replay Webhook
``````````````

.. code-block:: php
    
    $resourceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->put("/webhooks/replay/$resourceUuid", [
        'topic' => 'order/pending'
    ]);
