<div class="col-span-12 sm:col-span-6">
    <div x-data="{
        isOpen:false,
        stocks:@entangle('stocks'),
      }">
        <label for="stock" class="sr-only">Location</label>
        <div class="relative rounded-md shadow-sm" @click.away="isOpen = false">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <input id="stock" type="text"
                class="block w-full pl-10 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Stock" wire:model="search" autocomplete="off" @focus="isOpen = true">
        </div>
        <!-- Select popover, show/hide based on select state. -->
        <div class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg" x-show.transition="isOpen && stocks.length"
            x-cloak>

            <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3"
                class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                <!--
                  Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.
                  Highlighted: "text-white bg-blue-600", Not Highlighted: "text-gray-900"
                -->
                @forelse($stocks as $stock)
                <li id="listbox-option-0" role="option"
                    class="relative py-2 pl-3 text-gray-900 transition duration-75 cursor-pointer select-none pr-9 hover:bg-blue-600 hover:text-white"
                    wire:click="setStock({{$stock->id}})" @click="isOpen = false" wire:key="{{ $loop->index }}">
                    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                    <span class="block font-normal truncate">
                        {{$stock->symbol}}: {{$stock->name}}
                    </span>
                </li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>
</div>