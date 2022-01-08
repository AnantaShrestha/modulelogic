@php
$url=str_replace('index','pagination',request()->url());
@endphp
<script>
	this.dataTableInitial=function(){
		let _this=this;
		let page=1,
			keyword='';
		let wrapper=document.querySelector('.datatable_wrapper')
		if(wrapper){
			wrapper={
				wrap: wrapper,
				table:(wrapper.querySelector('.dataTable_table') || {}),
				search:(wrapper.querySelector('.search-input') || {}),
				tableBody:(wrapper.querySelector('.table-body') || {}),
				pagination:(wrapper.querySelectorAll('.paginate-item')  || {})
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
		this.dataTableSearchEventListener=function(){
			wrapper.search.addEventListener('keyup',function(event){
				keyword=this.value
				_this.dataTableApiRequest(page,keyword)
			})
		},
		this.dataTablePaginationEventListener=function(){
			Array.from(wrapper.pagination).forEach(function(element,index){
				document.addEventListener('click',function(event){
					if(event.target.classList.contains('paginate-item') && index==0){
						event.preventDefault()
						let url=event.target.getAttribute('href')
						if(url){
							page=url.split('page=')[1]
							_this.dataTableApiRequest(page,keyword)
						}
					}
					
				})
			})
		},
		this.init=function(){
			_this.dataTableSearchEventListener()
			_this.dataTablePaginationEventListener()
		}
	}
	let dataTableObj=new dataTableInitial()
		dataTableObj.init()
</script>