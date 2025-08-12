	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-envelope'></i> Enviar cotización</h4>
		  		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="enviar_cotizacion" name="enviar_cotizacion">
			<div class="resultados_ajax text-center"></div>
			  
			  <div class="row">
				<div class="col-sm-12">
				<label for="sendto" class="control-label">Destinatario</label>
				
				  <input type="email" class="form-control" id="sendto" name="sendto" placeholder="" required>
				  <input type="hidden" class="form-control" id="quote_id" name="quote_id" placeholder="" required>
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-12">
					<label for="subject" class="control-label">Asunto</label>
				
				  <input type="text" class="form-control" id="subject" name="subject" placeholder="" required>
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-12">
					<label for="message" class="control-label">Mensaje</label>
				
					<textarea class="form-control" id="message" name="message" rows="4" required>Hola, buen día. Adjunto cotización solicitada</textarea>
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-12">
				<label class="control-label"></label>
				
				  <span><i class='fa fa-paperclip'></i> Archivo adjunto</span>
				</div>
			  </div>
		
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Enviar cotización</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>