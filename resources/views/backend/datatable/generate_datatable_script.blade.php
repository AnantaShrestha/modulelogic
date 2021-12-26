@php
$url=str_replace('index','pagination',request()->url());
@endphp
<script>
	this.dataTableInitial=function(){
		let _this=this;
		let wrapper=document.querySelector('.datatable_wrapper')
		if(wrapper){
			wrapper={
				wrap: wrapper,
				table:(wrapper.querySelector('.dataTable_table') || {}),
				search:(wrapper.querySelector('.search-input') || {}),
				tableBody:(wrapper.querySelector('.table-body') || {}),
			};
		}
		this.dataTableApiRequest=function(page,keyword){
			let xhr=new XMLHttpRequest()
			xhr.onreadystatechange = function() {
				if (xhr.status === 200 && xhr.readyState === 4) {  
					wrapper.tableBody.innerHTML=xhr.response
				}
			};
			xhr.open('GET','{{$url}}?page='+page+'&search='+keyword+'&action=true',true)
			xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
			xhr.send()
		},
		this.dataTableEventListener=function(){
			let page=1,
				keyword
			wrapper.search.addEventListener('keyup',function(event){
				keyword=this.value
				_this.dataTableApiRequest(page,keyword,obj.tableBody)
			})

		},
		this.init=function(){
			_this.dataTableEventListener()
		}
	}
	let dataTableObj=new dataTableInitial()
		dataTableObj.init()
</script>