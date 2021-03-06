@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Users')])

@section('content')
    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">



          <div class="col-md-12">
            {{-- <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal"> --}}
              @csrf
              @method('put')

              <div class="card ">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ __('Editar usuário') }}</h4>
                  <p class="card-category">{{ __('Formulário de edição') }}</p>
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
                        {{-- @if(session('success'))
                            <h3>{{ session('success') ['messages'] }} </h3>
                        @else
                        <h3>sEM RETORNO</h3>


                        @endif --}}

                        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('CPF') }}</label>
                            <div class="col-sm-7">
                        @include('templates.formulario.input', ['label' => 'CPF', 'input'=> 'cpf', 'attributes' => ['placeholder' => 'Cpf']])
                    </div></div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                        <div class="col-sm-7">
                        @include('templates.formulario.input', ['input' => 'name', 'input'=> 'name', 'attributes' => ['placeholder' => 'Nome']])
                    </div></div>

                    <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-7">
                        @include('templates.formulario.input', ['input' => 'email', 'input'=> 'email', 'attributes' => ['placeholder' => 'E-mail']])
                    </div></div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Telefone') }}</label>
                        <div class="col-sm-7">
                            @include('templates.formulario.input', ['input' => 'phone', 'input'=> 'phone', 'attributes' => ['placeholder' => 'Telefone']])
                        </div></div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Senha') }}</label>
                        @include('templates.formulario.password', ['input' => 'password', 'input'=> 'password', 'attributes' => ['placeholder' => 'Senha']])
                    </div></div>

                        @include('templates.formulario.submit', ['input' => 'Atualizar'])

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
