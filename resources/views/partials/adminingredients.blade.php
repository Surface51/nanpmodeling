@foreach($ingredients as $ingredient)
    <tr>
        <td><a href="/administrators-dashboard/dietary-ingredients/edit/{{$ingredient->DataSet . $ingredient->PubID . $ingredient->TrialID}}">Edit</a>
            |
            <a href="/administrators-dashboard/dietary-ingredients/remove/{{$ingredient->DataSet . $ingredient->PubID . $ingredient->TrialID}}">Delete</a></td>
        <td>{{ $ingredient->DataSet }}</td>
        <td>{{ $ingredient->PubID }}</td>
        <td>{{ $ingredient->TrialID }}</td>
        <td>{{ $ingredient->TrtID }}</td>
        <td>{{ $ingredient->IFN }}</td>
        <td>{{ $ingredient->VarName }}</td>
        <td>{{ $ingredient->VarValue }}</td>
        <td>{{ $ingredient->VarUnits }}</td>
        <td>{{ $ingredient->N }}</td>
        <td>{{ $ingredient->SE }}</td>
        <td>{{ $ingredient->SD }}</td>
    </tr>
@endforeach