<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use Srmklive\PayPal\Traits\IPNResponse As PayPalIPN;

class PaypalController extends Controller
{
    use PayPalIPN;

    public function ExpressCheckout(){
        $data = [];
        $data['items'] = [
            [
                'name' => 'Product 1',
                'price' => 0.99,
                'qty' => 1
            ],
            [
                'name' => 'Product 2',
                'price' => 1.99,
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #$data[invoice_id] Invoice";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/cart');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price'];
        }

        $data['total'] = $total;

        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data);



        // This will redirect user to PayPal
        return redirect($response['paypal_link']);
    }

    public function Success(){
        echo 'thankyou for purchasing this course';
    }

    public function Notify(Request $request)
    {
        $post = [];
        $request_params = $request->all();

        foreach ($request_params as $key=>$value)
            $post[$key] = $value;

        $post['cmd'] = '_notify-validate';

        $response = $this->verifyIPN($post);

        /*session([
            'ipn' => $response
        ]);*/

        Log::info('IPN RESPONSE:'.print_r($response , true));
    }

    public function showLog(){
        $content = file_get_contents ( storage_path('logs/laravel.log') );
        echo $content;
    }
}
