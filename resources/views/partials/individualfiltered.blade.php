<div class="card">
    <div class="card-header export-tables-title">Export Filtered Tables</div>

    <div class="card-body">
        <a href="/all-acknowledgments-csv" class="btn btn-primary filter-download-button">Acknowledgements CSV</a>
        <a href="/all-labels-csv" class="btn btn-primary filter-download-button">Labels CSV</a>
        <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredStudies',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Study Descriptors CSV
        </a>
        <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredIngredients',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Dietary Ingredients CSV
        </a>
        <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredNutrients',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                )) }}">Export Filtered Dietary Nutrients CSV
        </a>
        <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredSubjects',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                'variable_name' => $_GET['variable_name'],
                                'operator' => $_GET['operator'],
                                'compare_value'=> $_GET['compare_value'],
                                'variable_name_2' => $_GET['variable_name_2'],
                                'operator_2' => $_GET['operator_2'],
                                'compare_value_2'=> $_GET['compare_value_2'],
                                'variable_name_3' => $_GET['variable_name_3'],
                                'operator_3' => $_GET['operator_3'],
                                'compare_value_3'=> $_GET['compare_value_3'],
                                )) }}">Export Filtered Subjects CSV
        </a>
        <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredPerformances',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                'variable_name' => $_GET['variable_name'],
                                'operator' => $_GET['operator'],
                                'compare_value'=> $_GET['compare_value'],
                                'variable_name_2' => $_GET['variable_name_2'],
                                'operator_2' => $_GET['operator_2'],
                                'compare_value_2'=> $_GET['compare_value_2'],
                                'variable_name_3' => $_GET['variable_name_3'],
                                'operator_3' => $_GET['operator_3'],
                                'compare_value_3'=> $_GET['compare_value_3'],
                                )) }}">Export Filtered Performance Data CSV
        </a>
        <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredInfusions',
                                            array(
                                            'id' => $_GET['dataset_all'],
                                            'dataset' => $_GET['dataset_all'],
                                            'pubid' => $_GET['pubid_all'],
                                            'variable_name' => $_GET['variable_name'],
                                            'operator' => $_GET['operator'],
                                            'compare_value'=> $_GET['compare_value'],
                                            'variable_name_2' => $_GET['variable_name_2'],
                                            'operator_2' => $_GET['operator_2'],
                                            'compare_value_2'=> $_GET['compare_value_2'],
                                            'variable_name_3' => $_GET['variable_name_3'],
                                            'operator_3' => $_GET['operator_3'],
                                            'compare_value_3'=> $_GET['compare_value_3'],
                                            )) }}">Export Filtered Infusion Data CSV
        </a>
        <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredInVitroDatas',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                'variable_name' => $_GET['variable_name'],
                                'operator' => $_GET['operator'],
                                'compare_value'=> $_GET['compare_value'],
                                'variable_name_2' => $_GET['variable_name_2'],
                                'operator_2' => $_GET['operator_2'],
                                'compare_value_2'=> $_GET['compare_value_2'],
                                'variable_name_3' => $_GET['variable_name_3'],
                                'operator_3' => $_GET['operator_3'],
                                'compare_value_3'=> $_GET['compare_value_3'],
                                )) }}">Export Filtered In Vitro Data CSV
        </a>
        <a class="btn btn-primary filter-download-button" href="{{ route('download.filteredGenomes',
                                array(
                                'id' => $_GET['dataset_all'],
                                'dataset' => $_GET['dataset_all'],
                                'pubid' => $_GET['pubid_all'],
                                'variable_name' => $_GET['variable_name'],
                                'operator' => $_GET['operator'],
                                'compare_value'=> $_GET['compare_value'],
                                'variable_name_2' => $_GET['variable_name_2'],
                                'operator_2' => $_GET['operator_2'],
                                'compare_value_2'=> $_GET['compare_value_2'],
                                'variable_name_3' => $_GET['variable_name_3'],
                                'operator_3' => $_GET['operator_3'],
                                'compare_value_3'=> $_GET['compare_value_3'],
                                )) }}">Export Filtered Genome Transcript Data CSV
        </a>
    </div>

</div>