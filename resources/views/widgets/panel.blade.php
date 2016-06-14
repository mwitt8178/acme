<div class="panel panel-{{{ isset($class) ? $class : 'default' }}}">
	@if( isset($header))  
		<div class="panel-heading clearfix">
		<h3 class="panel-title pull-left" style="padding-top: 7.5px;">@yield ($as . '_panel_title')
		@if( isset($controls))  
	<div class="panel-control pull-right">
		<a class="panelButton"><i class="fa fa-refresh"></i></a>
		<a class="panelButton"><i class="fa fa-minus"></i></a>
		<a class="panelButton"><i class="fa fa-remove"></i></a>
	</div>
	@endif
	</h3>

	<div class="col-sm-3 pull-right">@yield($as.'_panel_back_button')</div>

	</div>
	@endif
	
	<div class="panel-body">
		@yield ($as . '_panel_body')
	</div>
	@if( isset($footer))
		<div class="panel-footer">@yield ($as . '_panel_footer')</div>
	@endif
</div>

