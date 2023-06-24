<!-- Model Popups -->
<div class="modal modal-default fade" id="modal-default-deleterepresentative{{ $representative->id }}">
	<div class="modal-dialog">
		<div class="modal-content modal-content-bankaccount text-center">
			<div class="modal-header">
				<h4 class="modal-title">Representative Deletion</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
			</div>
			{!! Form::open(['route' => ['representatives.destroy', $representative->id], 'method' => 'delete']) !!}
				@csrf
				
				<div class="modal-body">
					<p>Please confirm for deleting the Representative!<br>
					<strong>{{ $representative->name }}</strong>
					 </p>
				</div>
				<div class="modal-footer">
					<button type="submit" name="accountDeletion" class="btn custom-btn-block btn-success pull-right">Confirm</button>
					<button type="button" class="btn custom-btn-block btn-primary pull-left" data-dismiss="modal">Close</button>
				</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->