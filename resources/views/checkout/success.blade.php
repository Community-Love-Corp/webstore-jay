<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Payment Successful</h1>

        <p>Your order has been paid successfully.</p>

        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Amount:</strong> ${{ $order->amount }} {{ $order->currency }}</p>
        <p><strong>Transaction ID:</strong> {{ $order->paypal_capture_id }}</p>

        <a href="/dashboard" class="text-blue-600 underline mt-4 inline-block">
            Back to Dashboard
        </a>
    </div>
</x-app-layout>
