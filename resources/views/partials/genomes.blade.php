@foreach($genomes as $genome)
    <tr>
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
        <td>{{ $genome->DaySampleofPeriod_InVivo }}</td>
        <td>{{ $genome->DaySampleofPeriod_InVitro }}</td>
        <td>{{ $genome->Time_Sample_InVivo }}</td>
        <td>{{ $genome->Time_Sample_InVitro }}</td>
        <td>{{ $genome->VarName }}</td>
        <td>{{ $genome->VarValue }}</td>
        <td>{{ $genome->VarUnits }}</td>
        <td>{{ $genome->N }}</td>
        <td>{{ $genome->SE }}</td>
        <td>{{ $genome->SD }}</td>
        <td>{{ $genome->VarType }}</td>
    </tr>
@endforeach