@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('alerts'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('alerts') }}</p>
                @endif

                <h3>National Animal Nutrition Program Modeling Committee</h3>

                <h5>File Import Manager</h5>

                <p>General Instructions:</p>

                <p>Upload files to be imported into the database. CSV files only. Templates available for download below.</p>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Import File</div>
                            <form action="/import-files" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="file" id="inputFile" aria-describedby="fileHelp">
                                        <small id="fileHelp" class="form-text text-muted">Please upload your import files. File should be named
                                        appropriately in relation to the table you are importing data for.</small>
                                    </div>
                                </div>

                                <div class="form-group col-md-1">
                                    <div class="input-group">
                                        <button class="btn btn-default btn-primary btn-sm">Import File</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Template Files</div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <a href={{ asset('assets/dietary_ingredients_template.csv') }}><i class="fa fa-download" aria-hidden="true"></i>
                                            Dietary Ingredients Template</a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href={{ asset('assets/dietary_nutrients_template.csv') }}><i class="fa fa-download" aria-hidden="true"></i>
                                            Dietary Nutrient Template</a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href={{ asset('assets/in_vitro_data_template.csv') }}><i class="fa fa-download" aria-hidden="true"></i>
                                            In Vitro Data Template</a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href={{ asset('assets/infusions.csv') }}><i class="fa fa-download" aria-hidden="true"></i>
                                            Infusions Template</a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href={{ asset('assets/performance_data_template.csv') }}><i class="fa fa-download" aria-hidden="true"></i>
                                            Performance Data Template</a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href={{ asset('assets/study_descriptors_template.csv') }}><i class="fa fa-download" aria-hidden="true"></i>
                                            Study Descriptors Template</a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href={{ asset('assets/subjects_template') }}><i class="fa fa-download" aria-hidden="true"></i>
                                            Subjects Template</a>
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
