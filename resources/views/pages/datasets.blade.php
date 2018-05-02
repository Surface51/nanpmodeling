@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Export Tables</div>

                    <div class="card-body">
                        <a href="/all-study-descriptors-csv" class="btn btn-primary">Export Study Descriptors CSV</a>
                        <a href="/all-dietary-ingredients-csv" class="btn btn-primary">Export Dietary Ingredients CSV</a>
                        <a href="/all-dietary-nutrients-csv" class="btn btn-primary">Export Dietary Nutrients CSV</a>
                        <a href="/all-subjects-csv" class="btn btn-primary">Export Subjects CSV</a>
                        <a href="/all-performance-data-csv" class="btn btn-primary">Export Performance Data CSV</a>
                        <a href="/all-in-vitro-data-csv" class="btn btn-primary">Export In Vitro Data CSV</a>
                    </div>

                </div>
                <br>
                <div class="card">
                    <div class="card-header">Export Database</div>

                    <div class="card-body">
                        <a href="/download-database" class="btn btn-success">Export Database as SQL file</a>
                        <a href="/import-studies" class="btn btn-default btn-success">Import CSV</a><br>
                    </div>

                </div>
                <br>
                <div class="card">
                    <div class="card-header">Filter Database
                        {!! Form::open(array('method' => 'get', 'route' => array('filter.all'))) !!}
                        <div class="col-md-12" id="filters">
                            <div class="form-group col-md-2">
                                {{ Form::label('Year Start') }}
                                <div class="input-group">
                                    {{ Form::text('start_date', null, ['class' => 'form-control', 'rel'=> 'tooltip', 'title' => 'Filter by Year']) }}
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                {{ Form::label('Year End') }}
                                <div class="input-group">
                                    {{ Form::text('end_date', null, ['class' => 'form-control', 'rel'=> 'tooltip', 'title' => 'Range End']) }}
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                {{ Form::label('DataSet') }}
                                <div class="input-group">
                                    <select class="form-control" name="dataset_all">
                                        @if(isset($_GET['dataset_all']))
                                            <option value="{{$_GET['dataset_all']}}">{{$dataset_all}}</option>
                                        @else
                                            <option value=" ">Select DataSet</option>
                                        @endif
                                        @foreach($datasets_all as $dataset_all)
                                            <option value="{{$dataset_all}}">{{$dataset_all}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                {{ Form::label('PubID') }}
                                <div class="input-group">
                                    <select class="form-control" name="pubid_all">
                                        @if(isset($_GET['pubid_all']))
                                            <option value="{{$_GET['pubid_all']}}">{{$pubid_all}}</option>
                                        @else
                                            <option value=" ">Select PubID</option>
                                        @endif
                                        @foreach($pubids_all as $key => $value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-1">
                                {{ Form::label('Filter') }}
                                <div class="input-group">
                                    <button class="btn btn-default btn-primary">Filter</button>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                {{ Form::label('Clear') }}
                                <div class="input-group">
                                    <a href="/filter-all" class="btn btn-default btn-primary">Clear All Filters</a>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}

                        {!! Form::open(array('method' => 'get', 'route' => array('filterVariables.all'))) !!}
                        <div class="col-md-12" id="input-selection-group">
                            <div class="form-group col-md-2" id="input-query-selection">
                                {{ Form::label('Select Variable') }}
                                <div class="input-group">
                                    <select class="form-control" name="variable_name">
                                        @if(isset($_GET['variable_name']))
                                            <option value="{{$_GET['variable_name']}}">{{$variable_name}}</option>
                                        @else
                                            <option value=" ">Select Variable Name</option>
                                        @endif
                                        @foreach($variable_names as $variable_name)
                                            <option value="{{$variable_name}}">{{$variable_name}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-1" id="input-query-selection">
                                {{ Form::label('Operation') }}
                                <div class="input-group">
                                    <select class="form-control" name="operator">
                                        <option value=" ">No Filter</option>
                                        <option value="<"><</option>
                                        <option value=">">></option>
                                        <option value='>='>>=</option>
                                        <option value='<='><=</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-1" id="input-query-selection">
                                {{ Form::label('Value') }}
                                <div class="input-group">
                                    {{ Form::text('compare_value', null, ['class' => 'form-control', 'rel'=> 'tooltip', 'title' => 'Input Value']) }}
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                {{ Form::label('DataSet') }}
                                <div class="input-group">
                                    <select class="form-control" name="dataset_all">
                                        @if(isset($_GET['dataset_all']))
                                            <option value="{{$_GET['dataset_all']}}">{{$dataset_all}}</option>
                                        @else
                                            <option value=" ">Select DataSet</option>
                                        @endif
                                        @foreach($datasets_all as $dataset_all)
                                            <option value="{{$dataset_all}}">{{$dataset_all}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                {{ Form::label('PubID') }}
                                <div class="input-group">
                                    <select class="form-control" name="pubid_all">
                                        @if(isset($_GET['pubid_all']))
                                            <option value="{{$_GET['pubid_all']}}">{{$pubid_all}}</option>
                                        @else
                                            <option value=" ">Select PubID</option>
                                        @endif
                                        @foreach($performance_pubids_all as $key => $value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-1">
                                {{ Form::label('Filter') }}
                                <div class="input-group">
                                    <button class="btn btn-default btn-primary">Filter</button>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                {{ Form::label('Clear') }}
                                <div class="input-group">
                                    <a href="/filter-all" class="btn btn-default btn-primary">Clear All Filters</a>
                                </div>
                            </div>
                        </div>
                        @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']) || isset($_GET['trialid_all']))
                            <div class="form-group col-md-12">
                                <a class="btn btn-primary" href="{{ route('download.filteredAll',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all']
                                )) }}">Export Filtered CSV
                                </a>
                            </div>
                        @endif
                        {{Form::close()}}
                    </div>
                </div>

                <br>
                <div class="card">
                    <br>
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('download.filteredStudies',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Study Descriptors CSV
                            </a>
                        </div>
                    @endif

                    <div role="tabpanel" class="tab-pane active" id="maincho">
                        <p class="table-label">Study Descriptors Table</p>
                        <div class="container-fluid">
                            <table class="table table-bordered">
                                <thead>
                                <tr id='table-rows'>
                                    <th>DataSet</th>
                                    <th>PubID</th>
                                    <th>TrialID</th>
                                    <th>VarName</th>
                                    <th>VarValue</th>
                                    <th>VarUnits</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('partials.studydescriptors')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <br>
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('download.filteredIngredients',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Dietary Ingredients CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="maincho">
                        <p class="table-label">Dietary Ingredients Table</p>
                        <div class="container-fluid">
                            <table class="table table-bordered">
                                <thead>
                                <tr id='table-rows'>
                                    <th>DataSet</th>
                                    <th>PubID</th>
                                    <th>TrialID</th>
                                    <th>TrtID</th>
                                    <th>IFN</th>
                                    <th>VarName</th>
                                    <th>Varvalue</th>
                                    <th>VarUnits</th>
                                    <th>N</th>
                                    <th>SE</th>
                                    <th>SD</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('partials.ingredients')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <br>
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('download.filteredNutrients',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Dietary Nutrients CSV</a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="maincho">
                        <p class="table-label">Dietary Nutrients Table</p>
                        <div class="container-fluid">
                            <table class="table table-bordered">
                                <thead>
                                <tr id='table-rows'>
                                    <th>DataSet</th>
                                    <th>PubID</th>
                                    <th>TrialID</th>
                                    <th>TrtID</th>
                                    <th>SubjectID</th>
                                    <th>VarName</th>
                                    <th>Varvalue</th>
                                    <th>VarUnits</th>
                                    <th>N</th>
                                    <th>SE</th>
                                    <th>SD</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('partials.nutrients')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <br>
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('download.filteredSubjects',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Subjects CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="maincho">
                        <p class="table-label">Subjects Table</p>
                        <div class="container-fluid">
                            <table class="table table-bordered">
                                <thead>
                                <tr id='table-rows'>
                                    <th>DataSet</th>
                                    <th>PubID</th>
                                    <th>TrialID</th>
                                    <th>TrtID</th>
                                    <th>SubjectID</th>
                                    <th>VarName</th>
                                    <th>Varvalue</th>
                                    <th>VarUnits</th>
                                    <th>N</th>
                                    <th>SE</th>
                                    <th>SD</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('partials.subjects')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <br>
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('download.filteredPerformances',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Performance Data CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="maincho">
                        <p class="table-label">Performance Data Table</p>
                        <div class="container-fluid">
                            <table class="table table-bordered">
                                <thead>
                                <tr id='table-rows'>
                                    <th>DataSet</th>
                                    <th>PubID</th>
                                    <th>TrialID</th>
                                    <th>TrtID</th>
                                    <th>SubjectID</th>
                                    <th>Site_Sample</th>
                                    <th>Day_Sample</th>
                                    <th>Time_Sample</th>
                                    <th>VarName</th>
                                    <th>VarValue</th>
                                    <th>VarUnits</th>
                                    <th>N</th>
                                    <th>SE</th>
                                    <th>SD</th>
                                    <th>VarType</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('partials.performances')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <br>
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('download.filteredInVitroDatas',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered In Vitro Data CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="maincho">
                        <p class="table-label">In Vitro Data Table</p>
                        <div class="container-fluid">
                            <table class="table table-bordered">
                                <thead>
                                <tr id='table-rows'>
                                    <th>DataSet</th>
                                    <th>PubID</th>
                                    <th>TrialID</th>
                                    <th>TrtID</th>
                                    <th>SubjectID</th>
                                    <th>PlateID</th>
                                    <th>WellID</th>
                                    <th>SubTrtID</th>
                                    <th>Site_sample</th>
                                    <th>Cell_Type</th>
                                    <th>Day_Sample</th>
                                    <th>Time_Sample</th>
                                    <th>VarName</th>
                                    <th>VarValue</th>
                                    <th>VarUnits</th>
                                    <th>N</th>
                                    <th>SE</th>
                                    <th>SD</th>
                                    <th>VarType</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('partials.invitros')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
@endsection