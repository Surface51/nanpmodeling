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
                            <div class="card-header">Create Genome Transcript</div>
                            <div role="tabpanel" class="tab-pane active" id="maincho">
                                <div class="container-fluid">
                                    {!! Form::open(array('method' => 'post', 'route' => array('genomes.store'))) !!}
                                    <div class="col-md-12" id="create-form">
                                        <div class="form-group col-md-4">
                                            {{ Form::label('DataSet', 'DataSet') }}
                                            {{ Form::text('DataSet', Input::old('DataSet'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('PubID', 'PubID') }}
                                            {{ Form::text('PubID', Input::old('PubID'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('TrialID', 'TrialID') }}
                                            {{ Form::text('TrialID', Input::old('TrialID'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('TrtID', 'TrtID') }}
                                            {{ Form::text('TrtID', Input::old('TrtID'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('SubjectID', 'SubjectID') }}
                                            {{ Form::text('SubjectID', Input::old('SubjectID'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('PlateID', 'PlateID') }}
                                            {{ Form::text('PlateID', Input::old('PlateID'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('WellID', 'WellID') }}
                                            {{ Form::text('WellID', Input::old('WellID'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('SubTrtID', 'SubTrtID') }}
                                            {{ Form::text('SubTrtID', Input::old('SubTrtID'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Site_sample', 'Site_sample') }}
                                            {{ Form::text('Site_sample', Input::old('Site_sample'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Cell_Type', 'Cell_Type') }}
                                            {{ Form::text('Cell_Type', Input::old('Cell_Type'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Day_Sample', 'Day_Sample') }}
                                            {{ Form::text('Day_Sample', Input::old('Day_Sample'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Day_Sample2', 'Day_Sample2') }}
                                            {{ Form::text('Day_Sample2', Input::old('Day_Sample2'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Time_Sample', 'Time_Sample') }}
                                            {{ Form::text('Time_Sample', Input::old('Time_Sample'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('VarName', 'VarName') }}
                                            {{ Form::text('VarName', Input::old('VarName'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('VarValue', 'VarValue') }}
                                            {{ Form::text('VarValue', Input::old('VarValue'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('VarUnits', 'VarUnits') }}
                                            {{ Form::text('VarUnits', Input::old('VarUnits'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('N', 'N') }}
                                            {{ Form::text('N', Input::old('N'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('SE', 'SE') }}
                                            {{ Form::text('SE', Input::old('SE'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('SD', 'SD') }}
                                            {{ Form::text('SD', Input::old('SD'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('VarType', 'VarType') }}
                                            {{ Form::text('VarType', Input::old('VarType'), array('class' => 'form-control')) }}
                                        </div>

                                        {{ Form::submit('Create a Genome Transcript', array('class' => 'btn btn-primary')) }}


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
