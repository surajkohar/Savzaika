<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Products</h1>
        <div class="p-4">
            <Link href="{{ route('admin.products.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Product</Link>
        </div>
    </div>
    <x-splade-table :for="$products">
        <x-slot:empty-state>
            <p>Whoops! No Product Found</p>
        </x-slot:empty-state>
        @cell('image',$products)
        <div class="space-x-2 border-2 w-36 ">
            <img src="{{ asset('storage/'.$products->media->file_path) }}" class="w-full object-cover">
        </div>
        @endcell
        @cell('action', $products)
        <div class="space-x-2">
            <Link href="{{ route('admin.products.edit', $products) }}"
                class="text-green-400 hover:text-green-700 font-semibold">
            Edit
            </Link>
            <Link href="{{ route('admin.products.destroy', $products) }}" method="DELETE" confirm="Delete the Product"
                confirm-text="You want to delete?" confirm-button="Yes" cancel-button="No"
                class="text-red-400 hover:text-red-700 font-semibold ">
            Delete
            </Link>
        </div>
        @endcell
    </x-splade-table>

</x-admin-layout>