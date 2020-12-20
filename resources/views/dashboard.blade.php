<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                <div class="border-t border-gray-200"></div>
                </div>
            </div>
            
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Record Transaction</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Information around a purchase/sale of a stock or coin.
                        </p>
                        </div>
                    </div>
                    <livewire:record-transaction-form />
                </div>
            </div>
            
            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                <div class="border-t border-gray-200"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
