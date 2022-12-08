.. _top:
.. title:: Invoices

`Back to index <index.rst>`_

========
Invoices
========

.. contents::
    :local:


List Invoices
`````````````

.. code-block:: php
    
    $result = $client->invoice->list([
        'page' => 1,
        'per_page' => 20
    ]);


List Order Invoices
```````````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->listByOrder($orderUuid, [
        'page' => 1,
        'per_page' => 20
    ]);


Get Order Invoice
`````````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $invoiceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->get($orderUuid, $invoiceUuid);


Create Invoice
``````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->create($orderUuid, [
        'external_reference_id' => 'invoice 1',
        'invoice_url' => 'https://example.com/Invoice1.pdf',
        'gross_amount_cents' => 1000,
        'tax_cents' => 190,
        'discount_cents' => 0,
        'shipping_price_cents' => 0,
        'line_items' => [[
            'external_reference_id' => 'product-1',
            'quantity' => 1,
        ]],
    ]);


Cancel Invoice
``````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $invoiceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->cancel($orderUuid, $invoiceUuid);


Confirm Payment
```````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $invoiceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->confirm($orderUuid, $invoiceUuid);


Update Invoice External Info
````````````````````````````

.. code-block:: php
    
    $orderUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $invoiceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->updateExternal($orderUuid, $invoiceUuid, [
        'external_reference_id' => 'invoice 1',
        'invoice_url' => 'https://example.com/Invoice1.pdf',
    ]);


List Credit Notes
`````````````````

.. code-block:: php
    
    $invoiceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->listCreditNotes($invoiceUuid, [
        'page' => 1,
        'per_page' => 20
    ]);


Show Credit Note
````````````````

.. code-block:: php
    
    $invoiceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $creditNotesUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->getCreditNote($invoiceUuid, $creditNotesUuid);


Create Credit Note
``````````````````

.. code-block:: php
    
    $invoiceUuid = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->invoice->createCreditNote($invoiceUuid, [
        'external_reference_id' => 'credit note 1',
        'gross_amount_cents' => 1000,
        'tax_cents' => 190,
        'notes' => 'notes',
        'line_items' => [[
            'quantity' => 1,
            'external_reference_id' => 'external reference id'
        ]]
    ]);

`Back to top <#top>`_