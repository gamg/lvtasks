@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $data['title'] }}</h3>
                </div>
                <div class="panel-body">
                    @include('partials.errors')
                    @if(!empty($category))
                        {!! Form::model($category, $header) !!}
                    @else
                        {!! Form::open($header) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('Nombre de categoría') !!}
                            {!! Form::text('name', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Ingresa nombre de categoría',
                                'required' => true ])
                            !!}
                        </div>
                        {!! Form::submit( $data['button'], ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection