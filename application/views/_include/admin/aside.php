    <aside class="bg-dark col-md-2 sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
            	<a href="<?php echo base_url().'index.php/admin/dashboard' ?>" class="nav-link" id="nav-dashboard"> Dashboard </a>
            </li>
            <li class="nav-item" id="datamaster">
			    <div id="datamaster">
				    <a href="#" class="nav-link" data-toggle="collapse" data-target="#dmMenu" aria-expanded="true" aria-controls="collapseOne">
				        Data Master
			    	</a>
			    	<ul id="dmMenu" class="collapse" aria-labelledby="datamaster" data-parent="#datamaster">
			    		<li> <a href="<?php echo base_url().'index.php/admin/santri' ?>" id="nav-santri"> Data Santri </a> </li>
			    		<li> <a href="<?php echo base_url().'index.php/admin/ustadz' ?>" id="nav-ustadz"> Data Ustadz </a> </li>
			    		<li> <a href="<?php echo base_url().'index.php/admin/kitab' ?>" id="nav-kitab"> Data Kitab </a> </li>
			    		<li> <a href="<?php echo base_url().'index.php/admin/kelas' ?>" id="nav-kelas"> Data Kelas </a> </li>
			    		<li> <a href="<?php echo base_url().'index.php/admin/mapel' ?>" id="nav-mapel"> Data Mapel </a> </li>
			    	</ul>
				</div>
            </li>
            <li class="nav-item">
            	<a href="<?php echo base_url().'index.php/admin/jadwal' ?>" class="nav-link" id="nav-jadwal"> Jadwal </a>
            </li>
            <li class="nav-item">
            	<a href="<?php echo base_url().'index.php/admin/alumni' ?>" class="nav-link" id="nav-alumni"> Alumni </a>
            </li>
            <li class="nav-item">
            	<a href="<?php echo base_url().'index.php/about' ?>" class="nav-link" id="nav-about"> About </a>
            </li>
        </ul>
    </aside>