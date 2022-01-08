@php
$count=0;
@endphp
<div class="datatable_wrapper">
	<div class="list-action-wrapper">
		<div class="row-wrapper">
			<div class="search-action">
				<input type="text" placeholder="Search" name="search" class="search-input">
			</div>
			<div class="other-action">
				@if($settings['buttons'])
					@foreach($settings['buttons'] as $button)
						@if(isset($button['text']) && !empty($button['text']))
							{!! @$button['text'] !!}
						@elseif($button['action'] && !empty($button['action']))
							<a class="{{@$button['className']}}" href="{{@$button['action']}}">{{@$button['title']}}</a>
						@else
							<button class="{{@$buttonClassName}}">{{@$button['title']}}</button>
						@endif
					@endforeach
				@endif
			</div>
		</div>
	</div>
	<table id="{{$tableId}}" class="dataTable_table">
		<thead>
			<tr>
				<th>S.No</th>
				@foreach($columns as $key=>$col)
					@if(!is_array($col))
						<th>{{$col}}</th>
					@else
						<th>{{$col['title']}}</th>
					@endif
				@endforeach
			</tr>	
		</thead>
		<tbody class="table-body">
			@include('backend.datatable.includes.table-body')
		</tbody>
			
	</table>
	<div class="table-pagination">
		{!! $queryData->links('backend.datatable.includes.pagination') !!}
	</div>
</div>