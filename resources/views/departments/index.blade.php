<x-app-layout>
    <div class="mb-5 flex items-center justify-between">
        <h1 class="text-5xl">Departments</h1>
        <a href="{{ route('departments.create') }}"><x-primary-button class="mt-4">{{ __('Add Department') }}</x-primary-button></a>
    </div>

    <table id="data-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead style="width:100%;">
            <tr style="width:100%;">
                <th data-priority="1">S/No.</th>
                <th data-priority="2">Name</th>
                <th data-priority="3">Faculty</th>
                <th data-priority="4">Actions</th>
            </tr>
        </thead>
        <tbody style="width:100%;">
            @php
                $i = 1;
            @endphp
            @foreach ($departments as $department)
                <tr style="width:100%;">
                    <td class="td-first">{{ $i }}</td>
                    <td class="td-second"><a href="{{ route('departments.show', $department) }}">{{ $department->name }}</a></td>
                    <td class="td-third">{{ $department->faculty }}</td>
                    <td class="actions">
                        <x-nav-link :href="route('departments.edit', $department)">
                            {{ __('Edit') }}
                        </x-nav-link>
                        <form method="POST" action="{{ route('departments.destroy', $department) }}">
                            @csrf
                            @method('delete')
                            <x-nav-link :href="route('departments.destroy', $department)" onclick="event.preventDefault(); this.closest('form').submit();">
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
