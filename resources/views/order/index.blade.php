<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Orders</h1>
    </div>
    <x-splade-table :for="$orders">
        <x-slot:empty-state>
            <p>Whoops! No Orders Found</p>
        </x-slot:empty-state>
        @cell('first_name ', $orders)
            <p>{{ $orders->User->first_name }}</p>
        @endcell
    </x-splade-table>

</x-admin-layout>
