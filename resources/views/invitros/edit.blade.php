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
                            <div class="card-header">Edit Invitro Data</div>
                            <div role="tabpanel" class="tab-pane active" id="maincho">
                                <div class="container-fluid">
                                    {!! Form::open(array('method' => 'post', 'route' => array('invitros.update', $invitro->id))) !!}
                                    <div class="col-md-12" id="create-form">
                                        <div class="form-group col-md-4">
                                            {{ Form::label('DataSet', 'DataSet') }}
                                            {{ Form::text('DataSet', $invitro->DataSet, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('PubID', 'PubID') }}
                                            {{ Form::text('PubID', $invitro->PubID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('TrialID', 'TrialID') }}
                                            {{ Form::text('TrialID', $invitro->TrialID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('TrtID', 'TrtID') }}
                                            {{ Form::text('TrtID', $invitro->TrtID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SubjectID', 'SubjectID') }}
                                            {{ Form::text('SubjectID', $invitro->SubjectID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('PlateID', 'PlateID') }}
                                            {{ Form::text('PlateID', $invitro->PlateID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('WellID', 'WellID') }}
                                            {{ Form::text('WellID', $invitro->WellID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SubTrtID', 'SubTrtID') }}
                                            {{ Form::text('SubTrtID', $invitro->SubTrtID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Site_sample', 'Site_sample') }}
                                            {{ Form::text('Site_sample', $invitro->Site_sample, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Cell_Type', 'Cell_Type') }}
                                            {{ Form::text('Cell_Type', $invitro->Cell_Type, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Day_Sample', 'Day_Sample') }}
                                            {{ Form::text('Day_Sample', $invitro->Day_Sample, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Day_Sample2', 'Day_Sample2') }}
                                            {{ Form::text('Day_Sample2', $invitro->Day_Sample2, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('Time_Sample', 'Time_Sample') }}
                                            {{ Form::text('Time_Sample', $invitro->Time_Sample, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('VarName', 'VarName') }}
                                            {{ Form::text('VarName', $invitro->VarName, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('VarValue', 'VarValue') }}
                                            {{ Form::text('VarValue', $invitro->VarValue, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('VarUnits', 'VarUnits') }}
                                            {{ Form::text('VarUnits', $invitro->VarUnits, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('N', 'N') }}
                                            {{ Form::text('N', $invitro->N, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SE', 'SE') }}
                                            {{ Form::text('SE', $invitro->SE, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('SD', 'SD') }}
                                            {{ Form::text('SD', $invitro->SD, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('VarType', 'VarType') }}
                                            {{ Form::text('VarType', $invitro->VarType, array('class' => 'form-control')) }}
                                        </div>

                                        {{ Form::submit('Update the In Vitro Data', array('class' => 'btn btn-primary')) }}


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
