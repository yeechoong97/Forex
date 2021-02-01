@if(count($trades)>0)
@foreach($trades as $trade)
    <tr>
        <td class="col1">{{$trade->ticketID}}</td>
        <td class="col4">{{$trade->created_at}}</td>
        <td class="col3">{{$trade->pair}}</td>
        <td class="col2">{{$trade->units}}</td>
        <td class="col2">{{$trade->type}}</td>
        <td class="col2">{{$trade->entry_price}}</td>
        <td class="col2">{{$trade->exit_price}}</td>
        <td class="col3">{{$trade->cost}}</td>
        <td class="col3">{{$trade->profit}}</td>
    </tr>
@endforeach
@else
    <tr>
        <td class="alert-col"><b>No result was found !</b></td>
    </tr>
@endif

@if ($trades->hasPages())
    <tr>             
        <td class="pagination-links">{{ $trades->links() }}</td> 
    </tr>   
@endif

                           