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
    
    $result = $client->get('/orders', [
        'page' => 1,
        'per_page' => 20
    ]);


Get Orders
``````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->get("/orders/$orderUuid");


Create a Order
``````````````

.. code-block:: php
    
    $result = $client->post('/orders', [
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
    $result = $client->post("/orders/$orderUuid/adjust", [
        'state' => 'confirmed',
    ]);


Cancel a Order
``````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->post("/orders/$orderUuid/cancel", [
        'cancelation_reason' => 'cancelation'
    ]);


Update Order External Info
``````````````````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->post("/orders/$orderUuid/update_external_info", [
        'external_reference_id' => 'my order 2',
    ]);
