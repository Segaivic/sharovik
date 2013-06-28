var config = {
// Valid file formats
    support : "image/jpg,image/png,image/bmp,image/jpeg,image/gif",
    form: "photos-form", // Form ID
    dragArea: "dragAndDropFiles", // Upload Area ID
    uploadUrl: "/gallery/admin/upload" // Server side file url
}

//Initiate file uploader.
$(document).ready(function()
{
    initMultiUploader(config);
    $("#upl").click(function(){
        $(this).hide();
        });
});