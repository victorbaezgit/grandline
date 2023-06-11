@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Coleccione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Coleccione</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('colecciones.update', $coleccione->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('coleccione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
