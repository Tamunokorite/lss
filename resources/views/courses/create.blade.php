<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-5xl">Add Course</h1>
        <form action="{{ route('courses.store') }}" method="post" class="mt-5">
            @csrf
            <div>
                <x-input-label for="title" value="Title" />
                <x-text-input id="title" type="text" class="mt-1 block w-full" :value="old('title')" name="title" required />
            </div>
            <div>
                <x-input-label for="credits" value="Credits" />
                <input type="number" name="credits" id="credits" value="{{ old('credits') }}" class="mt-1 block w-full" required />
            </div>
            <div>
                <x-input-label for="level" value="Level" />
                <input type="number" name="level" id="level" value="{{ old('level') }}" class="mt-1 block w-full" required />
            </div>
            <div>
                <x-input-label for="hours" value="Hours" />
                <input type="number" name="hours" id="hours" value="{{ old('hours') }}" class="mt-1 block w-full" required />
            </div>
            <div>
                <x-input-label for="code" value="Code" />
                <x-text-input id="code" type="text" class="mt-1 block w-full" :value="old('code')" name="code" required />
            </div>
            <div>
                <x-input-label for="department" value="Department" />
                <select name="department" id="department" class="mt-1 block w-full">
                    @foreach ($departments as $department)
                        @if (\Request::get('department') !== null && $department->id == \Request::get('department'))
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
            <!-- <x-input-error :messages="var_dump($errors)" class="mt-2" /> -->
        </form>
    </div>
</x-app-layout>
