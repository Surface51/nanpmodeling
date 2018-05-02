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
                            <div class="card-header">Edit Dietary Ingredient</div>
                            <div role="tabpanel" class="tab-pane active" id="maincho">
                                <div class="container-fluid">
                                    {!! Form::open(array('method' => 'post', 'route' => array('ingredient.update', $ref))) !!}
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

                                        <div class="form-group col-md-4">
                                            {{ Form::label('TrtID', 'TrtID') }}
                                            {{ Form::text('TrtID', $TrtID, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Dietary Inclusion', 'Dietary_inclusion') }}
                                            {{ Form::text('Dietary Inclusion', $Dietary_inclusion, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('IngredientName', 'IngredientName') }}
                                            {{ Form::text('Ingredient Name', $IngredientName, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('DM', 'DM') }}
                                            {{ Form::text('DM', $DM, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('OM', 'OM') }}
                                            {{ Form::text('OM', $OM, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('CP', 'CP') }}
                                            {{ Form::text('CP', $CP, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('RUP', 'RUP') }}
                                            {{ Form::text('RUP', $RUP, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('RDP', 'RDP') }}
                                            {{ Form::text('RDP', $RDP, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('SolN', 'SolN') }}
                                            {{ Form::text('SolN', $SolN, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('N', 'N') }}
                                            {{ Form::text('N', $N, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C', 'C') }}
                                            {{ Form::text('C', $C, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('EE', 'EE') }}
                                            {{ Form::text('EE', $EE, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('FA', 'FA') }}
                                            {{ Form::text('FA', $FA, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('CFiber', 'CFiber') }}
                                            {{ Form::text('CFiber', $CFiber, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NDF', 'NDF') }}
                                            {{ Form::text('NDF', $NDF, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('ADF', 'ADF') }}
                                            {{ Form::text('ADF', $ADF, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('HC', 'HC') }}
                                            {{ Form::text('HC', $HC, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Cel', 'Cel') }}
                                            {{ Form::text('Cel', $Cel, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Lignin', 'Lignin') }}
                                            {{ Form::text('Lignin', $Lignin, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Starch', 'Starch') }}
                                            {{ Form::text('Starch', $Starch, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NFC', 'NFC') }}
                                            {{ Form::text('NFC', $NFC, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('SolRes', 'SolRes') }}
                                            {{ Form::text('SolRes', $SolRes, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NFC', 'NFC') }}
                                            {{ Form::text('NFC', $NFC, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NDSA', 'NDSA') }}
                                            {{ Form::text('NDSA', $NDSA, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('GE', 'GE') }}
                                            {{ Form::text('GE', $GE, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('TDN', 'TDN') }}
                                            {{ Form::text('TDN', $TDN, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('DE', 'DE') }}
                                            {{ Form::text('DE', $DE, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('ME', 'ME') }}
                                            {{ Form::text('ME', $ME, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NEm', 'NEm') }}
                                            {{ Form::text('NEm', $NEm, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NEg', 'NEg') }}
                                            {{ Form::text('NEg', $NEg, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NEl', 'NEl') }}
                                            {{ Form::text('NEl', $NEl, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Ash', 'Ash') }}
                                            {{ Form::text('Ash', $Ash, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Ca', 'Ca') }}
                                            {{ Form::text('Ca', $Ca, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Ca', 'Ca') }}
                                            {{ Form::text('Ca', $Ca, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('P', 'P') }}
                                            {{ Form::text('P', $P, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Mg', 'Mg') }}
                                            {{ Form::text('Mg', $Mg, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('K', 'K') }}
                                            {{ Form::text('K', $K, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Na', 'Na') }}
                                            {{ Form::text('Na', $Na, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Cl', 'Cl') }}
                                            {{ Form::text('Cl', $Cl, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('S', 'S') }}
                                            {{ Form::text('S', $S, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Lys', 'Lys') }}
                                            {{ Form::text('Lys', $Lys, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Arg', 'Arg') }}
                                            {{ Form::text('Arg', $Arg, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('His', 'His') }}
                                            {{ Form::text('His', $His, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Ile', 'Ile') }}
                                            {{ Form::text('Ile', $Ile, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Leu', 'Leu') }}
                                            {{ Form::text('Leu', $Leu, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Met', 'Met') }}
                                            {{ Form::text('Met', $Met, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('CyS', 'CyS') }}
                                            {{ Form::text('CyS', $CyS, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Phe', 'Phe') }}
                                            {{ Form::text('Phe', $Phe, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Tyr', 'Tyr') }}
                                            {{ Form::text('Tyr', $Tyr, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Trp', 'Trp') }}
                                            {{ Form::text('Trp', $Trp, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Val', 'Val') }}
                                            {{ Form::text('Val', $Val, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C12:0', 'C12:0') }}
                                            {{ Form::text('C12:0', $C120, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C14:0', 'C14:0') }}
                                            {{ Form::text('C14:0', $C140, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C16:0', 'C16:0') }}
                                            {{ Form::text('C16:0', $C160, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C16:1', 'C16:1') }}
                                            {{ Form::text('C16:1', $C161, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:0', 'C18:0') }}
                                            {{ Form::text('C18:0', $C180, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:ltrans', 'C18:ltrans') }}
                                            {{ Form::text('C18:ltrans', $C18ltrans, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:lcis', 'C18:lcis') }}
                                            {{ Form::text('C18:lcis', $C18lcis, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:2c', 'C18:2c') }}
                                            {{ Form::text('C18:2c', $C182c, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:3', 'C18:3') }}
                                            {{ Form::text('C18:3', $C183, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C20:0', 'C20:0') }}
                                            {{ Form::text('C20:0', $C200, array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('OthersFA', 'OthersFA') }}
                                            {{ Form::text('OthersFA', $OthersFA, array('class' => 'form-control')) }}
                                        </div>

                                        {{ Form::submit('Update the Dietary Ingredient', array('class' => 'btn btn-primary')) }}


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
