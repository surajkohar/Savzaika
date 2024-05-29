<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Orders</h1>
    </div>

    <x-splade-table :for="$orders">
        <x-slot:empty-state>
            <p>Whoops! No Orders Found</p>
        </x-slot:empty-state>
        <tr>
            @cell('first_name', $orders)
                <div>
                    {{ $orders->user->first_name }}
                </div>
            @endcell

            @cell('shipping_status', $orders)
                <div>
                    <p class="text-red-500 uppercase">{{ $orders->status }}</p>
                </div>
            @endcell

            @cell('total_price', $orders)
                @php
                    $totalPrice = 0;
                    foreach ($orders->Order_Item as $orderItem) {
                        $totalPrice += $orderItem->product->price * $orderItem->quantity;
                    }
                @endphp
                <div>
                    ₹ {{ $totalPrice }}
                </div>
            @endcell

            @cell('action', $orders)
                <div class="space-x-2">
                    <Link href="{{ route('admin.user.orderItem', $orders) }}"
                        class="text-green-400 hover:text-green-700 font-semibold">
                    View
                    </Link>
                    <Link href="{{ route('admin.orders.edit', $orders) }}"
                        class="text-green-400 hover:text-green-700 font-semibold">
                    Edit
                    </Link>
                </div>
            @endcell

            @cell('username', $orders)
                <div class="space-x-2">
                    {{ $orders->user->first_name }}
                </div>
            @endcell
        </tr>
    </x-splade-table>
</x-admin-layout>
