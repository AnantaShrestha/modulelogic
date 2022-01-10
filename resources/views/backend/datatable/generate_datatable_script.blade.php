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
				pagination:(wrapper.querySelectorAll('.paginate-item')  || {}),
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
		this.dataDeleteApiRequest=function(url,id,target){
			let data={
				id:id,
				_token: "{{csrf_token()}}",
			}
			let params = typeof data == 'string' ? data : Object.keys(data).map(
	            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
	        ).join('&');
			let xhr=new XMLHttpRequest()
			xhr.open('delete',url,true)
			xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhr.send(params)
			xhr.onreadystatechange = function() {
				if (xhr.status === 200 && xhr.readyState === 4) {  
					let response=JSON.parse(xhr.response)
					target.parentNode.parentNode.remove()
					swal(response.type,response.message,response.type)

				}
			};
			
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
					if(event.target.classList.contains('paginate-item') && index== 0){
						event.preventDefault()
						if(event.target.parentNode.classList.contains('active')){
							return;
						}else{
							document.querySelector('.pagination li.active').classList.remove('active')
							event.target.parentNode.classList.add('active')
							let url=event.target.getAttribute('href')
							if(url){
								page=url.split('page=')[1]
								_this.dataTableApiRequest(page,keyword)
							}
						}
					}
					
				})
			})
		},
		this.dataDeleteEventListener=function(){
			let buttons=document.querySelectorAll('.delete_button')
			Array.from(buttons).forEach(function(element,index){
				document.addEventListener('click',function(event){
					if(event.target.classList.contains('delete_button') && index==0){
						let target=event.target
						
						swal({
						  title: 'Are you sure?',
						  text: "It will permanently deleted !",
						  type: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, delete it!'
						}).then((willDelete) => {
							if(willDelete.value){
								let url=target.getAttribute('data-url')
								let id=target.getAttribute('data-id')
								_this.dataDeleteApiRequest(url,id,target)
							}
						})
					
					}
				})

			})
		},
		this.init=function(){
			_this.dataTableSearchEventListener()
			_this.dataTablePaginationEventListener()
			_this.dataDeleteEventListener()
		}
	}
	let dataTableObj=new dataTableInitial()
		dataTableObj.init()
</script>