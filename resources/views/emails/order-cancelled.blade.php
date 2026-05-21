<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Your order was cancelled</h1>

        <p>No payment was taken.</p>
        
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Status:</strong> Cancelled</p>

        <a href="/dashboard" class="text-blue-600 underline mt-4 inline-block">
            Back to Dashboard
        </a>
    </div>
</x-app-layout>