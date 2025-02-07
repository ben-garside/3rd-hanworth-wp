jQuery(function ($) {

	// Group Picker
	$('#group-picker .top').click(function(){
		$('#group-picker .dropdown').toggle();
	});
	$('#group-picker .dropdown li').click(function(){
		var text = $(this).text();
		$('#group-picker .top .text').text(text);
		$('‘#group-picker .dropdown').hide();
	});
	});
	jQuery(function( $ ){
 $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').colorbox({
			rel: 'cboxElement',
			width: '95%',
			height: 'auto',
			maxWidth: '80%',
			maxHeight: 'auto',
			
			title: function() {
				return $(this).find('img').attr('alt');
			}
			});
});

// Close the site notice 
function closeSiteNotice() {
  document.getElementById("SiteNotice").style.display = "none";
}

// Open the share box 
function openShare() {
  document.getElementById("ShareOverlay").style.display = "block";
document.getElementById("ShareOverlay").style.height = "";


}

// Close the share box 
function closeShare() {
  document.getElementById("ShareOverlay").style.display = "none";
document.getElementById("ShareOverlay").style.height = "0px";
}