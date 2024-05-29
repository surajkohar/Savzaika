<x-admin-layout>
    <x-splade-modal>
        <div class="flex justify-between">
            {{-- <h1 class="text-2xl font-semibold p-4">Edit Product</h1> --}}
            <span></span>
            <div class="p-4">
                <Link href="{{ route('admin.slider.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Back</Link>
            </div>
        </div>
        <x-splade-form :method="$details['method']" :action="$details['url']" class="space-y-4"
            :default="$defaults ?? []">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                {{ $details['title'] }}
            </h3>
            <x-splade-input name="name" label="Slider Name" placeholder="Slider Name" required />


            <x-splade-file name="image" label="Image" :show-filename="true" filepond preview />

            <div class="flex justify-center">
                <x-splade-submit class="w-full" name="submit" :label="$details['title']" />
            </div>
        </x-splade-form>

    </x-splade-modal>
</x-admin-layout>