<script>
	this.formValidationInitial=function(){
		let _this=this,
			attribute='data-validation',
		    seperator='|',
	 		message={
				required : 'This field is required',
				email : 'Invalid email format',
				confirmation : 'Confirm password did not match'

			};
		this.createNewElement=function(element,message){
			element.classList.add('validation-error')
			element.innerHTML = '<i class="fa fa-times-circle"></i>&nbsp;'+ message
			return element
		},
		this.validationCondition=function(target,validationTypeArr,value){
			let createElement=document.createElement('p')
			if(value=='' && validationTypeArr.includes('required')){
				event.preventDefault()
				target.append(_this.createNewElement(createElement,message.required))
			}
			if(validationTypeArr.includes('email') && value){
				let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if(!value.match(mailformat)){
					event.preventDefault()
					target.append(_this.createNewElement(createElement,message.email))
				}
			}
			if(validationTypeArr.includes('confirm') && value){
				let confirmInput=document.querySelector('input[name="password_confirmation"]')
				if(confirmInput){
					if(confirmInput.value){
						if(value != confirmInput.value){
							event.preventDefault()
							target.append(_this.createNewElement(createElement,message.confirmation))
						}
					}
				}
			}
		},
		this.checkValidationAttributeListener=function(target){
			target.forEach(function(element,key){
				let selector=element.querySelector('input') ?? element.querySelector('select')
				if(selector!=null && selector.hasAttribute(attribute)){
					let validation=selector.getAttribute(attribute),
						validationTypeArr=validation.split(seperator),
						value=selector.value,
						validationErrorMessage=element.querySelector('.validation-error')
						if(validationErrorMessage || value && validationErrorMessage){
							validationErrorMessage.remove()
						}
						if(validationTypeArr){
							_this.validationCondition(element,validationTypeArr,value)
						}
				}
			})
		},
		this.checkValidationListener=function(target){
			let formGroup=target.querySelectorAll('.form-group')
			target.addEventListener('submit',function(e){
				_this.checkValidationAttributeListener(formGroup)
			})
			target.addEventListener('input',function(event){
				_this.checkValidationAttributeListener(formGroup)
			})
		},
		this.init=function(){
			let form=document.querySelector('.form-data')
			if(form){
				_this.checkValidationListener(form)
			}
		}
	}
	let validationObj=new formValidationInitial()
		validationObj.init()
</script>