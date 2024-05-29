<x-admin-layout>
    <x-splade-modal>
        <div class="flex justify-between">
            {{-- <h1 class="text-2xl font-semibold p-4">Edit Product</h1> --}}
            <span></span>
            <div class="p-4">
                <Link href="{{ route('admin.coupons.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Back</Link>
            </div>
        </div>
        <x-splade-form :method="$details['method']" :action="$details['url']" class="space-y-4"
            :default="$defaults ?? []">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                {{ $details['title'] }}
            </h3>
            <div class="grid grid-cols-2 gap-6">


                <x-splade-input name="coupon_name" label="Coupon Name" placeholder="Coupon Name" required />

                <x-splade-input name="coupon_code" label="Coupon code" placeholder="Coupon code" required />


                <x-splade-select name="coupon_type" label="Coupon Type"
                    :options="['percentage' => 'Percentage', 'fixed' => 'Fixed']" placeholder="Status" required />
                <x-splade-input name="discount_value" label="Discount Value" placeholder="Discount Value" required />
                <x-splade-input name="minimum_amount " label="Minumum Amount" placeholder="Minumum Amount" />
                <x-splade-input type='date' name="start_date " label="Start Date " placeholder="Start Date" required />
                <x-splade-input type='date' name="expiration_date " label="Expiration Date "
                    placeholder="Expiration Date" required />

                <x-splade-select name="is_active" label="Status" :options="[1 => 'Active', 0 => 'Inactive']"
                    placeholder="Status" required />
                <x-splade-input name="usage_limit " label="Usage Limit" placeholder="Usage Limit" required />
            </div>
            <div class="flex justify-left">
                <x-splade-submit class="w-full " name="submit" :label="$details['title']" />
            </div>
        </x-splade-form>

    </x-splade-modal>
</x-admin-layout>