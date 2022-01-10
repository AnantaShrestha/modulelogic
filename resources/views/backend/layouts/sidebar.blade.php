<div id="sidebar" class="sidebar">
		<div class="profile-wrapper">
			<div class="profile-image"><img src="/backend/images/user.png"></div>
			<div class="profile-name">
				<h1>Admin Dashboard</h1>
			</div>
		</div>
		<aside>
			<ul class='parent-navigation'>
				<li class="navigation-item">
					<div class="navigation-wrapper">
						<span class='nav-icon'><i class="fa fa-dashboard"></i></span>
						<a href="{{route('admin.dashboard')}}" class="navigation-link">Dashboard</a>
					</div>
				</li>
				<li class="navigation-item has-children">
					<div class="navigation-wrapper">
						<span class='nav-icon'><i class="fa fa-user"></i></span>
						<a href="javascript:;" class="navigation-link">User Management<i class="drop-down-chervon fa fa-chevron-down"></i></a>
					</div>
					<ul class="navigation-dropdown">
						<li class="navigation-item">
							<div class="navigation-wrapper">
								<a href="{{route('admin.permission')}}" class="navigation-link">Permission</a>
							</div>
						</li>
						<li class="navigation-item">
							<div class="navigation-wrapper">
								<a href="/admin/role" class="navigation-link">Role</a>
							</div>
						</li>
						<li class="navigation-item">
							<div class="navigation-wrapper">
								<a href="/admin/user" class="navigation-link">User</a>
							</div>
						</li>
					</ul>
				</li>
				<li class="navigation-item has-children">
					<div class="navigation-wrapper">
						<span class='nav-icon'><i class="fa fa-cogs"></i></span>
						<a href="javascript:;" class="navigation-link">Setting<i class="drop-down-chervon fa fa-chevron-down"></i></a>
					</div>
					<ul class="navigation-dropdown">
							<li class="navigation-item">
								<div class="navigation-wrapper">
									<a href="#'" class="navigation-link">Mail Setting</a>
								</div>
							</li>
							<li class="navigation-item">
								<div class="navigation-wrapper">
									<a href="{{route('admin.menu')}}" class="navigation-link">Menu Setting</a>
								</div>
							</li>
					</ul>
				</li>
			</ul>
		</aside>
	</div>