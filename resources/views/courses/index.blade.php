<x-app-layout>
    <div class="mb-5 flex items-center justify-between">
        <h1 class="text-5xl">Courses</h1>
        <a href="{{ route('courses.create') }}"><x-primary-button class="mt-4">{{ __('Add Course') }}</x-primary-button></a>
    </div>

    <table id="data-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead style="width:100%;">
            <tr style="width:100%;">
                <th data-priority="1">S/No.</th>
                <th data-priority="2">Title</th>
                <th data-priority="3">Credits</th>
                <th data-priority="4">Actions</th>
            </tr>
        </thead>
        <tbody style="width:100%;">
            @php
                $i = 1;
            @endphp
            @foreach ($courses as $course)
                <tr style="width:100%;">
                    <td class="td-first">{{ $i }}</td>
                    <td class="td-second"><a href="{{ route('courses.show', $course) }}">{{ $course->title }} ({{ $course->code }}) </a></td>
                    <td class="td-third">{{ $course->credits }}</td>
                    <td class="actions">
                        <x-nav-link :href="route('courses.edit', $course)">
                            {{ __('Edit') }}
                        </x-nav-link>
                        <form method="POST" action="{{ route('courses.destroy', $course) }}">
                            @csrf
                            @method('delete')
                            <x-nav-link :href="route('courses.destroy', $course)" onclick="event.preventDefault(); this.closest('form').submit();">
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
