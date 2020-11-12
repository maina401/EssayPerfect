<?php

namespace Sample\AuthorizeIntentExamples;
require __DIR__ . '/vendor/autoload.php';
include 'vendor/autoload.php';
//1. Import the PayPal SDK client that was created in `Set up Server-Side SDK`.
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class CreateOrder
{

    // 2. Set up your server to receive a call from the client
    /**
     *This is the sample function to create an order. It uses the
     *JSON body returned by buildRequestBody() to create an new order.
     */
    public static function createOrder($debug=false)
    {

        // 3. Call PayPal to set up an authorization transaction
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = self::buildRequestBody();

        $client = PayPalClient::client();
        $response = $client->execute($request);
        if ($debug)
        {
            print "Status Code: {$response->statusCode}\n";
            print "Status: {$response->result->status}\n";
            print "Order ID: {$response->result->id}\n";
            print "Intent: {$response->result->intent}\n";
            print "Links:\n";
            foreach($response->result->links as $link)
            {
                print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
            }

            // To print the whole response body, uncomment the following line
            // echo json_encode($response->result, JSON_PRETTY_PRINT);
        }


        return $response;
    }

    /**
     *Setting up the JSON request body for creating the order. Set the intent in
     *the request body to "AUTHORIZE" for authorize intent flow.
     */
    private static function buildRequestBody()
    {
        return array(
            'intent' => 'AUTHORIZE',
            'application_context' =>
                array(
                    'return_url' => 'https://example.com/return',
                    'cancel_url' => 'https://example.com/cancel'
                ),
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => '220.00'
                                )
                        )
                )
        );
    }
}


/**
 *This is the driver function that invokes the createOrder function to create
 *a sample order.
 */
if (!count(debug_backtrace()))
{
    CreateOrder::createOrder(true);
}
