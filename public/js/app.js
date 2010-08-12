(function() {
    
    App = {
        URL: '',
        
        AddVideoLinker: function() {
            
            $('#edit-form').delegate('.add-video', 'click', function() {
                
                var self = $(this),
                    video = $('<div></div>', {'class': 'video'}),
                    embed = $('<div></div>', {'class': 'video-embed'}),
                    input = $('<input></input>', {'type': 'text', 'size': '40', 'name': 'videos[]'}),//.css({'margin-top': '10px'}),
                    del = $('<a></a>', 
                                {
                                    'href': 'javascript:void(0);', 
                                    'class': 'delete-icon delete-video'
                                }
                            ).css({'margin-left':'3px'}),
                    view = $('<a></a>', 
                                {
                                    'href': 'javascript:void(0);', 
                                    'class': 'view-icon view-video'
                                }
                            ).css({'margin-left':'3px'}),
                    add = $('<a></a>', 
                                {
                                    'href': 'javascript:void(0);', 
                                    'class': 'add-icon add-video'
                                }
                            ).css({'margin-left':'3px'});                                                        
                
                self.parents('.videos-wrapper:first')
                    .prepend(
                        video.append(input)
                             .append(view)
                             .append(add)
                             .append(del)
                             .append(embed)
                         );
                return false;    
            });            
        },
        
        RemoveVideo: function() {
            
            $('#edit-form').delegate('.delete-video', 'click', function() {
                
                var self = $(this),
                    video = self.parents('.video:first'),
                    embed = video.find('.video-embed:first');
                
                if ($('.delete-video').length !== 1) {
                    
                    
                    if (jQuery.trim(embed.html()) !== '') {
                        
                        video.remove();    
                    } else {
                        embed.html('<em>nincs mit törölni</em>');
                    }
                    
                } else {
                    embed.empty();
                    video.find('input').val('');
                }

                return false;    
            });            
        },
        
        DeleteVideo: function(params) {
            
            $('#edit-form').delegate('.delete-existing-video', 'click', function() {
                
                var self = $(this),
                    id =  self.attr('id');

                $.ajax({
                    url: App.URL + params.url,
                    type: "POST",
                    dataType: "text",
                    data: {
                        'id': id
                    },
                    
                    complete: function() {
                    //called when complete
                    },
                    
                    success: function(response) {
                        response = jQuery.trim(response);
                        
                        if (response == 'ok') {
                            
                            self.parents('.video:first').remove();
                            
                            $('.tipsy').hide();
                        }
                    },
                    
                    error: function() {
                    //called when there is an error
                    }
                });
                
            });  
        },
        
        EmbedVideo: function() {
            
            $('#edit-form').delegate('.view-video', 'click', function() {
                var self = $(this),
                    input = self.prevAll('input:first'),
                    link = input.val(),
                    parts = link.split('v=') || '',
                    hash = parts[1] ? parts[1].split('&')[0] : parts[0],
                    video = !(/youtube/.test(hash)) ? 'http://www.youtube.com/v/'+hash : hash,
                    youtube = '<object width="540" height="255"> \
                                <param name="movie" value="'+video+'&amp;hl=hu_HU&amp;fs=1"></param>\
                                <param name="allowFullScreen" value="true"></param> \
                                <param name="allowscriptaccess" value="always"></param> \
                                <embed src="'+video+'&amp;hl=hu_HU&amp;fs=1" \
                                       type="application/x-shockwave-flash" \
                                       allowscriptaccess="always" \
                                       allowfullscreen="true" \
                                       width="440" \
                                       height="255"> \
                               </embed> \
                           </object>',
                    embed = self.parents('.video:first').find('.video-embed');
                
                if (hash.length) {
                    embed.html(youtube);
                    input.val(video);    
                } else {
                    embed.html('<em>nincs video megadva</a>');
                }
                
                return false;    
            });        
        },
        
        DeleteImage: function(params) {

            
            $('#edit-form').delegate('.delete-img', 'click', function() {
                
                var self = $(this),
                    img = self.parents('.img-wrapper:first').find('img:first'),
                    id =  img.attr('id'),
                    imageType = '';
                
                params.data = params.data || {};
                params.data.id = id;
                
                
                if (img.is('.screenshot')) {
                   
                    params.data.imageType = 'screenshot';
                } 

                if (img.is('.logo')) {
                    params.data.imageType = 'logo';
                }
                                
                //console.log(params);
                $.ajax({
                    url: App.URL + params.url,
                    type: "POST",
                    dataType: "text",
                    data: params.data,
                    
                    complete: function() {
                    //called when complete
                    },
                    
                    success: function(response) {
                        response = jQuery.trim(response);
                        
                        if (response == 'ok') {
                            
                            self.parents('.img-wrapper:first').remove();
                            
                            $('.tipsy').hide();
                        }
                    },
                    
                    error: function() {
                    //called when there is an error
                    }
                });
                
            });             
        },
            
        UploadFiles: function(element, params) {
			
			var url = App.URL;
			
			var folder = params.folder;
			$(element).fileUpload ({
				'uploader'  : App.URL+'img/uploader.swf',
				'script'	: params.script,
				'cancelImg' : App.URL+'img/cancel.png',
				'folder'    : params.folder,
				'multi'     : params.multi,
				'buttonText': 'Csatol',
				onComplete: function(event, queueId, fileObj, response, data) {
				    
				    var form = $('#edit-form'),
				        input = $('<input></input>', {'type': 'hidden', 'name': params.filenames, 'value': response}),
				        uploaded = $(element).parents("p:first").nextAll('.uploaded-files:first'),
				        imgWrapperTmpl = $('<div></div>', {'class': 'img-wrapper'}),
				        img = $('<img></img>', {'src':'http://localhost'+params.folder + 'thumbs/' + jQuery.trim(response)}),
				        imgWrapper = uploaded.find('.img-wrapper'),
				        deleteImgLink = $('<a></a>', {'href': 'javascript:void(0)', 'class': 'delete-img'});
				    
				    if (!params.multi) {
				        
    				    $(element).parents('p:first').find('.file-upload').hide();
				    }    
				        
				    form.append(input);
				    
				    imgWrapperTmpl.append(img); //.append(deleteImgLink);
				    
				    uploaded.append(imgWrapperTmpl);

				    return true;
				}
			});				
        },
        
		Editable: function(params) {
			
			if ($('.editable').length) {
				
			    $('.editable').addClass('edit-icon');
			    
				$('.editable').editable({
			        container: '.editable-container',
			        element: '.editable',
			        size: params.size,
			        saveTo: params.saveTo
			    });	

			}
		},        
        
        Validate: function() {
            
            var forms = $('#edit-form, #login-form');
            
            $.each(forms, function(idx, element) {
                
                var form = $(element);
                
                form.bind('submit', function() {
                    var wasError = false;
                    var requiredFields = form.find('.required');
                    
                    $.each(requiredFields, function(idx, element) {
                        
                        var el = $(element);  
                        var errorMsg = el.nextAll('.error-msg');
                        
                        if(jQuery.trim(el.val()) === '')  {
                            
                            if(!el.hasClass('error')) {
                                el.addClass('error');
                            }
                            
                            if(jQuery.trim(errorMsg.text()) === '' || jQuery.trim(errorMsg.text()) === 'Not a number') {
                                
                                errorMsg.html(errorMsg.text() + ' Required ');
                            }
                            
                            wasError = true;
                        }
                        else {
                            
                            if(el.hasClass('error')) {
                                el.removeClass('error');
                                errorMsg.html('');
                            }
                        }
                    });
                    
                    var numericFields = form.find('.numeric');
                    
                    $.each(numericFields, function(idx, element) {
                        
                        var el = $(element)    ;
                        var errorMsg = el.next('.error-msg');
                        
                        if(!(/^\d*(\.|,){0,1}\d+$/).test(jQuery.trim(el.val()))) {
                            
                            if(!el.hasClass('error')) {
                                el.addClass('error');
                            }
                                                    
                            if(jQuery.trim(errorMsg.text()) === '' || jQuery.trim(errorMsg.text()) === 'Required') {
    
                                errorMsg.html(errorMsg.text() + ' Not a number ');
                            }
                            wasError = true;
                        }
                        else {
                            
                            if(el.hasClass('error')) {
                                el.removeClass('error');
                                errorMsg.html('');
                            }
                        }                    
                    });
                    return !wasError;
             
                });
            }); 
        }
    };  
    
    $(function() {
        
        App.Validate();    
    });    
}) ();