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
                            <div class="card-header">Edit Genome Transcript</div>
                            <div role="tabpanel" class="tab-pane active" id="maincho">
                                <div class="container-fluid">
                                    {!! Form::open(array('method' => 'post', 'route' => array('genomes.update', $genome->id))) !!}
                                    <div class="col-md-12" id="create-form">
                                        <div class="form-group col-md-4">
                                            {{ Form::label('DataSet', 'DataSet') }}
                                            {{ Form::text('DataSet', $genome->DataSet, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('PubID', 'PubID') }}
                                            {{ Form::text('PubID', $genome->PubID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('TrialID', 'TrialID') }}
                                            {{ Form::text('TrialID', $genome->TrialID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('TrtID', 'TrtID') }}
                                            {{ Form::text('TrtID', $genome->TrtID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SubjectID', 'SubjectID') }}
                                            {{ Form::text('SubjectID', $genome->SubjectID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('PlateID', 'PlateID') }}
                                            {{ Form::text('PlateID', $genome->PlateID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('WellID', 'WellID') }}
                                            {{ Form::text('WellID', $genome->WellID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SubjectID', 'SubjectID') }}
                                            {{ Form::text('SubjectID', $genome->SubjectID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SubTrtID', 'SubTrtID') }}
                                            {{ Form::text('SubTrtID', $genome->SubTrtID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Site_sample', 'Site_sample') }}
                                            {{ Form::text('Site_sample', $genome->Site_sample, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Cell_Type', 'Cell_Type') }}
                                            {{ Form::text('Cell_Type', $genome->Cell_Type, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Day_Sample', 'Day_Sample') }}
                                            {{ Form::text('Day_Sample', $genome->Day_Sample, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Day_Sample2', 'Day_Sample2') }}
                                            {{ Form::text('Day_Sample2', $genome->Day_Sample2, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Time_Sample', 'Time_Sample') }}
                                            {{ Form::text('Time_Sample', $genome->Time_Sample, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('VarName', 'VarName') }}
                                            {{ Form::text('VarName', $genome->VarName, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('VarValue', 'VarValue') }}
                                            {{ Form::text('VarValue', $genome->VarValue, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('VarUnits', 'VarUnits') }}
                                            {{ Form::text('VarUnits', $genome->VarUnits, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('N', 'N') }}
                                            {{ Form::text('N', $genome->N, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SE', 'SE') }}
                                            {{ Form::text('SE', $genome->SE, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SD', 'SD') }}
                                            {{ Form::text('SD', $genome->SD, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('VarType', 'VarType') }}
                                            {{ Form::text('VarType', $genome->VarType, array('class' => 'form-control')) }}
                                        </div>

                                        {{ Form::submit('Update the Genome Transcript', array('class' => 'btn btn-primary')) }}


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
