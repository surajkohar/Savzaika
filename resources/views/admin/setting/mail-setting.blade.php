<x-admin-layout>
    <x-splade-modal>
        <div class="flex justify-between">
            <span></span>
            <div class="p-4">
                <Link href="{{ route('admin.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Back</Link>
            </div>
        </div>
        <x-splade-form method="post" action="{{route('admin.configureSMTP')}}" class="space-y-4"
            :default="$mailSettings ?? []">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                Configure SMTP
            </h3>
            {{-- @if($errors->has())
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
            @endif --}}
            <x-splade-input name="MAIL_HOST" label="Mail Host " placeholder="Mail Host" required />

            <x-splade-input name="MAIL_PORT" label="Mail Port" placeholder="Mail Port" required />
            <x-splade-input name="MAIL_USERNAME" label="Mail Username" placeholder="Mail Username" required />
            <x-splade-input name="MAIL_PASSWORD" type="password" label="Mail Password" placeholder="Mail Password"
                required />
            <x-splade-input name="MAIL_ENCRYPTION" label="Mail Encryption" placeholder="Mail Encryption  " required />
            <x-splade-input name="MAIL_FROM_ADDRESS" label="Mail From Address" placeholder="Mail From Address"
                required />
            <div class="flex justify-center">
                <x-splade-submit class="w-full" name="submit" label="Submit" />
            </div>
        </x-splade-form>

    </x-splade-modal>
</x-admin-layout>