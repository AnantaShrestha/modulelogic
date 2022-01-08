@php
if(!isset($_GET['page']) || $_GET['page']  <=1)
	$count=0;
else
	$count=\Session::get('rowNum')
@endphp
@if($queryData->count() > 0)
	@foreach($queryData as $key=>$data)
		@php
			$count++;
			\Session::put('rowNum',$count);
			$rowNum=\Session::get('rowNum');
		@endphp
	<tr>
		<td>{!! $rowNum !!}</td>
		@foreach($columns as $key=>$col)
			@if(!is_array($col))
			<td>{!!@$data[$key]!!}</td>
			@elseif(is_array($col) && $col['editable']==true)
			<td>{!! $self->editable($key,$data) !!}</td>
			@endif
		@endforeach
	</tr>
	@endforeach
@else
	<tr>
		<td colspan="12" style="font-size:18px;text-align:center;color:red">No result found</td>
	</tr>
@endif