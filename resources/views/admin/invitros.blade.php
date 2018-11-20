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
                        <a class="btn btn-primary btn-sm" href="/administrators-dashboard/invitros/create" id="add-button">
                            Add New In Vitros Data
                        </a>

                        <div class="card">
                            <div class="card-header">In Vitros Data</div>
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
                                            <th>PlateID</th>
                                            <th>WellID</th>
                                            <th>SubTrtID</th>
                                            <th>Site_sample</th>
                                            <th>Cell_Type</th>
                                            <th>Day_Sample</th>
                                            <th>Day_Sample2</th>
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
                                        @include('partials.admininvitros')
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{ $invitros->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@stop