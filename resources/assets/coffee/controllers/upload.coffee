  uploader = new (plupload.Uploader)(
    runtimes: 'html5,flash,silverlight,html4'
    browse_button: 'pickfiles'
    container: document.getElementById('container')
    url: '../plupload/upload.php '
    flash_swf_url: '../plupload/Moxie.swf '
    silverlight_xap_url: '../plupload/Moxie.xap '
    init:
      PostInit: ->
        document.getElementById('filelist').innerHTML = ''
        # document.getElementById('uploadfiles').onclick = function() {
        #     uploader.start();
        #     return false;
        # };
        return
      FilesAdded: (up, files) ->
        plupload.each files, (file) ->
          $('#filelist').after '<div id="fileadded" class="' + file.id + '"><div id="' + file.id + '"> <span class="glyphicon glyphicon-file"> </span>' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b><a href="#" id="' + file.id + '" class="removeFile"><span class="glyphicon glyphicon-remove-circle"></span></a></div></div>'
          $('a#' + file.id).on 'click', ->
            uploader.removeFile file
            $('.' + file.id).hide()
            return
          return
        uploader.start()
        return
      UploadProgress: (up, file) ->
        $scope.people_array.photo = file.name
        document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + '%</span>'
        return
      UploadComplete: ->
        #
        return
      Error: (up, err) ->
        document.getElementById('console').innerHTML += '\nError #' + err.code + ': ' + err.message
        return
    multipart: true
    multipart_params: {})
  uploader.init()
  $('#addNewAppModal').on 'shown.bs.modal', ->
    uploader.refresh()
    return