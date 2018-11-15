@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" id="abbreviations">
                    <div class="card-header">Abbreviations List</div>

                    <div class="card-body">
                                <div class="container-fluid">
                                    <form action="/search" method="get" autocomplete="off" class="navbar-form navbar-left">
                                        <div class="form-group">
                                            <input type="text" name="search" id="search" class="form-control" placeholder="Search Abbreviations" />
                                        </div>
                                        <div class="table-responsive">
                                            <h3 align="center">Total Terms : <span id="total_records"></span></h3>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Abbreviation</th>
                                                    <th>Name</th>
                                                    <th>Table</th>
                                                </tr>
                                                </thead>
                                                <tbody class="abbreviations">

                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <div class="card">
                    <div class="card-header">Filter Data</div>
                    <div class="card-body">
                        {!! Form::open(array('method' => 'get', 'route' => array('filterVariables.all'), 'class' => 'form-wrapper')) !!}

                        <div class="col-lg-6">
                        <div class="quick-search col-md-12" id="filters">
                                <div class="form-group col-md-6">
                                    <div class="w3-container">
                                    <p class="w3-tooltip">DataSet <span class="w3-text">(<em>Filter Results by DataSet</em>)</span></p>
                                    </div>
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

                                <div class="form-group col-md-6">
                                    <div class="w3-container">
                                        <p class="w3-tooltip">References <span class="w3-text">(<em>Filter Results by Reference</em>)</span></p>
                                    </div>
                                    <div class="input-group">
                                        <select class="form-control" name="pubid_all">
                                            @if(isset($_GET['pubid_all']))
                                                <option value="{{$_GET['pubid_all']}}">{{$pubid_all}}</option>
                                            @else
                                                <option value=" ">Select References</option>
                                            @endif
                                            @foreach($pubids_all as $key => $value)
                                                <option value="{{$value}}">{{$key}}</option>
                                            @endforeach
                                            <option value=" ">No Filter</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                                <div class="form-group col-md-12" id="filters">
                                    <div class="form-group col-md-6">
                                        <br>
                                        <div class="input-group">
                                            {{ Form::text('start_date', null,
                                            ['class' => 'form-control', 'rel'=> 'tooltip', 'title' => 'Filter by Year', 'placeholder' => 'Year Start']) }}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <br>
                                        <div class="input-group">
                                            {{ Form::text('end_date', null,
                                            ['class' => 'form-control', 'rel'=> 'tooltip', 'title' => 'Range End', 'placeholder' => 'Year End']) }}
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="col-md-12" id="input-selection-group">
                                    <div class="form-group col-md-4" id="input-query-selection">
                                        {{ Form::label('Select Variable') }}
                                        <div class="input-group">
                                            @if(isset($_GET['variable_name']))
                                                <input value="{{$_GET['variable_name']}}" type="search" name="variable_name" class="form-control" id="variable_name" autocomplete="off">
                                            @else
                                                <input type="search" name="variable_name" class="form-control" id="variable_name" placeholder="Search" autocomplete="off">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2" id="input-query-selection">
                                        {{ Form::label('Operation') }}
                                        <div class="input-group">
                                            <select class="form-control" name="operator">
                                                @if(isset($_GET['operator']))
                                                    <option value="{{$_GET['operator']}}">{{$operator}}</option>
                                                @else
                                                    <option value=" ">No Filter</option>
                                                @endif
                                                <option value=" ">No Filter</option>
                                                <option value="<"><</option>
                                                <option value=">">></option>
                                                <option value='>='>>=</option>
                                                <option value='<='><=</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2" id="input-query-selection">
                                        {{ Form::label('Value') }}
                                        <div class="input-group">
                                            {{ Form::text('compare_value', null,
                                            ['class' => 'form-control', 'rel'=> 'tooltip', 'title' => 'Input Value', 'placeholder' => 'value']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="add-query-1">
                                <div class="col-md-12" id="input-selection-group">
                                    <div class="form-group col-md-4" id="input-query-selection">
                                        <div class="input-group">
                                            {{--<select class="form-control" name="variable_name_2">--}}
                                                {{--@if(isset($_GET['variable_name_2']))--}}
                                                    {{--<option value="{{$_GET['variable_name_2']}}">{{$variable_name_2}}</option>--}}
                                                {{--@else--}}
                                                    {{--<option value=" ">Select Variable Name</option>--}}
                                                {{--@endif--}}
                                                {{--@foreach($variable_names as $variable_name)--}}
                                                    {{--<option value="{{$variable_name}}">{{$variable_name}}</option>--}}
                                                {{--@endforeach--}}
                                                {{--<option value=" ">No Filter</option>--}}
                                                    @if(isset($_GET['variable_name_2']))
                                                        <input value="{{$_GET['variable_name_2']}}" type="search" name="variable_name_2" class="form-control" id="variable_name_2" autocomplete="off">
                                                    @else
                                                        <input type="search" name="variable_name_2" class="form-control" id="variable_name_2" placeholder="Search" autocomplete="off">
                                                    @endif
                                            {{--</select>--}}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2" id="input-query-selection">
                                        <div class="input-group">
                                            <select class="form-control" name="operator_2">
                                                @if(isset($_GET['operator_2']))
                                                    <option value="{{$_GET['operator_2']}}">{{$operator_2}}</option>
                                                @else
                                                    <option value=" ">No Filter</option>
                                                @endif
                                                <option value=" ">No Filter</option>
                                                <option value="<"><</option>
                                                <option value=">">></option>
                                                <option value='>='>>=</option>
                                                <option value='<='><=</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2" id="input-query-selection">
                                        <div class="input-group">
                                            {{ Form::text('compare_value_2', null,
                                            ['class' => 'form-control', 'rel'=> 'tooltip', 'title' => 'Input Value', 'placeholder' => 'value']) }}
                                        </div>
                                    </div>
                                </div>

                                    <div class="add-query-2">
                                        <div class="col-md-12" id="input-selection-group">
                                            <div class="form-group col-md-4" id="input-query-selection">
                                                <div class="input-group">
                                                    @if(isset($_GET['variable_name_3']))
                                                        <input value="{{$_GET['variable_name_3']}}" type="search" name="variable_name_3" class="form-control" id="variable_name_3" autocomplete="off">
                                                    @else
                                                        <input type="search" name="variable_name_3" class="form-control" id="variable_name_3" placeholder="Search" autocomplete="off">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2" id="input-query-selection">
                                                <div class="input-group">
                                                    <select class="form-control" name="operator_3">
                                                        @if(isset($_GET['operator_3']))
                                                            <option value="{{$_GET['operator_3']}}">{{$operator_3}}</option>
                                                        @else
                                                            <option value=" ">No Filter</option>
                                                        @endif
                                                        <option value=" ">No Filter</option>
                                                        <option value="<"><</option>
                                                        <option value=">">></option>
                                                        <option value='>='>>=</option>
                                                        <option value='<='><=</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2" id="input-query-selection">
                                                <div class="input-group">
                                                    {{ Form::text('compare_value_3', null,
                                                    ['class' => 'form-control', 'rel'=> 'tooltip', 'title' => 'Input Value', 'placeholder' => 'value']) }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">

                                        </div>
                                    </div>


                                    <div class="form-group col-md-10" id="filters">
                                        <div class="form-group col-md-6">
                                            <div class="input-group">
                                                <button class="btn btn-default btn-primary filter-button">Filter</button>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div class="input-group">
                                                <a href="/search" class="btn btn-default btn-primary clear-filter-button">Clear All Filters</a>
                                            </div>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header export-tables-title">Export Individual Tables</div>

                    <div class="card-body">
                        <a href="/all-study-descriptors-csv" class="btn btn-primary" id="download-button">Study Descriptors CSV</a>
                        <a href="/all-dietary-ingredients-csv" class="btn btn-primary" id="download-button">Dietary Ingredients CSV</a>
                        <a href="/all-dietary-nutrients-csv" class="btn btn-primary" id="download-button">Dietary Nutrients CSV</a>
                        <a href="/all-subjects-csv" class="btn btn-primary" id="download-button">Subjects CSV</a>
                        <a href="/all-performance-data-csv" class="btn btn-primary" id="download-button">Performance Data CSV</a>
                        <a href="/all-infusions-data-csv" class="btn btn-primary" id="download-button">Infusions Data CSV</a>
                        <a href="/all-in-vitro-data-csv" class="btn btn-primary" id="download-button">In Vitro Data CSV</a>
                        <a href="/all-genome-transcripts-csv" class="btn btn-primary" id="download-button">Gen_Prot_Transcr CSV</a>
                    </div>

                </div>
                <br>
                <div class="card">
                    <div class="card-header">Export Database</div>

                    <div class="button-container col-md-8">
                        <div class="card-body col-md-4">
                            <a id="db-button" href="/download-database" class="btn btn-success expo-database-button">Export All Database Tables as SQL file</a>
                        </div>

                        <div class="card-body col-md-4">
                            <a id="csv-button" href="/download-zip-csv" class="btn btn-success expo-database-button">Export All CSV's as ZIP file</a>
                        </div>
                    </div>

                </div>
                <br>
                </div>
            </div>
        </div>

<div class="container-fluid">
                <br>
                @if(count($stdys))
                <div class="card">
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredStudies',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Study Descriptors CSV
                            </a>
                        </div>
                    @endif

                    <div role="tabpanel" class="tab-pane active" id="studies-table">
                        <div class="card-header">
                            Study Descriptors Table
                        </div>
                        <div class="card-body">
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
                </div>
                @endif
                <br>
                @if(count($ingredients))
                <div class="card">
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredIngredients',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Dietary Ingredients CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="ingredients-table">
                        <div class="card-header">Dietary Ingredients Table</div>
                        <div class="card-body">
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
                </div>
                @endif
                <br>
                @if(count($nutrients))
                <div class="card">
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredNutrients',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Dietary Nutrients CSV</a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active"  id="nutrients-table">
                        <div class="card-header">Dietary Nutrients Table</div>
                        <div class="card-body">
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
                </div>
                @endif
                <br>
                @if(count($subjects))
                <div class="card">
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredSubjects',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Subjects CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="subjects-table">
                        <div class="card-header">Subjects Table</div>
                        <div class="card-body">
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
                </div>
                @endif
                <br>
                @if(count($performances))
                <div class="card">
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredPerformances',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Performance Data CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="performances-table">
                        <div class="card-header">Performance Data Table</div>
                        <div class="card-body">
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
                </div>
                @endif
                <br>
                @if(count($infusions))
                <div class="card" >
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredInfusions',
                                            array(
                                            'id' => $_GET['dataset_all'],
                                            'dataset' => $_GET['dataset_all'],
                                            'pubid' => $_GET['pubid_all'],
                                            )) }}">Export Filtered Infusion Data CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="infusions-table">
                        <div class="card-header">Infusion Data Table</div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr id='table-rows'>
                                        <th>DataSet</th>
                                        <th>PubID</th>
                                        <th>TrialID</th>
                                        <th>TrtID</th>
                                        <th>SubjectID</th>
                                        <th>InfusionLocation</th>
                                        <th>VarName</th>
                                        <th>VarValue</th>
                                        <th>VarUnits</th>
                                        <th>DayofPeriodStart</th>
                                        <th>DayofPeriodStop</th>
                                        <th>TimeofDayStart</th>
                                        <th>TimeofDayStop</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @include('partials.infusions')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <br>
                @if(count($invitros))
                <div class="card">
                    @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredInVitroDatas',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered In Vitro Data CSV
                            </a>
                        </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="invitros-table">
                        <div class="card-header">In Vitro Data Table</div>
                        <div class="card-body">
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
                                        <th>Day_Sample_InVivo</th>
                                        <th>Day_Sample_InVitro</th>
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
                </div>
                @endif
        <br>
        @if(count($genomes))
        <div class="card" >
            @if(isset($_GET['dataset_all']) || isset($_GET['pubid_all']))
                <div class="form-group col-md-12">
                    <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredGenomes',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Genome Transcript Data CSV
                    </a>
                </div>
            @endif
            <div role="tabpanel" class="tab-pane active" id="genomes-table">
                <div class="card-header">Genome Transcripts Table</div>
                <div class="card-body">
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
                                <th>Day_Sample_InVivo</th>
                                <th>Day_Sample_InVitro</th>
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
                            @include('partials.genomes')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
</div>
@endsection

@section('scripts')
    <script>

        $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('live_search.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('.abbreviations').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });

    $(document).ready(function($) {
        // Set the Options for "Bloodhound" suggestion engine
        var engine = new Bloodhound({
            remote: {
                url: '/find?variable_name=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('variable_name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        $('#variable_name').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'abbreviations',
            source: engine,
            display: function(data) {
                return data.abbreviation  //Input value to be set when you select a suggestion.
            },
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function(data) {
                    return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.abbreviation + '</div></div>'
                }
            }
        });
    });

        $(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/find2?variable_name_2=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('variable_name_2'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $('#variable_name_2').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'abbreviations',
                source: engine,
                display: function(data) {
                    return data.abbreviation  //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                        return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.abbreviation + '</div></div>'
                    }
                }
            });
        });

        $(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/find3?variable_name_3=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('variable_name_3'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $('#variable_name_3').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'abbreviations',
                source: engine,
                display: function(data) {
                    return data.abbreviation  //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                        return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.abbreviation + '</div></div>'
                    }
                }
            });
        });

    </script>
@stop