//Common javascript function
//alert('here now................');
$(function(){
    $(window).scroll(function() {
		//alert(document.getElementById("ddmenubg2").offsetWidth)
        if ($(this).scrollLeft() > 75) {
            $("#ddmenubg2:hidden").css('visibility','visible');
            //$("#ddmenubg2:hidden").fadeIn('slow');
        }
        else {
            //$("#ddmenubg2:visible").fadeOut("slow");
        }
    });
});
//
$('#dragandrophandler').click(function(e) {
    $(this).find('input[type="file"]').click();
});

$('#dragandrophandler input').click(function(e) {
    e.stopPropagation();
});
//function to create submenu
function submenu(val)
{
    $.ajax
      ({
        url: baseUrl+"users/dynamicmenu",
        type: "POST",
        data: "id="+val,
        success: function(data)
        {
          $('#c'+val).html(data);
		  		
				//reload jquery for navigation
				$( '.tree li' ).each( function() {
						if( $( this ).children( 'ul' ).length > 0 ) {
								$( this ).addClass( 'parent' );     
						}
				});
				//reload click event after ajax				
				$( '.tree li.parent > a' ).click( function( ) {
						$( this ).parent().toggleClass( 'active' );
						$( this ).parent().children( 'ul' ).slideToggle( 'fast' );
				});
        }
    });

}
//allow drop
function allowDrop(ev) {
    ev.preventDefault();
}
//allow drag
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}
//allow ajax call
function ajaxcall(fileid,folderid)
{
	$.ajax
      ({
        url: baseUrl+"users/savedynamicmenu",
        type: "POST",
        data: "fileid="+fileid+"&folderid="+folderid,
        success: function(val)
        {
			$('#msg').html(val);
        }
    });
	
}
//allow drop
function drop(ev,id) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ajaxcall(data,id);
}
//send file to server
function sendFileToServer(formData,status)
{
    var uploadURL =baseUrl+"users/upload"; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
			alert(data);
            //status.setProgress(100);
 
            //$("#status1").append("File upload Done<br>");         
        }
    }); 
 
    status.setAbort(jqXHR);
}
 
var rowCount=0;
function createStatusbar(obj)
{
     rowCount++;
     var row="odd";
     if(rowCount %2 ==0) row ="even";
     this.statusbar = $("<div class='statusbar "+row+"'></div>");
     this.filename = $("<div class='filename'></div>").appendTo(this.statusbar);
     this.size = $("<div class='filesize'></div>").appendTo(this.statusbar);
     this.progressBar = $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);
     this.abort = $("<div class='abort'>Abort</div>").appendTo(this.statusbar);
     obj.after(this.statusbar);
 
    this.setFileNameSize = function(name,size)
    {
        var sizeStr="";
        var sizeKB = size/1024;
        if(parseInt(sizeKB) > 1024)
        {
            var sizeMB = sizeKB/1024;
            sizeStr = sizeMB.toFixed(2)+" MB";
        }
        else
        {
            sizeStr = sizeKB.toFixed(2)+" KB";
        }
 
        this.filename.html(name);
        this.size.html(sizeStr);
    }
    this.setProgress = function(progress)
    {       
        var progressBarWidth =progress*this.progressBar.width()/ 100;  
        this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
        if(parseInt(progress) >= 100)
        {
            this.abort.hide();
        }
    }
    this.setAbort = function(jqxhr)
    {
        var sb = this.statusbar;
        this.abort.click(function()
        {
            jqxhr.abort();
            sb.hide();
        });
    }
}

function handleFileUpload(files,obj)
{	
	console.log('calling handle file upload inside for loop');
	var fd = new FormData();
	fd.append('file', files);
	var status = new createStatusbar(obj); //Using this we can set progress.
    status.setFileNameSize(files.name,files.size);
    sendFileToServer(fd,status);
}
function traverseFileTree(item, path) {
  path = path || "";
  if (item.isFile) {
    // Get file
    item.file(function(file) {
      console.log("File:", path + file.name);
	  var obj = $("#dragandrophandler");
	  handleFileUpload(item,obj);
    });
  } else if (item.isDirectory) {
    // Get folder contents
    var dirReader = item.createReader();
    dirReader.readEntries(function(entries) {
      for (var i=0; i<entries.length; i++) {
        traverseFileTree(entries[i], path + item.name + "/");
      }
    });
  }
}

$(document).ready(function()
{
var obj = $("#dragandrophandler");
obj.on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
});
obj.on('dragover', function (e) 
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e) 
{
 
     $(this).css('border', '2px dotted #0B85A1');
     e.preventDefault();
     //var files = e.originalEvent.dataTransfer.files;
	  var items = e.originalEvent.dataTransfer.items;
	  for (var i=0; i<items.length; i++) {
		// webkitGetAsEntry is where the magic happens
		var item = items[i].webkitGetAsEntry();
		if (item) {
		  traverseFileTree(item);
		}
	  }
     //We need to send dropped files to Server
     //handleFileUpload(files,obj);
});
$(document).on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});
$(document).on('dragover', function (e) 
{
  e.stopPropagation();
  e.preventDefault();
  obj.css('border', '2px dotted #0B85A1');
});
$(document).on('drop', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});
 
});
