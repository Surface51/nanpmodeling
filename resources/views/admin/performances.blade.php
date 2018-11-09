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
                        <a class="btn btn-primary btn-sm" href="/administrators-dashboard/performance-data/create" id="add-button">
                            Add New Performance Data
                        </a>

                        <div class="card">
                            <div class="card-header">Performance Data</div>
                            <div role="tabpanel" class="tab-pane active" id="maincho">
                                <div class="container-fluid">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr id='table-rows'>
                                            <th>Actions</th>
                                            <th>DataSet</th>
                                            <th>PubID</th>
                                            <th>TrialID</th>
                                            <th>TrtID</th>
                                            <th>SubjectID</th>
                                            <th>Site Sample</th>
                                            <th>Day Sample</th>
                                            <th>Time Sample</th>
                                            <th>VarName</th>
                                            <th>VarValue</th>
                                            <th>VarUnits</th>
                                            <th>N</th>
                                            <th>SEM</th>
                                            <th>SED</th>
                                            <th>VarType</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @include('partials.adminperformances')
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{ $performances->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@stop
