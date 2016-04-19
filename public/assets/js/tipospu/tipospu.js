jQuery(document).ready(function($){
	/* Στο κλικ απο το αριστερά μενού του edit φωνάζουμε το function ae_edit_page και περνάμε το event. */
	$('#step1, #step2, #step3').click(function(e){
		return ae_edit_page(this, e);
	});
	/* Στο κλικ στην αφαίρεση λογότυπου αλλάζουμε κατάσταση στο κρυφό input. */ 
	$('#remove-logo-img').click(function () {
		$('#logo-removed').val('1');
	})

	var date = ae_date();
	$('#date_section').html(date);
});

function ae_edit_page(step, e){
	var pathname = window.location.pathname;
	var step_id = jQuery(step).attr('id');
	var id = step_id.substr(-1);
	if(pathname.indexOf('/admin/edit')<0){
		jQuery('#step_selector').val(id);
		jQuery('#step_selection').submit();
		return;
	}else{
		e.preventDefault();
		var title = jQuery(step).text();
		jQuery('#step01, #step02, #step03').hide();
		jQuery('#step0'+id).show();
		// jQuery('.subtitle_step').html(id+'<span class="subtitle_step1">'+' '+title+' </span>');
		jQuery('.subtitle_step').html('<span class="subtitle_step1">'+' '+title+' </span>');
	}
}

function resizeIframe(obj) {
	obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}

function ae_date(offset){
	if (offset === undefined){
		offset = 0;
	}
	var monthNames = [ "Ιανουαρίου", "Φεβρουαρίου", "Μαρτίου", "Απριλίου", "Μαΐου", "Ιουνίου", 
	"Ιουλίου", "Αυγούστου", "Σεπτεμβρίου", "Οκτωβρίου", "Νοεμβρίου", "Δεκεμβρίου" ];
	var dayNames= ["Κυριακή","Δευτέρα","Τρίτη","Τετάρτη","Πέμπτη","Παρασκευή","Σάββατο"]

	var newDate = new Date();
	
	newDate.setDate(newDate.getDate() + offset);
	return dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear();
	
}