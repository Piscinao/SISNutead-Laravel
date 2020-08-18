@extends('layouts.app', ['activePage' => 'courses', 'titlePage' => __('Cursos')])

@section('content')
    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Cursos</h4>
              <p class="card-category"> Lista de cursos</p>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="#" class="btn btn-sm btn-primary">Adicionar Curso</a>
                </div>
              </div>
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
                        Instituição
                    </th>

                    <th>
                        Usuário
                    </th>



                    <th class="text-right">
                      Opções
                    </th>
                  </tr></thead>
                  <tbody>

                           <tr>
                          <td>
                           {{ $course->id}}
                          </td>
                          <td>
                            {{ $course->name}}
                           </td>
                          <td>
                          {{ $course->instituitionCourse->name}}
                          </td>
                          <td>
                        {{ $course->userCourse->name}}
                              </td>


                              {!! Form::open(['route' => ['course.user.store', $course->id], 'method' => 'post', 'class' => 'form-control']) !!}
                              @include('templates.formulario.select', ['label' => "Usuário",
                              'select' => 'user_id',
                              'data' => $user_list,
                              'attributes' => ['placeholder' => "Usuário"]
                              ])
                              @include('templates.formulario.submit', ['input' => 'Relacionar ao grupo:' . $course->name])

                              {!! Form::close() !!}


                              @include('user.list', ['user_list' => $course->users])

                              <a href="{{ route('course.show', $course->id) }}">Detalhes</a>




                         {{-- <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title=""> --}}

                            {{-- <i class="material-icons">edit</i> --}}

                     <div class="ripple-container"></div>
                        </a>
                         </td>
                      </tr>

                  </tbody>
                </table>

            </div>
          </div>








                        @include('templates.formulario.submit', ['input' => 'Cadastrar'])

                        {!! Form::close() !!}

                      {{-- <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div> --}}
                    </div>
                  </div>
                  {{-- <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                        @if ($errors->has('email'))
                          <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                  </div> --}}
                </div>

              </div>
            {{-- </form> --}}
          </div>
          {{-- <div class="alert alert-danger">
            <span style="font-size:18px;">
              <b> </b> This is a PRO feature!</span>
          </div> --}}
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush




