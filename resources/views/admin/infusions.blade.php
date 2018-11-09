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
                        <a class="btn btn-primary btn-sm" href="/administrators-dashboard/infusions/create" id="add-button">
                            Add New Infusion
                        </a>

                        <div class="card">
                            <div class="card-header">Infusions</div>
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
                                        @include('partials.admininfusions')
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        {{ $infusions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@stop
