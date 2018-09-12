<style>
    .left{
	width: 50px;
	height: auto;
	background: #0C69BC;
    white-space: nowrap; 
    transition: width 0.5s ;
    position: fixed;
    z-index: 9999;
	float: left;
	margin-top:10%;
	box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}
	.left ul{
		padding: 0;
		list-style-type: none;
		text-align: left;
	}
	.left li {
		width: auto;
		height: 60px;
		line-height: 50px;  
		padding-left: 18px;
	}
	.left li:hover {
		background: #fff;
		color: #0082CE; 
	}

	.left:hover {
        width: 140px;
    }  

		.left .item-menu {
	        height:50px;
	        overflow:hidden;
	        color:#fff;
	    }  
	.left a{
		color: white;
	    text-decoration: none;
	    font-weight: bold;
	} 
	span.menu{
		padding-left: 17px;
	}
	.t_search {
	    color: black;
	    height: 35px;
	    margin-left: 15px;
	    width: 190px
	}

</style>

<div class="left ">
	<ul>
		<a href="./?view=sm-requests">
			<li class="item-menu">
				<span class="fa fa-tags"></span> 
				<span class="menu">Solicitudes</span>
			</li>
		</a>    
		<a href="./?view=sm-plants">
			<li class="item-menu">
				<span class="fa fa-building"></span> 
				<span class="menu">Planta</span>
			</li>
		</a>
		<a href="#">
			<li class="item-menu">
				<span class="fa fa-bar-chart"></span> 
				<span class="menu">Reportes</span>
			</li>
		</a> 
	</ul>
</div>