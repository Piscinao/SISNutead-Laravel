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
            Usuário
        </th>

        <th>
            Instituição
        </th>



        <th class="text-right">
          Opções
        </th>
      </tr></thead>
      <tbody>
       @foreach ($course_list as $course)


               <tr>
              <td>
               {{ $course->id}}
              </td>
              <td>
              {{ $course->name}}
              </td>
              <td>
            {{ $course->userCourse->name}}
                  </td>

                  <td>
          {{ $course->instituition_id}}
                      </td>



            <td class="td-actions text-right">
                {!! Form::open(['route' => ['course.destroy', $course->id ], 'method' => 'DELETE']) !!}
                {{-- {!! Form::submit('Remover')!!} --}}
                @include('templates.formulario.submit', ['input' => 'Remover'])

                {!! Form::close() !!}

                <a href="{{ route('course.show', $course->id )}}">Detalhes</a>


             {{-- <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title=""> --}}

                {{-- <i class="material-icons">edit</i> --}}

         <div class="ripple-container"></div>
            </a>
             </td>
          </tr>
          @endforeach
      </tbody>
    </table>
