@seoTitle(__('Новые клиенты'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Услуги') }}
            </h2>
            <a href="{{ route('clients.index') }}" class="bg-gray-300 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Обратно') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 bg-white max-w-xl mx-auto">
            <x-splade-form action="{{ route('clients.store') }}">
                <x-splade-input name="name" label="Название задания"/>
                <x-splade-submit lable="{{__('Сохранить')}}"/>
            </x-splade-form>
        </div>

</x-app-layout>
