(function() {
    
    App = {
        URL: '',
                
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
				        uploaded = $(element).parents("p:first").nextAll('.uploaded-files:first');
				    $(element).parents('p:first').find('.file-upload').hide();
				        
				    form.append(input);
				    
				    uploaded.append($('<img></img>', {'src':'http://localhost'+params.folder + 'thumbs/' + jQuery.trim(response)}));
				    
				    
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
                        
                        if(!/^\d*(\.|,){0,1}\d+$/.test(jQuery.trim(el.val()))) {
                            
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