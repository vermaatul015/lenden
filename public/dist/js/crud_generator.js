var field_part = "";
var ajax_response = false;
$(".add_field_details").click(function(){
    if(ajax_response){
        return false;
    }
    ajax_response = true;
    field_part = this.id;
    var nos = $("#"+field_part+"_no").val();
    nos = parseInt(nos) + 1;
    
    $.get(base_url_admin+field_part+"/add?nos="+nos, function(data){
        $('#'+field_part+'_div').append($(data).hide()
        .delay(250)
        .fadeIn({
            duration: 500,
          start: scrollDown('#'+field_part+'_div')
        }));
        ajax_response = false;
        $("#"+field_part+"_no").val(nos);
        if(nos <= 3){
            let height = $('#'+field_part+'_div').height();
            $('#'+field_part+'_div').css("height", (height + 110))
        }
    });
});

$(document).on("click",".add_option_details",function() {
    if(ajax_response){
        return false;
    }
    ajax_response = true;
    var option_part = $(this).attr('part');
    var field_nos = $(this).attr('field');
    var nos = $("#"+option_part+"_no_"+field_nos).val();
    nos = parseInt(nos) + 1;
    $.get(base_url_admin+option_part+"/add?nos="+nos+"&field_no="+field_nos, function(data){
        $('#'+option_part+'_div_'+field_nos).append($(data).hide()
        .delay(250)
        .fadeIn({
            duration: 500,
          start: scrollDown('#'+option_part+'_scroll_'+field_nos)
        }));
        $("#"+option_part+"_no_"+field_nos).val(nos);
        ajax_response = false;
        if(nos <= 3){
            let height = $('#'+option_part+'_scroll_'+field_nos).height();
            $('#'+option_part+'_scroll_'+field_nos).css({"height": (height + 80)})
        }else{
            $('#'+option_part+'_scroll_'+field_nos).css({"overflow-y": "scroll"})
        }
    });
});


function scrollDown(ele) {
    $(ele).animate({scrollTop: $(ele).prop("scrollHeight")}, 500);
}

$(document).on("change",".field_type",function() {
    var field = $(this).attr('field');
    var val = $(this).val();
    if(val == "select" || val == "radio" || val == "checkbox"){
        $("#add_option_"+field).show();
    }else{
        $("#add_option_"+field).hide();
    }
});

$("#field_form_submit").click(function(e){
    e.preventDefault();
    var table_name = $("#table_name").val();
    if(!table_name){
        toastr.error('Table Name is required')
        return false;
    }
    var field_no = $("#field_no").val();
    for(var i=0; i<=field_no; i++){
        var field_checked = $("#field_save_"+i).prop("checked");
        if(field_checked){
            var field_name = $("#field_name_"+i).val();
            var field_type = $("#field_type_"+i).val();
            var showValidation = '';
            if(!field_name){
                showValidation += 'Field Name '+(i + 1)+' is required<br/>';
            }
            if(!field_type){
                showValidation += 'Field Type '+(i + 1)+' is required<br/>';
            }
            if(field_type == 'select' || field_type == 'radio' || field_type == 'checkbox'){
                var option_no = $("#option_no_"+i).val();
                for(var j=0; j<=option_no; j++){
                    var option_checked = $("#option_save_"+i+"_"+j).prop("checked");
                    if(option_checked){
                        var option_name = $("#option_name_"+i+"_"+j).val();
                        var option_value = $("#option_value_"+i+"_"+j).val();
                        if(!option_name){
                            showValidation += 'Option '+(i + 1)+', Name '+(j + 1)+' is required<br/>';
                        }
                        if(!option_value){
                            showValidation += 'Option '+(i + 1)+', Value '+(j + 1)+' is required<br/>';
                        }
                    }
                }
            }
            if(showValidation){
                toastr.error(showValidation)
                return false;
            }
        }
    }
    $("#field_form").submit();
})


function copyURLToClipboard(element) {
    var copyText = document.getElementById("copy_command");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    toastr.success('Copied to clipboard!')
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })