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
                            <div class="card-header">Create Dietary Ingredients</div>
                            <div role="tabpanel" class="tab-pane active" id="maincho">
                                <div class="container-fluid">
                                    {!! Form::open(array('method' => 'post', 'route' => array('ingredient.store'))) !!}
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

                                        <div class="form-group col-md-4">
                                            {{ Form::label('TrtID', 'TrtID') }}
                                            {{ Form::text('TrtID', Input::old('TrtID'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('IFN', 'IFN') }}
                                            {{ Form::text('IFN', Input::old('IFN'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Dietary Inclusion', 'Dietary_inclusion') }}
                                            {{ Form::text('Dietary Inclusion', Input::old('Dietary_inclusion'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('IngredientName', 'IngredientName') }}
                                            {{ Form::text('Ingredient Name', Input::old('IngredientName'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('DM', 'DM') }}
                                            {{ Form::text('DM', Input::old('DM'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('DM', 'DM') }}
                                            {{ Form::text('DM', Input::old('DM'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('OM', 'OM') }}
                                            {{ Form::text('OM', Input::old('OM'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('CP', 'CP') }}
                                            {{ Form::text('CP', Input::old('CP'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('RUP', 'RUP') }}
                                            {{ Form::text('RUP', Input::old('RUP'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('RDP', 'RDP') }}
                                            {{ Form::text('RDP', Input::old('RDP'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('SolN', 'SolN') }}
                                            {{ Form::text('SolN', Input::old('SolN'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('N', 'N') }}
                                            {{ Form::text('N', Input::old('N'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C', 'C') }}
                                            {{ Form::text('C', Input::old('C'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('EE', 'EE') }}
                                            {{ Form::text('EE', Input::old('EE'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('FA', 'FA') }}
                                            {{ Form::text('FA', Input::old('FA'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('CFiber', 'CFiber') }}
                                            {{ Form::text('CFiber', Input::old('CFiber'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NDF', 'NDF') }}
                                            {{ Form::text('NDF', Input::old('NDF'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('ADF', 'ADF') }}
                                            {{ Form::text('ADF', Input::old('ADF'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('HC', 'HC') }}
                                            {{ Form::text('HC', Input::old('HC'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Cel', 'Cel') }}
                                            {{ Form::text('Cel', Input::old('Cel'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Lignin', 'Lignin') }}
                                            {{ Form::text('Lignin', Input::old('Lignin'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Starch', 'Starch') }}
                                            {{ Form::text('Starch', Input::old('Starch'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NFC', 'NFC') }}
                                            {{ Form::text('NFC', Input::old('NFC'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('SolRes', 'SolRes') }}
                                            {{ Form::text('SolRes', Input::old('SolRes'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NFC', 'NFC') }}
                                            {{ Form::text('NFC', Input::old('NFC'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NDSA', 'NDSA') }}
                                            {{ Form::text('NDSA', Input::old('NDSA'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('GE', 'GE') }}
                                            {{ Form::text('GE', Input::old('GE'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('TDN', 'TDN') }}
                                            {{ Form::text('TDN', Input::old('TDN'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('DE', 'DE') }}
                                            {{ Form::text('DE', Input::old('DE'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('ME', 'ME') }}
                                            {{ Form::text('ME', Input::old('ME'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NEm', 'NEm') }}
                                            {{ Form::text('NEm', Input::old('NEm'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NEg', 'NEg') }}
                                            {{ Form::text('NEg', Input::old('NEg'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('NEl', 'NEl') }}
                                            {{ Form::text('NEl', Input::old('NEl'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Ash', 'Ash') }}
                                            {{ Form::text('Ash', Input::old('Ash'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Ca', 'Ca') }}
                                            {{ Form::text('Ca', Input::old('Ca'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Ca', 'Ca') }}
                                            {{ Form::text('Ca', Input::old('Ca'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('P', 'P') }}
                                            {{ Form::text('P', Input::old('P'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Mg', 'Mg') }}
                                            {{ Form::text('Mg', Input::old('Mg'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('K', 'K') }}
                                            {{ Form::text('K', Input::old('K'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Na', 'Na') }}
                                            {{ Form::text('Na', Input::old('Na'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Cl', 'Cl') }}
                                            {{ Form::text('Cl', Input::old('Cl'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('S', 'S') }}
                                            {{ Form::text('S', Input::old('S'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Lys', 'Lys') }}
                                            {{ Form::text('Lys', Input::old('Lys'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Arg', 'Arg') }}
                                            {{ Form::text('Arg', Input::old('Arg'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('His', 'His') }}
                                            {{ Form::text('His', Input::old('His'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Ile', 'Ile') }}
                                            {{ Form::text('Ile', Input::old('Ile'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Leu', 'Leu') }}
                                            {{ Form::text('Leu', Input::old('Leu'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Met', 'Met') }}
                                            {{ Form::text('Met', Input::old('Met'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('CyS', 'CyS') }}
                                            {{ Form::text('CyS', Input::old('CyS'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Phe', 'Phe') }}
                                            {{ Form::text('Phe', Input::old('Phe'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Tyr', 'Tyr') }}
                                            {{ Form::text('Tyr', Input::old('Tyr'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Trp', 'Trp') }}
                                            {{ Form::text('Trp', Input::old('Trp'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('Val', 'Val') }}
                                            {{ Form::text('Val', Input::old('Val'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C12:0', 'C12:0') }}
                                            {{ Form::text('C12:0', Input::old('C12:0'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C14:0', 'C14:0') }}
                                            {{ Form::text('C14:0', Input::old('C14:0'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C16:0', 'C16:0') }}
                                            {{ Form::text('C16:0', Input::old('C16:0'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C16:1', 'C16:1') }}
                                            {{ Form::text('C16:1', Input::old('C16:1'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:0', 'C18:0') }}
                                            {{ Form::text('C18:0', Input::old('C18:0'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:ltrans', 'C18:ltrans') }}
                                            {{ Form::text('C18:ltrans', Input::old('C18:ltrans'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:1cis', 'C18:1cis') }}
                                            {{ Form::text('C18:1cis', Input::old('C18:1cis'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:2c', 'C18:2c') }}
                                            {{ Form::text('C18:2c', Input::old('C18:2c'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C18:3', 'C18:3') }}
                                            {{ Form::text('C18:3', Input::old('C18:3'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('C20:0', 'C20:0') }}
                                            {{ Form::text('C20:0', Input::old('C20:0'), array('class' => 'form-control')) }}
                                        </div>

                                        <div class="form-group col-md-8">
                                            {{ Form::label('OthersFA', 'OthersFA') }}
                                            {{ Form::text('OthersFA', Input::old('OthersFA'), array('class' => 'form-control')) }}
                                        </div>

                                        {{ Form::submit('Create the Dietary Ingredient', array('class' => 'btn btn-primary')) }}


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
