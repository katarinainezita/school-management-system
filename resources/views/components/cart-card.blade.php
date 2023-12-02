<div class="flex gap-4 items-center justify-between bg-white p-4 rounded-lg border-2">
    <div class="flex flex-col gap-2">
        <p class="font-semibold">{{ $item['title'] }}</p>

        <div class="flex gap-2 items-center">
            <x-badge bgColor="bg-blue-100" textColor="text-blue-500" fontWeight="bold">{{ $item['category'] }}</x-badge>
            <x-badge bgColor="bg-pink-100" textColor="text-pink-500" fontWeight="bold">{{ $item['level'] }}</x-badge>
        </div>
    </div>


    <x-form-button :action="route('cart.checkout', ['course' => $item['id']])" method="PATCH" class="px-2 py-1 rounded-lg bg-blue-500 text-white">
        Buy
    </x-form-button>

</div>
