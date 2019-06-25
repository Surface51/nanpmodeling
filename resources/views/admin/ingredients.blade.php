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
                        <a class="btn btn-primary btn-sm" href="/administrators-dashboard/dietary-ingredients/create" id="add-button">
                            Add New Dietary Ingredients
                        </a>

                        <div class="card">
                            <div class="card-header">Dietary Ingredients</div>
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
                                            <th>UID</th>
                                            <th>RepUID</th>
                                            <th>VarName</th>
                                            <th>VarValue</th>
                                            <th>VarUnits</th>
                                            <th>N</th>
                                            <th>SE</th>
                                            <th>SD</th>
                                            <th>IngrNum</th>
                                        </tr>
                                        </thead>
                                        <tbody class="admin-tables-ingredients">
                                        @include('partials.adminingredients')
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        {{ $ingredients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@stop
