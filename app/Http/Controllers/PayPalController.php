<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Mail\OrderCancelledMail;
use App\Mail\OrderPaidMail;

class PayPalController extends Controller
{
    private function auth()
    {
            if(config('paypal.mode')=='live') {
                return Http::withBasicAuth(
                    config('paypal.client_id'),
                    config('paypal.secret')
                 );
            }else{
                return Http::withBasicAuth(
                    config('paypal.client_id_sandbox'),
                    config('paypal.secret_sandbox')
                    );
            }
        
    }

    public function create(Product $product)
    {
        $user = auth()->user(); //ensure a user is authenticated
        
        $order = Order::create([
            'product_id' => $product->id,
            'amount'     => $product->price,
            'currency'   => 'NZD',
            'status'     => 'pending',
            'user_id'    => $user->id,
        ]);
       if(config('paypal.mode')=='live') {
           $endpoint = config('paypal.endpoint');
        }else{
            $endpoint =config('paypal.endpoint_sandbox');;
        }
        
        $response = $this->auth()->post($endpoint, [
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => 'NZD',
                    'value' => $order->amount
                ]
            ]],
            'application_context' => [
                'return_url' => url('/checkout/paypal/return?order_id='.$order->id),
                'cancel_url' => url('/checkout/paypal/cancel?order_id='.$order->id)
            ]
        ]);
        
        $paypal = $response->json();
        //dd($response->json());
        
        if (!isset($paypal['id'])) {
            Log::error('PayPal Live Error', $paypal);
            throw new \Exception('PayPal did not return an order ID');
        }
        $order->paypal_order_id = $paypal['id'];
        $order->save();
        
        $approve = collect($paypal['links'])->firstWhere('rel', 'approve')['href'];
        
        return redirect($approve);
    }
    
/*    
    public function create()
    {
        $user = auth()->user(); //get logged-in user
        
        $order = Order::create([
            'amount' => 49.99,
            'currency' => 'NZD',
            'status' => 'pending',
            'user_id' => $user->id
        ]);

        $response = $this->auth()->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => 'NZD',
                    'value' => $order->amount
                ]
            ]],
            'application_context' => [
                'return_url' => url('/checkout/paypal/return?order_id='.$order->id),
                'cancel_url' => url('/checkout/paypal/cancel?order_id='.$order->id)
            ]
        ]);

        $paypal = $response->json();
        $order->paypal_order_id = $paypal['id'];
        $order->save();

        $approve = collect($paypal['links'])->firstWhere('rel', 'approve')['href'];

        return redirect($approve);
    }
*/
    public function return(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

/*      Following Code had to be replaced as it sends a json body in the request and paypal does not accept body. 
 *      Further, new version of code also includes error handling to catch such errors.
 *       $response = $this->auth()->post(
            "https://api-m.sandbox.paypal.com/v2/checkout/orders/{$order->paypal_order_id}/capture"
        );

        $capture = $response->json();
        dd($capture);
        $order->status = 'paid';
        $order->paypal_capture_id = $capture['purchase_units'][0]['payments']['captures'][0]['id'];
        $order->save();*/
        if(config('paypal.mode')=='live') {
            $endpoint = config('paypal.endpoint');
        }else{
            $endpoint =config('paypal.endpoint_sandbox');;
        }
        
        
        $response = $this->auth()
        ->withBody('', 'application/json')
        ->post("{$endpoint}/{$order->paypal_order_id}/capture");
        
        $capture = $response->json();
        
        // Debug if capture failed
        if (!isset($capture['status']) || $capture['status'] !== 'COMPLETED') {
            dd('PayPal capture failed:', $capture);
        }
        
        // Extract capture ID safely
        $purchaseUnits = $capture['purchase_units'][0] ?? null;
        
        if ($purchaseUnits && isset($purchaseUnits['payments']['captures'][0]['id'])) {
            $order->paypal_capture_id = $purchaseUnits['payments']['captures'][0]['id'];
        } else {
            $order->paypal_capture_id = $capture['id'] ?? null;
        }
        
        $order->status = 'paid';
        $order->save();
        
        
        Mail::to($order->user->email)->send(new OrderPaidMail($order));
        //Mail::to('customer@example.com')->send(new OrderPaidMail($order));
        
        return view('checkout.success', compact('order'));
    }

    public function cancel(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->status = 'cancelled';
        $order->save();
        
        Mail::to($order->user->email)->send(new OrderCancelledMail($order));

        return view('checkout.cancelled', compact('order'));
    }
}
