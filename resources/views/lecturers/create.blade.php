<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-5xl">Add Lecturer</h1>
        <form action="{{ route('lecturers.store') }}" method="post" class="mt-5">
            @csrf
            <div>
                <x-input-label for="name" value="Name" />
                <x-text-input id="name" type="text" class="mt-1 block w-full" :value="old('name')" name="name" required />
            </div>
            <div>
                <x-input-label for="department" value="Department" />
                <select name="department" id="department" class="form-control">
                    @foreach ($departments as $department)
                        @if ($department->id == \Request::get('department'))
                        <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                        @else
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-4 mt-5">
                <x-primary-button>{{ _('Save') }}</x-primary-button>
                <a href="{{ URL::previous() }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
