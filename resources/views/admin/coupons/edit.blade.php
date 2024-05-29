<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Edit Product</h1>
        <div class="p-4">
            <Link href="{{ route('admin.products.index') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Back</Link>
        </div>
    </div>
    <x-splade-form :for="$form" :default=$defaults />
</x-admin-layout>