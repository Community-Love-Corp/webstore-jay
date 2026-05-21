<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Thank you for your purchase!</h1>

        <p>Your payment was successful.</p>
        
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Amount:</strong> ${{ $order->amount }} {{ $order->currency }}</p>
        <p><strong>Transaction:</strong> {{ $order->paypal_capture_id }}</p>
        
        <p>We appreciate your business.</p>


        <a href="/dashboard" class="text-blue-600 underline mt-4 inline-block">
            Back to Dashboard
        </a>
    </div>
</x-app-layout>
