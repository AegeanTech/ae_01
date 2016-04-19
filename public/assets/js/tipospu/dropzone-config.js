var maxFiles = parseInt(document.getElementById("images").innerHTML);

var photo_counter = 0;
Dropzone.options.realDropzone = {

    uploadMultiple: false,
    parallelUploads: 100,
    maxFilesize: 2,
    acceptedFiles: "image/jpeg",
    // maxFiles: 9,
    maxFiles: maxFiles,
    // maxFiles: document.querySelector('images').innerHTML,
    previewsContainer: '#dropzonePreview',
    previewTemplate: document.querySelector('#preview-template').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Αφαίρεση',
    dictFileTooBig: 'Το αρχείο εικόνας είναι μεγαλύτερο απο 2MB',

    // The setting up of the dropzone
    init:function() {
        // console.log(maxFiles);
        //var mockFile = { name: "fb20151104103457savedpicture.jpg", size: 123456, type: 'image/jpeg' };
        //this.options.addedfile.call(this, mockFile);
        //this.options.thumbnail.call(this, mockFile, "/gallery/icon_size/4/fb20151104103457savedpicture.jpg");
        //mockFile.previewElement.classList.add('dz-success');
        //mockFile.previewElement.classList.add('dz-complete');

        thisDropzone = this;

        $.ajax({
            url: 'upload/show',
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
            $.each(data, function(key,value){
                console.log(value);
                if(data){
                    photo_counter = data.length;
                    $("#photoCounter").text( "(" + photo_counter + ")");
                }
                var mockFile = { name: value.name, size: value.size };
                thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                thisDropzone.options.thumbnail.call(thisDropzone, mockFile, window.location.protocol + "//" + window.location.host + "/gallery/icon_size/" + value.folder + '/' + value.name);
                thisDropzone.options.maxFiles = thisDropzone.options.maxFiles - photo_counter;
                //thisDropzone.emit("complete", mockFile);
                mockFile.previewElement.classList.add('dz-success');
                mockFile.previewElement.classList.add('dz-complete');
            });
        }});

        //var mockFile = { name: "sma-rpsma.jpg", size: 12345, type: 'image/jpeg' };
        //this.options.addedfile.call(this, mockFile);
        //this.options.thumbnail.call(this, mockFile, "http://tipospou.dev:8000/gallery/icon_size/4/sma-rpsma.jpg");
        //mockFile.previewElement.classList.add('dz-success');
        //mockFile.previewElement.classList.add('dz-complete');

        //// Call the default addedfile event handler
        //myDropzone.emit("addedfile", mockFile);
        //
        //// And optionally show the thumbnail of the file:
        //myDropzone.emit("thumbnail", mockFile, "/gallery/icon_size/4/635749111317657340.jpg");

        this.on("removedfile", function(file) {

            $.ajax({
                type: 'POST',
                url: 'upload/upload/delete',
                data: {id: file.name, sid: $("#sid").val()},
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    if(rep.code == 200)
                    {
                        photo_counter--;
                        $("#photoCounter").text( "(" + photo_counter + ")");
                    }

                }
            });

        } );
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    success: function(file,done) {
        photo_counter++;
        $("#photoCounter").text( "(" + photo_counter + ")");
    }
}



