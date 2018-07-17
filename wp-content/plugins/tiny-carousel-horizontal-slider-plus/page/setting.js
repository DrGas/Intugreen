function _tchsp_submit()
{
	if(document.tchsp_form.img_title.value == "")
	{
		alert("Enter image title.")
		document.tchsp_form.img_title.focus();
		return false;
	}
	else if(document.tchsp_form.img_imageurl.value == "")
	{
		alert("Enter picture url. url must start with either http or https.")
		document.tchsp_form.img_imageurl.focus();
		return false;
	}
	else if(document.tchsp_form.img_gal_id.value == "")
	{
		alert("Select gallery name for this picture.")
		document.tchsp_form.img_gal_id.focus();
		return false;
	}
}

function _tchsp_delete(id)
{
	if(confirm("Do you want to delete this record?"))
	{
		document.frm_tchsp_display.action="admin.php?page=tchsp-image-details&ac=del&did="+id;
		document.frm_tchsp_display.submit();
	}
}	

function _tchsp_redirect()
{
	window.location = "admin.php?page=tchsp-image-details";
}

function _tchsp_help()
{
	window.open("http://www.gopiplus.com/work/2014/06/06/tiny-carousel-horizontal-slider-plus-wordpress-plugin/");
}

function _tchsp_checkall(FormName, FieldName, CheckValue)
{
	if(!document.forms[FormName])
		return;
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		// set the check value for all check boxes
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = CheckValue;
}

function _tchsp_gal_redirect()
{
	window.location = "admin.php?page=tchsp-gallery-details";
}

function _tchsp_gal_delete(id)
{
	if(confirm("Do you want to delete this record?"))
	{
		document.frm_tchsp_display.action="admin.php?page=tchsp-gallery-details&ac=del&did="+id;
		document.frm_tchsp_display.submit();
	}
}

function _tchsp_gal_submit()
{
	if(document.tchsp_form.gal_title.value == "")
	{
		alert("Enter title for your gallery.")
		document.tchsp_form.gal_title.focus();
		return false;
	}
	else if(document.tchsp_form.gal_width.value == "")
	{
		alert("Enter your image width, You should add same width images in this gallery. (Ex: 200)")
		document.tchsp_form.gal_width.focus();
		return false;
	}
	else if(isNaN(document.tchsp_form.gal_width.value))
	{
		alert("Enter your image width, only number.")
		document.tchsp_form.gal_width.focus();
		return false;
	}
	else if(document.tchsp_form.gal_height.value == "")
	{
		alert("Enter your image height, You should add same height images in this gallery. (Ex: 150)")
		document.tchsp_form.gal_height.focus();
		return false;
	}
	else if(isNaN(document.tchsp_form.gal_height.value))
	{
		alert("Enter your image height, only number.")
		document.tchsp_form.gal_height.focus();
		return false;
	}
	else if(document.tchsp_form.gal_intervaltime.value == "")
	{
		alert("Enter auto interval time in millisecond. (Ex: 1500)")
		document.tchsp_form.gal_intervaltime.focus();
		return false;
	}
	else if(isNaN(document.tchsp_form.gal_intervaltime.value))
	{
		alert("Enter auto interval time in millisecond, only number.")
		document.tchsp_form.gal_intervaltime.focus();
		return false;
	}
	else if(document.tchsp_form.gal_animation.value == "")
	{
		alert("Enter animation duration in millisecond. (Ex: 1000)")
		document.tchsp_form.gal_animation.focus();
		return false;
	}
	else if(isNaN(document.tchsp_form.gal_animation.value))
	{
		alert("Enter animation duration in millisecond, only number.")
		document.tchsp_form.gal_animation.focus();
		return false;
	}
}