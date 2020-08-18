@extends('layouts.app', ['activePage' => 'instituitions', 'titlePage' => __('Instituições')])

@section('content')
    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Instituições</h4>
              <p class="card-category"> Lista de instituições</p>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="#" class="btn btn-sm btn-primary">Adicionar Instituição</a>
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


                    <th class="text-right">
                      Opções
                    </th>
                  </tr></thead>
                  <tbody>
                      @foreach ($instituitions as $instituition)


                         <tr>
                        <td>
                         {{ $instituition->id}}
                        </td>
                        <td>
                        {{ $instituition->name}}
                        </td>

                        <td class="td-actions text-right">
                            {!! Form::open(['route' => ['instituition.destroy', $instituition->id ], 'method' => 'DELETE']) !!}
                            {{-- {!! Form::submit('Remover')!!} --}}
                            @include('templates.formulario.submit', ['input' => 'Remover'])

                            {!! Form::close() !!}


                        <a href="{{ route('instituition.show', $instituition->id )}}">Detalhes</a>
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
            </div>
          </div>



          <div class="col-md-12">
            {{-- <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal"> --}}
              @csrf
              @method('put')

              <div class="card ">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ __('Cadastrar instituição') }}</h4>
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
                        <h3>sEM RETORNO</h3>


                        @endif

                        {!! Form::open(['route' => 'instituition.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                            <div class="col-sm-7">
                        @include('templates.formulario.input', ['label' => 'Nome', 'input'=> 'name', 'attributes' => ['placeholder' => 'NOme']])
                    </div></div>




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
