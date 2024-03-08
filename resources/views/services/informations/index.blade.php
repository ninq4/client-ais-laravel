@seoTitle(__('Информация'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Информация') }}
            </h2>
            <a href="{{ route('information.create') }}" class="bg-gray-300 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Новая информация') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 bg-white max-w-4xl mx-auto rounded-md">
            <x-splade-table :for="$informations" >
                                @cell('action', $informations)
                                <div class="flex flex-col gap-10">
                                    <Link href="{{ route('information.destroy', $informations->id) }}" class="" confirm="Внимание!" confirm-text="Вы действительно хотите удалить запись?" confirm-button="Да" cancel-button="Отмена" method="DELETE">{{ __('Удалить') }}</Link>

                                    <Link href="{{route('information.edit', $informations-> id)}}">Редактировать</Link>
                                </div>
                                @endcell
            </x-splade-table>
        </div>

</x-app-layout>
