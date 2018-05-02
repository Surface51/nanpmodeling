@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('alerts'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alerts') }}</p>
                @endif

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Edit Study Descriptor</div>
                            <div role="tabpanel" class="tab-pane active" id="maincho">
                                <div class="container-fluid">
                                    {!! Form::open(array('method' => 'post', 'route' => array('study.update', $ref))) !!}
                                    <div class="col-md-12" id="create-form">
                                        <div class="form-group col-md-4">
                                            {{ Form::label('DataSet', 'DataSet') }}
                                            {{ Form::text('DataSet', $DataSet, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('PubID', 'PubID') }}
                                            {{ Form::text('PubID', $PubID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('TrialID', 'TrialID') }}
                                            {{ Form::text('TrialID', $TrialID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Acknowledgement', 'Acknowledgement') }}
                                            {{ Form::text('Acknowledgement', $Acknowledgement, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Reference', 'Reference') }}
                                            {{ Form::text('Reference', $Reference, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Year', 'Year') }}
                                            {{ Form::text('Year', $Year, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Location', 'Location') }}
                                            {{ Form::text('Location', $Location, array('class' => 'form-control')) }}
                                        </div>

                                        {{ Form::submit('Update the Study Descriptor', array('class' => 'btn btn-primary')) }}


                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@stop
