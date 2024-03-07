@seoTitle(__('Редактировать клиента'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Услуги') }}
            </h2>
            <a href="{{ route('client.index') }}" class="bg-gray-300 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Обратно') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 bg-white max-w-xl mx-auto">
            <x-splade-form method="PUT" action="{{route('request.updateStatus', $id -> id)}}" :default="$id">
                <x-splade-select name="status" id="">
                    <option value="0">Создан</option>
                    <option value="1">В обработке</option>
                    <option value="2">Завершен</option>
                    <option value="3">Отменен</option>
                </x-splade-select>
                <x-splade-submit label="{{__('Сохранить')}}"/>
            </x-splade-form>
        </div>

</x-app-layout>
