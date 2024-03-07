@seoTitle(__('Исполнители'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Исполнители') }}
            </h2>
            <a href="{{ route('executer.create') }}" class="bg-gray-300 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Новый исполнитель') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 bg-white max-w-4xl mx-auto rounded-md">
            <x-splade-table :for="$executers" >
                @cell('action', $executers)
                <div class="flex flex-col gap-10">
                    <Link href="{{ route('executer.destroy', $executers->id) }}" class="" confirm="Внимание!" confirm-text="Вы действительно хотите удалить исполнителя?" confirm-button="Да" cancel-button="Отмена" method="DELETE">{{ __('Удалить') }}</Link>

                    <Link href="{{route('executer.edit', $executers-> id)}}">Редактировать</Link>
                </div>
                @endcell
            </x-splade-table>
        </div>

</x-app-layout>
