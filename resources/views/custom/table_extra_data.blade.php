<?php 
	$columns = array_merge([
		[
			'class' => 'details-control',
            'orderable' => false,
            'data' => null,
            'defaultContent' => '',
            'title' => ''
		]
	], $columns);
?>
<table id="{{ $table_id }}" class="table table-striped table-bordered" width="100%">
    <thead>
		<tr>
        	@foreach ($columns as $column)
        		<th>{{ $column['title'] }}</th>
        	@endforeach
        </tr>
    </thead>
    <tbody></tbody>
</table>


@push('script')
<script type="text/javascript">

var t_{{ $table_id }};

$(document).ready(function() {

	var responsiveHelper_datatable_fixed_column = undefined;
	
	var breakpointDefinition = {
		tablet : 1024,
		phone : 480
	};
	t_{{ $table_id }} = $('#{{ $table_id }}').DataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
				"<'autooverflow't>"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
		"oLanguage": {
			"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
		},
		"preDrawCallback" : function() {
			// Initialize the responsive datatables helper once.
			if (!responsiveHelper_datatable_fixed_column) {
				responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#{{ $table_id }}'), breakpointDefinition);
			}
		},
		"rowCallback" : function(nRow) {
			responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
		},
		"drawCallback" : function(oSettings) {
			responsiveHelper_datatable_fixed_column.respond();
		},
		serverSide: true,
	    ajax: {
	        url: '{{ $url }}',
	        type: '{{ $method or "GET"}}'
	    },
	    stateSave: true,
        columns: <?php echo json_encode($columns); ?>,
        pageLength: {{ $pageLength or 50 }}
    });
    	   
    function format (d) {
        return d.extra_view;
    }

    $('#{{ $table_id }} tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = t_{{ $table_id }}.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });
});
</script>

@endpush