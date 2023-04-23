<x-app-layout>
    <div class="mb-5 flex items-center justify-between">
        <h1 class="text-5xl">{{ $building->name }}</h1>
        <a href="{{ route('rooms.create', ['building' => $building]) }}"><x-primary-button class="mt-4">{{ __('Add Room') }}</x-primary-button></a>
    </div>
    <h2 class="text-3xl mb-2">Rooms</h2>
    <x-nav-link :href="route('buildings.index')" class="mb-4">Go Back</x-nav-link>

    <table id="data-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead style="width:100%;">
            <tr style="width:100%;">
                <th data-priority="1">S/No.</th>
                <th data-priority="2">Number</th>
                <th data-priority="3">Actions</th>
            </tr>
        </thead>
        <tbody style="width:100%;">
            @php
                $i = 1;
            @endphp
            @foreach ($building->rooms as $room)
                <tr style="width:100%;">
                    <td class="td-first" style="width:15%;">{{ $i }}</td>
                    <td class="td-second" style="width: 70%;"><a href="{{route('rooms.edit', $room)}}">{{ $building->letter }}{{ $room->number }}</a></td>
                    <td class="actions" style="width:15%;">
                        <x-nav-link :href="route('rooms.edit', $room)">
                            {{ __('Edit') }}
                        </x-nav-link>
                        <form method="POST" action="{{ route('rooms.destroy', $room) }}">
                            @csrf
                            @method('delete')
                            <x-nav-link :href="route('rooms.destroy', $room)" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Delete') }}
                            </x-nav-link>
                        </form>

                    </td>
                </tr>

                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
</x-app-layout>
