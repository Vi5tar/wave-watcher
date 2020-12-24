<tr>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
        <div class="flex-shrink-0 w-10 my-auto">
          {{-- <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt=""> --}}
          {{$stock->symbol}}
        </div>
        <div class="ml-4">
          <div class="text-sm font-medium text-gray-900">
            {{$transaction->created_at->diffForHumans()}}
          </div>
          <div class="text-sm text-gray-500">
            @if ($transaction->type === 'sell')
                Sold {{(float)$transaction->qty}} shares
            @else
                Bought {{(float)$transaction->qty}} shares
            @endif
          </div>
        </div>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="text-sm text-gray-900">${{round($transaction->qty * $transaction->exchange_rate, 2)}}</div>
      <div class="text-sm text-gray-500">Exchange Rate: {{$transaction->exchange_rate}}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{$stock->exchange_rate}} <small>({{$stock->last_rate_update->diffForHumans()}})</small>
    </td>
    @if ($this->shouldTrack)
        <td class="px-6 py-4 whitespace-nowrap">
            <span wire:poll.10000ms="tick"
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($this->gain > 0) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                {{$this->gain}}
            </span>
        </td>    
    @else
        <td class="px-6 py-4 whitespace-nowrap">
            <span wire:poll.10000ms="tick"
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                -
            </span>
        </td>
    @endif
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
    </td>
  </tr>
