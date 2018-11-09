@foreach($genomes as $genome)
    <tr>
        <td><a href="/administrators-dashboard/genomes/edit/{{$genome->id}}">Edit</a>
            |
            <a href="/administrators-dashboard/genomes/remove/{{$genome->id}}">Delete</a></td>
        <td>{{ $genome->DataSet }}</td>
        <td>{{ $genome->PubID }}</td>
        <td>{{ $genome->TrialID }}</td>
        <td>{{ $genome->TrtID }}</td>
        <td>{{ $genome->SubjectID }}</td>
        <td>{{ $genome->PlateID }}</td>
        <td>{{ $genome->WellID }}</td>
        <td>{{ $genome->SubTrtID }}</td>
        <td>{{ $genome->Site_sample }}</td>
        <td>{{ $genome->Cell_Type }}</td>
        <td>{{ $genome->Day_Sample }}</td>
        <td>{{ $genome->Day_Sample2 }}</td>
        <td>{{ $genome->Time_Sample }}</td>
        <td>{{ $genome->VarName }}</td>
        <td>{{ $genome->VarValue }}</td>
        <td>{{ $genome->VarUnits }}</td>
        <td>{{ $genome->N }}</td>
        <td>{{ $genome->SE }}</td>
        <td>{{ $genome->SD }}</td>
        <td>{{ $genome->VarType }}</td>

    </tr>
@endforeach