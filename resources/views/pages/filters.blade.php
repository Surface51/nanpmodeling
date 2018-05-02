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
                        {!! Form::open(array('method' => 'get', 'route' => array('filters'))) !!}
                        <div class="col-md-12" id="filters">
                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('DataSet') }}
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
                                <div class="input-group">
                                    {{ Form::label('PubID') }}
                                    <select class="form-control" name="pubid_all">
                                        @if(isset($_GET['pubid_all']))
                                            <option value="{{$_GET['pubid_all']}}">{{$pubid_all}}</option>
                                        @else
                                            <option value=" ">Select PubID</option>
                                        @endif
                                        @foreach($pubids_all as $pubid_all)
                                            <option value="{{$pubid_all}}">{{$pubid_all}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrialID') }}
                                    <select class="form-control" name="trialid_all">
                                        @if(isset($_GET['trialid_all']))
                                            <option value="{{$_GET['trialid_all']}}">{{$trialid_all}}</option>
                                        @else
                                            <option value=" ">Select TrialID</option>
                                        @endif
                                        @foreach($trialids_all as $trialid_all)
                                            <option value="{{$trialid_all}}">{{$trialid_all}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <button class="btn btn-default btn-primary">Filter</button>
                            </div>
                        </div>
                        @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']) || isset($_GET['trialid_all']))
                            <div class="form-group col-md-12">
                                <a class="btn btn-primary" href="{{ route('download.filteredAll',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                'trialid' => $_GET['trialid_all']
                                )) }}">Export Filtered CSV</a>
                            </div>
                        @endif
                        {{Form::close()}}
                    </div>

                    <div class="card-body">

                    </div>

                </div>
                <br>
                <br>
                <div class="card">
                    <div class="card-header">Filter Studies
                        {!! Form::open(array('method' => 'get', 'route' => array('filters'))) !!}
                        <div class="col-md-12" id="filters">
                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('DataSet') }}
                                    <select class="form-control" name="dataset">
                                        @if(isset($_GET['dataset']))
                                            <option value="{{$_GET['dataset']}}">{{$dataset}}</option>
                                        @else
                                            <option value=" ">Select DataSet</option>
                                        @endif
                                            @foreach($datasets_study as $dataset)
                                                <option value="{{$dataset}}">{{$dataset}}</option>
                                            @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('PubID') }}
                                    <select class="form-control" name="pubid">
                                        @if(isset($_GET['pubid']))
                                            <option value="{{$_GET['pubid']}}">{{$pubid}}</option>
                                        @else
                                            <option value=" ">Select PubID</option>
                                        @endif
                                        @foreach($pubids_study as $pubid)
                                            <option value="{{$pubid}}">{{$pubid}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrialID') }}
                                    <select class="form-control" name="trialid">
                                        @if(isset($_GET['trialid']))
                                            <option value="{{$_GET['trialid']}}">{{$trialid}}</option>
                                        @else
                                            <option value=" ">Select TrialID</option>
                                        @endif
                                        @foreach($trialids_study as $trialid)
                                            <option value="{{$trialid}}">{{$trialid}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <button class="btn btn-default btn-primary">Filter</button>
                            </div>
                        </div>
                        @if(isset($_GET['dataset']) || isset($_GET['pubid']) || isset($_GET['trialid']))
                            <div class="form-group col-md-12">
                                <a class="btn btn-primary" href="{{ route('download.filteredStudies',
                                array(
                                'id' => $_GET['dataset'],
                                'dataset' => $_GET['dataset'],
                                'pubid' => $_GET['pubid'],
                                'trialid' => $_GET['trialid']
                                )) }}">Export Filtered Study Descriptors CSV</a>
                            </div>
                        @endif
                        {{Form::close()}}
                    </div>

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

                    <div class="card-body">

                    </div>
                </div>

                <br>
                <br>
                <div class="card">
                    <div class="card-header">Filter Ingredients
                        {!! Form::open(array('method' => 'get', 'route' => array('filters'))) !!}
                        <div class="col-md-12" id="filters">
                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('DataSet') }}
                                    <select class="form-control" name="dataset_ingredient">
                                        @if(isset($_GET['dataset_ingredient']))
                                            <option value="{{$_GET['dataset_ingredient']}}">{{$dataset_ingredient}}</option>
                                        @else
                                            <option value=" ">Select DataSet</option>
                                        @endif
                                        @foreach($datasets_ingredients as $dataset_ingredient)
                                            <option value="{{$dataset_ingredient}}">{{$dataset_ingredient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('PubID') }}
                                    <select class="form-control" name="pubid_ingredient">
                                        @if(isset($_GET['pubid_ingredient']))
                                            <option value="{{$_GET['pubid_ingredient']}}">{{$pubid_ingredient}}</option>
                                        @else
                                            <option value=" ">Select PubID</option>
                                        @endif
                                        @foreach($pubids_ingredients as $pubid_ingredient)
                                            <option value="{{$pubid_ingredient}}">{{$pubid_ingredient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrialID') }}
                                    <select class="form-control" name="trialid_ingredient">
                                        @if(isset($_GET['trialid_ingredient']))
                                            <option value="{{$_GET['trialid_ingredient']}}">{{$trialid_ingredient}}</option>
                                        @else
                                            <option value=" ">Select TrialID</option>
                                        @endif
                                        @foreach($trialids_ingredients as $trialid_ingredient)
                                            <option value="{{$trialid_ingredient}}">{{$trialid_ingredient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrtID') }}
                                    <select class="form-control" name="trtid_ingredient">
                                        @if(isset($_GET['trtid_ingredient']))
                                            <option value="{{$_GET['trtid_ingredient']}}">{{$trtid_ingredient}}</option>
                                        @else
                                            <option value=" ">Select TrtID</option>
                                        @endif
                                        @foreach($trtids_ingredients as $trtid_ingredient)
                                            <option value="{{$trtid_ingredient}}">{{$trtid_ingredient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('IFN') }}
                                    <select class="form-control" name="ifn_ingredient">
                                        @if(isset($_GET['ifn_ingredient']))
                                            <option value="{{$_GET['ifn_ingredient']}}">{{$ifn_ingredient}}</option>
                                        @else
                                            <option value=" ">Select IFN</option>
                                        @endif
                                        @foreach($ifn_ingredients as $ifn_ingredient)
                                            <option value="{{$ifn_ingredient}}">{{$ifn_ingredient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <button class="btn btn-default btn-primary">Filter</button>
                            </div>
                        </div>
                        @if(isset($_GET['dataset_ingredient']) || isset($_GET['pubid_ingredient']) || isset($_GET['trialid_ingredient']) || isset($_GET['trtid_ingredient']) || isset($_GET['ifn_ingredient']))
                            <div class="form-group col-md-12">
                                <a class="btn btn-primary" href="{{ route('download.filteredIngredients',
                                    array(
                                    'id' => $_GET['dataset_ingredient'],
                                    'dataset_ingredient' => $_GET['dataset_ingredient'],
                                    'pubid_ingredient' => $_GET['pubid_ingredient'],
                                    'trialid_ingredient' => $_GET['trialid_ingredient'],
                                    'trtid_ingredient' => $_GET['trtid_ingredient'],
                                    'ifn_ingredient' => $_GET['ifn_ingredient'],
                                    ))}}">Export Filtered Ingredients CSV</a>
                            </div>
                        @endif
                        {{Form::close()}}
                    </div>

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

                    <div class="card-body">

                    </div>
                </div>

                <br>
                <br>
                <div class="card">
                    <div class="card-header">Filter Nutrients
                        {!! Form::open(array('method' => 'get', 'route' => array('filters'))) !!}
                        <div class="col-md-12" id="filters">
                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('DataSet') }}
                                    <select class="form-control" name="dataset_nutrient">
                                        @if(isset($_GET['dataset_nutrient']))
                                            <option value="{{$_GET['dataset_nutrient']}}">{{$dataset_nutrient}}</option>
                                        @else
                                            <option value=" ">Select DataSet</option>
                                        @endif
                                        @foreach($datasets_nutrients as $dataset_nutrient)
                                            <option value="{{$dataset_nutrient}}">{{$dataset_nutrient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('PubID') }}
                                    <select class="form-control" name="pubid_nutrient">
                                        @if(isset($_GET['pubid_nutrient']))
                                            <option value="{{$_GET['pubid_nutrient']}}">{{$pubid_nutrient}}</option>
                                        @else
                                            <option value=" ">Select PubID</option>
                                        @endif
                                        @foreach($pubids_nutrients as $pubid_nutrient)
                                            <option value="{{$pubid_nutrient}}">{{$pubid_nutrient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrialID') }}
                                    <select class="form-control" name="trialid_nutrient">
                                        @if(isset($_GET['trialid_nutrient']))
                                            <option value="{{$_GET['trialid_nutrient']}}">{{$trialid_nutrient}}</option>
                                        @else
                                            <option value=" ">Select TrialID</option>
                                        @endif
                                        @foreach($trialids_nutrients as $trialid_nutrient)
                                            <option value="{{$trialid_nutrient}}">{{$trialid_nutrient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrtID') }}
                                    <select class="form-control" name="trtid_nutrient">
                                        @if(isset($_GET['trtid_nutrient']))
                                            <option value="{{$_GET['trtid_nutrient']}}">{{$trtid_nutrient}}</option>
                                        @else
                                            <option value=" ">Select TrtID</option>
                                        @endif
                                        @foreach($trtids_nutrients as $trtid_nutrient)
                                            <option value="{{$trtid_nutrient}}">{{$trtid_nutrient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('SubjectID') }}
                                    <select class="form-control" name="subjectid_nutrient">
                                        @if(isset($_GET['subjectid_nutrient']))
                                            <option value="{{$_GET['subjectid_nutrient']}}">{{$subjectid_nutrient}}</option>
                                        @else
                                            <option value=" ">Select SubjectID</option>
                                        @endif
                                        @foreach($subjectid_nutrients as $subjectid_nutrient)
                                            <option value="{{$subjectid_nutrient}}">{{$subjectid_nutrient}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <button class="btn btn-default btn-primary">Filter</button>
                            </div>
                        </div>
                        @if(isset($_GET['dataset_nutrient']) || isset($_GET['pubid_nutrient']) || isset($_GET['trialid_nutrient']) || isset($_GET['trtid_nutrient']) || isset($_GET['subjectid_nutrient']))
                            <div class="form-group col-md-12">
                                <a class="btn btn-primary" href="{{ route('download.filteredNutrients',
                                    array(
                                    'id' => $_GET['dataset_nutrient'],
                                    'dataset_nutrient' => $_GET['dataset_nutrient'],
                                    'pubid_nutrient' => $_GET['pubid_nutrient'],
                                    'trialid_nutrient' => $_GET['trialid_nutrient'],
                                    'trtid_nutrient' => $_GET['trtid_nutrient'],
                                    'subjectid_nutrient' => $_GET['subjectid_nutrient'],
                                    )) }}">Export Filtered Nutrients CSV</a>
                            </div>
                        @endif
                        {{Form::close()}}
                    </div>

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

                    <div class="card-body">

                    </div>
                </div>

                <br>
                <br>
                <div class="card">
                    <div class="card-header">Filter Subjects
                        {!! Form::open(array('method' => 'get', 'route' => array('filters'))) !!}
                        <div class="col-md-12" id="filters">
                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('DataSet') }}
                                    <select class="form-control" name="dataset_subject">
                                        @if(isset($_GET['dataset_subject']))
                                            <option value="{{$_GET['dataset_subject']}}">{{$dataset_subject}}</option>
                                        @else
                                            <option value=" ">Select DataSet</option>
                                        @endif
                                        @foreach($datasets_subjects as $dataset_subject)
                                            <option value="{{$dataset_subject}}">{{$dataset_subject}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('PubID') }}
                                    <select class="form-control" name="pubid_subject">
                                        @if(isset($_GET['pubid_subject']))
                                            <option value="{{$_GET['pubid_subject']}}">{{$pubid_subject}}</option>
                                        @else
                                            <option value=" ">Select PubID</option>
                                        @endif
                                        @foreach($pubids_subjects as $pubid_subject)
                                            <option value="{{$pubid_subject}}">{{$pubid_subject}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrialID') }}
                                    <select class="form-control" name="trialid_subject">
                                        @if(isset($_GET['trialid_subject']))
                                            <option value="{{$_GET['trialid_subject']}}">{{$trialid_subject}}</option>
                                        @else
                                            <option value=" ">Select TrialID</option>
                                        @endif
                                        @foreach($trialids_subjects as $trialid_subject)
                                            <option value="{{$trialid_subject}}">{{$trialid_subject}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrtID') }}
                                    <select class="form-control" name="trtid_subject">
                                        @if(isset($_GET['trtid_subject']))
                                            <option value="{{$_GET['trtid_subject']}}">{{$trtid_subject}}</option>
                                        @else
                                            <option value=" ">Select TrtID</option>
                                        @endif
                                        @foreach($trtids_subjects as $trtid_subject)
                                            <option value="{{$trtid_subject}}">{{$trtid_subject}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('SubjectID') }}
                                    <select class="form-control" name="subjectid_subject">
                                        @if(isset($_GET['subjectid_subject']))
                                            <option value="{{$_GET['subjectid_subject']}}">{{$subjectid_subject}}</option>
                                        @else
                                            <option value=" ">Select SubjectID</option>
                                        @endif
                                        @foreach($subjectid_subjects as $subjectid_subject)
                                            <option value="{{$subjectid_subject}}">{{$subjectid_subject}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <button class="btn btn-default btn-primary">Filter</button>
                            </div>
                        </div>
                        @if(isset($_GET['dataset_subject']) || isset($_GET['pubid_subject']) || isset($_GET['trialid_subject']) || isset($_GET['trtid_subject']) || isset($_GET['subjectid_subject']))
                            <div class="form-group col-md-12">
                                <a class="btn btn-primary" href="{{ route('download.filteredSubjects',
                                    array(
                                    'id' => $_GET['dataset_subject'],
                                    'dataset_subject' => $_GET['dataset_subject'],
                                    'pubid_subject' => $_GET['pubid_subject'],
                                    'trialid_subject' => $_GET['trialid_subject'],
                                    'trtid_subject' => $_GET['trtid_subject'],
                                    'subjectid_subject' => $_GET['subjectid_subject'],
                                    )) }}">Export Filtered Subjects CSV</a>
                            </div>
                        @endif
                        {{Form::close()}}
                    </div>

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

                    <div class="card-body">

                    </div>
                </div>

                <br>
                <br>
                <div class="card">
                    <div class="card-header">Filter Performance Data
                        {!! Form::open(array('method' => 'get', 'route' => array('filters'))) !!}
                        <div class="col-md-12" id="filters">
                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('DataSet') }}
                                    <select class="form-control" name="dataset_performance">
                                        @if(isset($_GET['dataset_performance']))
                                            <option value="{{$_GET['dataset_performance']}}">{{$dataset_performance}}</option>
                                        @else
                                            <option value=" ">Select DataSet</option>
                                        @endif
                                        @foreach($datasets_performances as $dataset_performance)
                                            <option value="{{$dataset_performance}}">{{$dataset_performance}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('PubID') }}
                                    <select class="form-control" name="pubid_performance">
                                        @if(isset($_GET['pubids_performance']))
                                            <option value="{{$_GET['pubids_performance']}}">{{$pubids_performance}}</option>
                                        @else
                                            <option value=" ">Select PubID</option>
                                        @endif
                                        @foreach($pubids_performances as $pubids_performance)
                                            <option value="{{$pubids_performance}}">{{$pubids_performance}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrialID') }}
                                    <select class="form-control" name="trialid_performance">
                                        @if(isset($_GET['trialid_performance']))
                                            <option value="{{$_GET['trialid_performance']}}">{{$trialid_performance}}</option>
                                        @else
                                            <option value=" ">Select TrialID</option>
                                        @endif
                                        @foreach($trialids_performances as $trialid_performance)
                                            <option value="{{$trialid_performance}}">{{$trialid_performance}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('TrtID') }}
                                    <select class="form-control" name="trtid_performance">
                                        @if(isset($_GET['trtid_performance']))
                                            <option value="{{$_GET['trtid_performance']}}">{{$trtid_performance}}</option>
                                        @else
                                            <option value=" ">Select TrtID</option>
                                        @endif
                                        @foreach($trtids_performances as $trtid_performance)
                                            <option value="{{$trtid_performance}}">{{$trtid_performance}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="input-group">
                                    {{ Form::label('SubjectID') }}
                                    <select class="form-control" name="subjectid_performance">
                                        @if(isset($_GET['subjectid_performance']))
                                            <option value="{{$_GET['subjectid_performance']}}">{{$subjectid_performance}}</option>
                                        @else
                                            <option value=" ">Select SubjectID</option>
                                        @endif
                                        @foreach($subjectid_performances as $subjectid_performance)
                                            <option value="{{$subjectid_performance}}">{{$subjectid_performance}}</option>
                                        @endforeach
                                        <option value=" ">No Filter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <button class="btn btn-default btn-primary">Filter</button>
                            </div>
                        </div>
                        @if(isset($_GET['dataset_performance']) || isset($_GET['pubid_performance']) || isset($_GET['trialid_performance']) || isset($_GET['trtid_performance']) || isset($_GET['subjectid_performance']))
                            <div class="form-group col-md-12">
                                <a class="btn btn-primary" href="{{ route('download.filteredPerformances',
                                    array(
                                    'id' => $_GET['dataset_performance'],
                                    'dataset_performance' => $_GET['dataset_performance'],
                                    'pubid_performance' => $_GET['pubid_performance'],
                                    'trialid_performance' => $_GET['trialid_performance'],
                                    'trtid_performance' => $_GET['trtid_performance'],
                                    'subjectid_performance' => $_GET['subjectid_performance'],
                                    )) }}">Export Filtered Performance Data CSV</a>
                            </div>
                        @endif
                        {{Form::close()}}
                    </div>

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
                                    <th>VarName</th>
                                    <th>Varvalue</th>
                                    <th>VarUnits</th>
                                    <th>N</th>
                                    <th>SE</th>
                                    <th>SD</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('partials.performances')
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection