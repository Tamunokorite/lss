<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-5xl">Add building</h1>
        <form action="{{ route('buildings.store') }}" method="post" class="mt-5">
            @csrf
            <div>
                <x-input-label for="name" value="Name" />
                <x-text-input id="name" type="text" class="mt-1 block w-full" :value="old('name')" name="name" required />
            </div>
            <div>
            <x-input-label for="letter" value="Letter" />
                <x-text-input id="letter" type="text" class="mt-1 block w-full" :value="old('letter')" name="letter" required />
            </div>
            <div class="flex items-center gap-4 mt-5">
                <x-primary-button>{{ _('Save') }}</x-primary-button>
                <a href="{{ URL::previous() }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
