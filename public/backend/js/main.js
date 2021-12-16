this.initialObject=function(){
	let _this=this
	this.sideBaropenCloseListener=function(){
		let selector=$('.sidenav-bar button')
		selector.on('click',function(){
			$('#main-wrapper').toggleClass('opensidebar')
		})
	}
	this.sideBarDropdownListener=function(){
		let selector=$('.has-children .navigation-wrapper')
		selector.on('click',function(){
			let target=$(this)
			let findDropdown=target.next()
			if(findDropdown.hasClass('navigation-dropdown')){
				let dropDown=$('.navigation-dropdown')
				let chervonDown=target.find('.navigation-link .drop-down-chervon')
				if(target.hasClass('active')){
					chervonDown.removeAttr('style')
					findDropdown.slideUp()
				}else{
					chervonDown.css('transform','rotate(180deg)')
					findDropdown.slideDown()
				}
				target.toggleClass('active')
			}
		})
	},
	this.topnavDropdownListener=function(){
		let selector=$('.top-nav-link')
			selector.on('click',function(){
				let target=$(this)
				let drop=target.next()
				if(drop.hasClass('top-nav-dropdown')){
					if(target.hasClass('active')){
						drop.slideUp()
					}else{
						drop.slideDown()
					}
					target.toggleClass('active')
				}
			})
	},
	this.init=function(){
		$(document).ready(function(){
			_this.sideBaropenCloseListener()
			_this.sideBarDropdownListener()	
			_this.topnavDropdownListener()
		})
	}
}
let obj= new initialObject()
		obj.init()