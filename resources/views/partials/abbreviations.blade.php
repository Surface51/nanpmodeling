@foreach($abbreviations as $abbreviation)
    <tr>
        <td>{{ $abbreviation->abbreviation }}</td>
        <td>{{ $abbreviation->name }}</td>
    </tr>
@endforeach