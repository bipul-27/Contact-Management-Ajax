jQuery(document).ready(function($) {
    let table = new DataTable('#tbl-student-table');
});

jQuery(document).ready(function($) {
    $("#btn_sms_form").on("click", function(event) {
        event.preventDefault();

        var formData = $("#frm_sms_form").serialize() + "&action=sms_ajax_handler&param=save_form";

        $.ajax({
            url: sms_ajax_url,
            data: formData,
            method: "POST",
            success: function(response) {
                var data=jQuery.parseJSON(response);
                if(data.status)
                    {
                        toastr.success(data.message);
                        setTimeout(function(){
                            location.reload()
                        },2000);
                    }
                else
                {
                    toastr.error(data.message);
                    setTimeout(function(){
                        location.reload()
                    },2000);
                }
            },
            error: function(response) {
                // Handle error response
            }
        });
    });
    // if(jQuery("#tbl-student-table").length>0)
    //     {
    //         load_contact();
    //     }
    
});

// function load_contact()
// {
//     var formData= "&action=sms_ajax_handler&param=load_contact";
//     var contactHTML="";
//     jQuery.ajax({
//         url: sms_ajax_url,
//         data: formData,
//         method: "GET",
//         success: function(){
//             var data=jQuery.parseJSON(response);
//             if(data.status)
//                 {
//                    jQuery.each(data.data, function(index,contact){
//                     contactHTML+="<tr>";
//                     contactHTML+="<td>"+contact.id+"</td";
//                     contactHTML+="<td>"+contact.name+"</td";
//                     contactHTML+="<td>"+contact.email+"</td";
//                     contactHTML+="<td>"+contact.gender+"</td";
//                     contactHTML+="<td>"+contact.phone_no+"</td";
//                     contactHTML+='<a class="btn-edit">Edit</a> <a class="btn-view">View</a> <a class="btn-delete">Delete</a>';
//                     contactHTML+="</tr>";
//                    }); 
//                    jQuery("tbl-student-table").html(contactHTML);
//                 }
//         },
//         error: function()
//         {

//         }
//     });
// }

