jQuery(document).ready(function($){

	$("div[id^=artmag_bg_fm-blogmeta-]").hide();

	var selectedbox = $('#post-formats-select input:checked').attr('value');

	$("#artmag_bg_fm-blogmeta-" + selectedbox).stop(true,true).fadeIn(500);

    $("#post-formats-select input[type=radio]").change(function()
    {
        var diValue = $(this).attr("value");
        $("div[id^=artmag_bg_fm-blogmeta-]").hide();
        $("#artmag_bg_fm-blogmeta-" + diValue).fadeIn(1000);
    });
});
