			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document" style=" max-width: 80% !important;" >
				<div class="modal-content">
				  <div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="row">
						


						<div class="col-sm-8">
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
						  <div class="input-group-prepend">
							
							<button type="button" class="btn btn-outline-secondary" onclick="load(1)"><span class='fa fa-search'></span> Buscar</button>
						  </div>
						  
						</div>
						
						
						  
						</div>
						
						
					  </div>
					</form>
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					
				  </div>
				</div>
			  </div>
			</div>