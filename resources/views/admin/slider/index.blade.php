<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Sliders</h1>
        <div class="p-4">
            <Link href="{{ route('admin.slider.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Slider</Link>
        </div>
    </div>

    <x-splade-table :for="$sliders">
        <x-slot:empty-state>
            <p>Whoops! No Sliders Found</p>
        </x-slot:empty-state>

        @cell('image',$sliders)
        <div class="space-x-2 w-36 ">
            <img src="{{ asset('storage/'.$sliders->image) }}" class="w-full object-cover">
        </div>
        @endcell

        @cell('action', $sliders)
        <div class="space-x-2">
            <Link href="{{ route('admin.slider.edit', $sliders) }}"
                class="text-green-400 hover:text-green-700 font-semibold">
            Edit
            </Link>
            <Link href="{{ route('admin.slider.destroy', $sliders) }}" method="DELETE" confirm="Delete the Product"
                confirm-text="You want to delete?" confirm-button="Yes" cancel-button="No"
                class="text-red-400 hover:text-red-700 font-semibold ">
            Delete
            </Link>
        </div>
        @endcell
    </x-splade-table>

</x-admin-layout>