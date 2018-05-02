@foreach($nutrients as $nutrient)
    <tr>
        <td>{{ $nutrient->DataSet }}</td>
        <td>{{ $nutrient->PubID }}</td>
        <td>{{ $nutrient->TrialID }}</td>
        <td>{{ $nutrient->TrtID }}</td>
        <td>{{ $nutrient->SubjectID }}</td>
        <td>{{ $nutrient->VarName }}</td>
        <td>{{ $nutrient->Varvalue }}</td>
        <td>{{ $nutrient->VarUnits }}</td>
        <td>{{ $nutrient->N }}</td>
        <td>{{ $nutrient->SE }}</td>
        <td>{{ $nutrient->SD }}</td>
    </tr>
@endforeach