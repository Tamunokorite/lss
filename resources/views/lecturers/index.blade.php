<x-app-layout>
    <div class="mb-5 flex items-center justify-between">
        <h1 class="text-5xl">Lecturers</h1>
        <a href="{{ route('lecturers.create') }}"><x-primary-button class="mt-4">{{ __('Add lecturer') }}</x-primary-button></a>
    </div>

    <table id="data-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead style="width:100%;">
            <tr style="width:100%;">
                <th data-priority="1">S/No.</th>
                <th data-priority="2">Name</th>
                <th data-priority="3">Department</th>
                <th data-priority="4">Actions</th>
            </tr>
        </thead>
        <tbody style="width:100%;">
            @php
                $i = 1;
            @endphp
            @foreach ($lecturers as $lecturer)
                <tr style="width:100%;">
                    <td class="td-first">{{ $i }}</td>
                    <td class="td-second">{{ $lecturer->name }}</td>
                    <td class="td-third">{{ $lecturer->department->name }}</td>
                    <td class="actions">
                        <!-- <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                            <x-dropdown-link :href="route('lecturers.edit', $lecturer)">
                                {{ __('Edit') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('lecturers.destroy', $lecturer) }}">
                                @csrf
                                @method('delete')
                                <x-dropdown-link :href="route('lecturers.destroy', $lecturer)" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Delete') }}
                                </x-dropdown-link>
                            </form>
                            </x-slot>
                        </x-dropdown> -->
                        <x-dropdown-link :href="route('lecturers.edit', $lecturer)">
                            {{ __('Edit') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('lecturers.destroy', $lecturer) }}">
                            @csrf
                            @method('delete')
                            <x-dropdown-link :href="route('lecturers.destroy', $lecturer)" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Delete') }}
                            </x-dropdown-link>
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
