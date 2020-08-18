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
              @include('courses.list', ['course_list' => $courses])
            </div>
          </div>



          <div class="col-md-12">
            {{-- <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal"> --}}
              @csrf
              @method('put')

              <div class="card ">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ __('Cadastrar curso') }}</h4>
                  <p class="card-category">{{ __('Formulário de cadastro') }}</p>
                </div>
                <div class="card-body ">





                  @if (session('status'))
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                          </button>
                          <span>{{ session('status') }}</span>
                        </div>
                      </div>
                    </div>
                  @endif
                  <div class="row">

                    <div class="col-sm-7">
                        @if(session('success'))
                            <h3>{{ session('success') ['messages'] }} </h3>
                        @else
                        <h3>Sem retorno</h3>


                        @endif

                        {!! Form::open(['route' => 'course.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Nome do Curso') }}</label>
                        <div class="col-sm-7">
                    @include('templates.formulario.input', ['label' => 'Curso', 'input'=> 'name', 'attributes' => ['placeholder' => 'Nome']])
                </div></div>


                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Nome do usuário') }}</label>
                    <div class="col-sm-7">
                @include('templates.formulario.select', ['label' => 'Usuário', 'select'=> 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'Exemplo: Henrique']])
            </div></div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Nome da Instituição') }}</label>
                    <div class="col-sm-7">
                @include('templates.formulario.select', ['label' => 'Instituição', 'select'=> 'instituition_id', 'data' => $instituition_list, 'attributes' => ['placeholder' => 'Exemplo: UEPG'], ['class' => 'form-control']])
            </div></div>

            {{-- <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Nome da Instituição') }}</label>
                <div class="col-sm-7">
            <select name="" class="form-control" id=""></select>
        </div></div> --}}






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
