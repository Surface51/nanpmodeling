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
                        <a class="btn btn-primary btn-sm" href="/administrators-dashboard/subjects/create" id="add-button">
                            Add New Subject
                        </a>

                        <div class="card">
                            <div class="card-header">Subjects</div>
                            <div role="tabpanel" class="tab-pane active" id="maincho">
                                <div class="container-fluid">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr id='table-rows' class="table-header-admin">
                                            <th>Actions</th>
                                            <th>DataSet</th>
                                            <th>PubID</th>
                                            <th>TrialID</th>
                                            <th>TrtID</th>
                                            <th>SubjectID</th>
                                            <th>VarName</th>
                                            <th>VarValue</th>
                                            <th>VarUnits</th>
                                            <th>N</th>
                                            <th>SE</th>
                                            <th>SD</th>
                                        </tr>
                                        </thead>
                                        <tbody class="admin-tables-subjects">
                                        @include('partials.adminsubjects')
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@stop
