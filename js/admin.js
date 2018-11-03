
var oldVal = "";
//Lifetime profile editting.
$("#aboutme").on("change keyup paste", function() {
    var currentVal = $(this).val();
    if(currentVal == oldVal) {
        return; //check to prevent multiple simultaneous triggers
    }
    
    oldVal = currentVal;
    //action to be performed on textarea changed
    $('#display_aboutme').html(oldVal);

    
});

// Profile photo uploading
$("#profileImage").click(function(e) {
        $("#imageUpload").click();
    });

    function fasterPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
            $('#profileImage').attr('src', 
                window.URL.createObjectURL(uploader.files[0]));
        }
    }

    $("#imageUpload").change(function(){
        fasterPreview( this );
});