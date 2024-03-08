@seoTitle(__('Редактировать инфо'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Информация') }}
            </h2>
            <a href="{{ route('information.index') }}" class="bg-gray-300 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Обратно') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 bg-white max-w-xl mx-auto">
            <x-splade-form method="PUT" action="{{ route('information.update', $information->id) }}"  :default="$information">
                <x-splade-input class="mb-4" name="title" label="Заголовок"/>
                <x-splade-input class="mb-4" name="description" label="Описание"/>
                <x-splade-submit label="{{__('Сохранить')}}"/>
            </x-splade-form>
        </div>

</x-app-layout>
