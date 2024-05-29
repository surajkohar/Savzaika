<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Coupons</h1>
        <div class="p-4">
            <Link href="{{ route('admin.coupons.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Coupons</Link>
        </div>
    </div>
    <x-splade-table :for="$coupons">
        <x-slot:empty-state>
            <p>Whoops! No Coupons Found</p>
        </x-slot:empty-state>
        @cell('is_active', $coupons)
        @if ($coupons->is_active == 1)
        <span>True</span>
        @else
        <span>False</span>
        @endif
        @endcell
        @cell('action', $coupons)
        <div class="space-x-2">
            <Link href="{{ route('admin.coupons.edit', $coupons) }}"
                class="text-green-400 hover:text-green-700 font-semibold">
            Edit
            </Link>
            <Link href="{{ route('admin.coupons.destroy', $coupons) }}" method="DELETE" confirm="Delete the Product"
                confirm-text="You want to delete?" confirm-button="Yes" cancel-button="No"
                class="text-red-400 hover:text-red-700 font-semibold ">
            Delete
            </Link>
        </div>
        @endcell
    </x-splade-table>

</x-admin-layout>