<div class="mt-5 md:mt-0 md:col-span-2">
    <form wire:submit.prevent="createTransaction">
        <input type="hidden" name="type" value=@if($buy) "buy" @else "sell" @endif />
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <livewire:search-stocks />
                    <div class="col-span-6 sm:col-span-3">
                        <label for="shares" class="block text-sm font-medium text-gray-700">Shares</label>
                        <input wire:model="shares" type="number" step=".00000001" name="shares" id="qty" min="0"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                        <label for="exchange_rate" class="block text-sm font-medium text-gray-700">Exchange Rate</label>
                        <input wire:model="exchangeRate" type="number" step=".01" name="exchange_rate" id="exchange_rate"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input wire:model="date" id="date" type="datetime-local"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 flex justify-between sm:px-6">
                <button wire:click="toggleRecord" type="button" aria-pressed="false"
                    class="flex-shrink-0 group relative rounded-full inline-flex items-center justify-center h-5 w-10 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 self-center">
                    <span class="sr-only">Use setting</span>
                    <!-- On: "bg-indigo-600", Off: "bg-gray-200" -->
                    <span aria-hidden="true"
                        class="@if($buy) bg-gray-200 @else bg-indigo-600 @endif absolute h-4 w-9 mx-auto rounded-full transition-colors ease-in-out duration-200"></span>
                    <!-- On: "translate-x-5", Off: "translate-x-0" -->
                    <span aria-hidden="true"
                        class="@if($buy) translate-x-0 @else translate-x-5 @endif absolute left-0 inline-block h-5 w-5 border border-gray-200 rounded-full bg-white shadow transform ring-0 transition-transform ease-in-out duration-200"></span>
                </button>  
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    @if ($buy)
                        Buy
                    @else
                        Sell                        
                    @endif
                </button>
            </div>
        </div>
    </form>
</div>
