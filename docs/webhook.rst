.. _top:
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
    
    $result = $client->webhook->key();


List Webhooks
`````````````

.. code-block:: php
    
    $result = $client->webhook->list([
        'page' => 1,
        'per_page' => 20,
    ]);


Create Webhook
``````````````

.. code-block:: php
    
    $result = $client->webhook->create([
        'topic' => 'order',
        'address' => 'https://example.com/webhook.php',
    ]);


Delete Webhook
``````````````

.. code-block:: php
    
    $webhookUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $client->webhook->delete($webhookUuid);


Replay Webhook
``````````````

.. code-block:: php
    
    $resourceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->webhook->replay($resourceUuid, [
        'topic' => 'order/pending'
    ]);


`Back to top <#top>`_