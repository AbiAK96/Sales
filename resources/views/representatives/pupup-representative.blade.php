<!-- Payment Details Model Popups -->
<div class="modal modal-default fade" id="modal-default-representative{{ $representative->id }}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><strong>View Representative Details</strong></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>

			</div>
			<div class="modal-body">
				@include('representatives.show_fields')
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->