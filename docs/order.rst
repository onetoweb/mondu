.. _top:
.. title:: Orders

`Back to index <index.rst>`_

======
Orders
======

.. contents::
    :local:


List Orders
```````````

.. code-block:: php
    
    $result = $client->order->list([
        'page' => 1,
        'per_page' => 20
    ]);


Get Order
`````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->order->get($orderUuid);


Create a Order
``````````````

.. code-block:: php
    
    $result = $client->order->create([
        'currency' => 'EUR',
        'external_reference_id' => 'my-order-1',
        'billing_address' => [
            'country_code' => 'NL',
            'city' => 'city',
            'zip_code' => '1111AA',
            'address_line1' => 'street number',
        ],
        'shipping_address' => [
            'country_code' => 'NL',
            'city' => 'city',
            'zip_code' => '1111AA',
            'address_line1' => 'street number',
        ],
        'source' => 'import',
        'buyer' => [
            'is_registered' => false,
            'email' => 'info@example.com',
            'first_name' => 'first name',
            'last_name' => 'last name',
        ],
        'lines' => [[
            'line_items' => [[
                'external_reference_id' => 'product-1',
                'title' => 'product 1',
                'net_price_per_item_cents' => 1000,
                'tax_cents' => 190,
                'quantity' => 1,
            ]]
        ]],
        'payment_method' => 'invoice',
        'language' => 'en'
    ]);


Adjust a Order
``````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->order->adjust($orderUuid, [
        'state' => 'confirmed',
    ]);


Cancel a Order
``````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->order->cancel($orderUuid, [
        'cancelation_reason' => 'cancelation'
    ]);


Update Order External Info
``````````````````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->order->updateExternal($orderUuid, [
        'external_reference_id' => 'my order 2',
    ]);


`Back to top <#top>`_