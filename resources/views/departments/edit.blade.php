<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-5xl">Edit Department</h1>
        <form action="{{ route('departments.update', $department) }}" method="post" class="mt-5">
            @csrf
            @method('patch')
            <div>
                <x-input-label for="name" value="Name" />
                <x-text-input id="name" type="text" class="mt-1 block w-full" :value="old('name', $department->name)" name="name" required />
            </div>
            <div>
            <x-input-label for="faculty" value="Faculty" />
                <x-text-input id="faculty" type="text" class="mt-1 block w-full" :value="old('faculty', $department->faculty)" name="faculty" required />
            </div>
            <div class="flex items-center gap-4 mt-5">
                <x-primary-button>{{ _('Save') }}</x-primary-button>
                <a href="{{ URL::previous() }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
