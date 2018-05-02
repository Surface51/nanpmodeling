@foreach($ingredients as $ingredient)
    <tr>
        <td>{{ $ingredient->DataSet }}</td>
        <td>{{ $ingredient->PubID }}</td>
        <td>{{ $ingredient->TrialID }}</td>
        <td>{{ $ingredient->TrtID }}</td>
        <td>{{ $ingredient->IFN }}</td>
        <td>{{ $ingredient->VarName }}</td>
        <td>{{ $ingredient->Varvalue }}</td>
        <td>{{ $ingredient->VarUnits }}</td>
        <td>{{ $ingredient->N }}</td>
        <td>{{ $ingredient->SE }}</td>
        <td>{{ $ingredient->SD }}</td>
    </tr>
@endforeach