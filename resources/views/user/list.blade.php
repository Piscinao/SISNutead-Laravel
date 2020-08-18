<div class="table-responsive">
    <table class="table">
      <thead class=" text-primary">
        <tr>
        <th>
        #
        </th>
        <th>
        Nome
        </th>
        <th>
          Email
        </th>
        <th>
          CPF
        </th>
        <th>
          Telefone
        </th>

        <th class="text-right">
          Opções
        </th>
      </tr></thead>
      <tbody>
          @foreach ($user_list as $user)


             <tr>
            <td>
             {{ $user->id}}
            </td>
            <td>
            {{ $user->name}}
            </td>
            <td>
             {{ $user->email}}
            </td>
            <td>
                {{ $user->formatted_cpf}}
            </td>
            <td>
                {{ $user->formatted_phone}}
            </td>
            <td class="td-actions text-right">
                {!! Form::open(['route' => ['user.destroy', $user->id ], 'method' => 'DELETE']) !!}
                {{-- {!! Form::submit('Remover')!!} --}}
                @include('templates.formulario.submit', ['input' => 'Remover'])

                {!! Form::close() !!}
                <a href="{{ route('user.edit', $user->id) }}">Editar</a>
             {{-- <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title=""> --}}

                {{-- <i class="material-icons">edit</i> --}}

         <div class="ripple-container"></div>
            </a>
             </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
