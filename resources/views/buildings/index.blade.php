<x-app-layout>
    <div class="mb-5 flex items-center justify-between">
        <h1 class="text-5xl">Buildings</h1>
        <a href="{{ route('buildings.create') }}"><x-primary-button class="mt-4">{{ __('Add building') }}</x-primary-button></a>
    </div>

    <table id="data-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead style="width:100%;">
            <tr style="width:100%;">
                <th data-priority="1">S/No.</th>
                <th data-priority="2">Name</th>
                <th data-priority="3">Letter</th>
                <th data-priority="4">Actions</th>
            </tr>
        </thead>
        <tbody style="width:100%;">
            @php
                $i = 1;
            @endphp
            @foreach ($buildings as $building)
                <tr style="width:100%;">
                    <td class="td-first">{{ $i }}</td>
                    <td class="td-second"><a href="{{ route('buildings.show', $building) }}">{{ $building->name }}</a></td>
                    <td class="td-third">{{ $building->letter }}</td>
                    <td class="actions">

                        <x-nav-link :href="route('buildings.edit', $building)">
                            {{ __('Edit') }}
                        </x-nav-link>
                        <form method="POST" action="{{ route('buildings.destroy', $building) }}">
                            @csrf
                            @method('delete')
                            <x-nav-link :href="route('buildings.destroy', $building)" onclick="event.preventDefault(); this.closest('form').submit();">
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
