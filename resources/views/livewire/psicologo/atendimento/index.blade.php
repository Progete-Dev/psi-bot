<div>
    @component('partials.card')
        @slot('class','bg-primary container py-2 py-4 mx-auto')
        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border rounded-md border-gray-300">
                    <div class="w-full">
                        {{$atendimentos->links('pagination')}}
                    </div>
                    <table  class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-secondary uppercase tracking-wider">
                                Data Agendada
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-secondary uppercase tracking-wider">
                                Cliente
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-secondary uppercase tracking-wider">
                                Horário
                            </th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($atendimentos as $atendimento)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-secondary">
                                    {{\Carbon\Carbon::createFromTimeString($atendimento->inicio)->format('d/m/Y')}} - {{\Carbon\Carbon::createFromTimeString($atendimento->final)->format('d/m/Y')}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-primary">
                                    {{$atendimento->cliente->nome}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-secondary">
                                    {{$atendimento->horario->hora_inicio}} - {{$atendimento->horario->hora_final}}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    <a href="{{route('psicologo.atendimento.view',['atendimento' =>$atendimento->id])}}" class="text-indigo-500 hover:text-indigo-900 p-2">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endcomponent
</div>
