<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">OSS</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/employees/welcome">Search Job</a></li>
        <li><a href="/employees/welcome">My Jobs</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	          <i class="fa fa-user"></i> Hi! <?= ucwords($current_user['username'])?> <span class="caret"></span>
	        </a>
	        <ul class="dropdown-menu" role="menu">
	          <li><?= $this->Html->link(__('<i class="fa fa-user" aria-hidden="true"></i> Ver Perfil'), ['controller' => 'Groups', 'action' => 'employeeWelcome'], ['escape' => false]) ?></li>
	          <li><?= $this->Html->link(__('<i class="fa fa-sign-out" aria-hidden="true"></i> Salir'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
	        </ul>
	      </li>
	    </ul>
    </div>
  </div>
</nav>