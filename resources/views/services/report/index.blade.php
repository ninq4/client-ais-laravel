@seoTitle(__('Обращения'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Заявки') }}
            </h2>
            <a href="{{ route('report.createClient') }}" class="bg-gray-300 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Новое обращение') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 bg-white max-w-4xl mx-auto rounded-md">
            <x-splade-table :for="$reports" >
                @cell('client_id', $reports)
                    <p>{{$reports->client->name}}</p>
                @endcell
                @cell('executer_id', $reports)
                <p>{{$reports->executer->name}}</p>
                @endcell
                @cell('status', $reports)

                <p>
                    @switch($reports->status)
                        @case(0)
                            Создан
                            @break
                        @case(1)
                            В обработке
                            @break
                        @case(2)
                            Завершен
                            @break
                        @case(3)
                            Отменен
                            @break

                    @endswitch
                </p>
                @endcell
                @cell('action', $reports)
                <div class="flex flex-col gap-5">
                    <Link href="{{ route('report.destroy', $reports->id) }}" class="" confirm="Внимание!" confirm-text="Вы действительно хотите удалить запись?" confirm-button="Да" cancel-button="Отмена" method="DELETE">{{ __('Удалить') }}</Link>

                    <Link href="{{route('client.edit', $reports -> client -> id)}}">Редактировать<br/>имя пользователя</Link>
                    <Link href="{{route('report.edit', $reports -> id)}}">Редактировать статус</Link>
                </div>
                @endcell
            </x-splade-table>
        </div>

</x-app-layout>
