;(function($) {
    
    $.fn.editable = function(options) {
        
        var options = $.extend({}, $.fn.editable.defaults, options);
        
        $.editable.options = options;
        
        var input = $('<input></input>', {type:'text', 'class': 'input-editable', size: options.size}),
            select = $('<select></select>', {'class': 'select-editable'}).html(''),
            checkboxes,
            save = $('<a></a>', {href:'javascript:void(0);', 'class': 'save'}).html('Mentés'),
            cancel = $('<a></a>', {href:'javascript:void(0);', 'class': 'cancel'}).html('Mégsem'),
        	img = $('<img></img>', {'class': 'ajax-loader hidden', 'src': 'images/ajax-loader-4.gif', 'alt': '', 'style': 'margin-right:5px;'});
			
        return this.each(function() {
        
            var element = $(this);
            		
            $.editable.hover(element);
            
            element.bind('click', function(e) {
                
                $('.'+$.editable.options.message.cssClass).hide();
                
                var element = $(this),
                    value = jQuery.trim(element.text()),
                    target = $(e.target);
                    
                element.removeClass('edit-icon');
                
				/*
                if (element.hasClass('show-datepicker')) {
                	
	            	input.datepicker({ 
                		changeYear: true, 
                		changeMonth: true, 
                		showMonthAfterYear:true, 
                		yearRange: '1940:+0'
            		});
                }                
                */
                
                if (target.is('.checkboxes-wrapper')) {
                    
                    return false;
                }
                
                if (target.is('.checkbox-editable')) {
                    return true;
                }
                
                if (target.is('.input-editable') || target.is('.select-editable') || target.is('.option-editable')) {

                    return true;
                }
                
                if (target.is('.cancel')) {
                    
                    $.editable.cancel(element);
                    
                    return false;
                }
                
                if (target.is('.save')) {
                	
                	//img.insertAfter(element);
                	
                	element.find('.save').replaceWith(img);
                	
					$('.ajax-loader')
					   .ajaxStart(function() {
							$(this).show();
					   })
					   .ajaxStop(function() {
							$(this).hide();
					});                    
                    
					$.editable.save(element);
                    
                    return false;
                }
                
                element.attr('alt', value);
                
                if (target.is($.editable.options.element)) {
                    
                    var ret = $.editable.reset();
                    
                    if (!ret) {
                        return false;
                    }
                }
                
                if (element.hasClass('text')) {
                    
                	var input = $('<input></input>', {type:'text', 'class': 'input-editable', size: $.editable.options.size});
                	
    	            if (element.hasClass('show-datepicker')) {
	                	input.datepicker({ 
	                		changeYear: true, 
	                		changeMonth: true, 
	                		showMonthAfterYear:true, 
	                		yearRange: '1940:+0'
	            		});
                	}
                    save.html('Mentés');
                    cancel.html('Mégsem');

                    element.html(input.after(save).after(cancel));
                    
                    var inputElement = element.find('.input-editable');
                    
                    inputElement.attr('name', element.attr('column'));
                    
                    inputElement.val(value);

	                inputElement.focus();

                }
                
                if (element.hasClass('select')) {
                    
                    var options = jQuery.parseJSON(element.attr('options'));
                    
                    var length = options.length;
                    
                    if (length) {
                        select.html('');
                        var option, fragment = document.createDocumentFragment();
                        
                        for (var i = 0; i < length; i++) {
                            option = $('<option></option>', {value:options[i].key, 'class': 'option-editable'}).html(options[i].value);
                            
                            if (options[i].value === value) {
                                
                                option.attr('selected', true);
                            }
                            
                            fragment.appendChild(option[0]);
                            //select.append(option);
                        }
                        
                        select.append(fragment);
                        
                        save.html('Mentés');
                        cancel.html('Mégsem');
                        
                        element.html(select);
                        element.append(save).append(cancel);
                        
                        var selectElement = element.find('.select-editable');
                        
                        selectElement.attr('name', element.attr('column'));
                    }
                }
                
                if (element.hasClass('checkboxes')) {
                    
                    element.css('color', '#999999');
                    
                    var values = jQuery.parseJSON(element.attr('values'));
                    
                    var length = values.length;
                    
                    if (length) {
                        element.html('');
                        
                        var name = element.attr('column'),
                            fragment = document.createDocumentFragment();
                        
                        for (var i = 0; i < length; i++) {
                            var wrapper = $('<span></span>').addClass('checkboxes-wrapper').css({'display':'block'});
                            var input = $('<input></input>', {'type':'checkbox', 'value': values[i].key, 'name': name, 'class': 'inputcheckbox checkbox-editable'});
                            var text = $('<span></span>', {"style": "display:inline-block;width:90%;"}).addClass('checkboxes-wrapper').html(values[i].value); //.after($('<br></br>'));
                            
                            //element.append(wrapper.append(input.after(text)));
                            
                            fragment.appendChild(wrapper.append(input.after(text))[0]);
                        }
                        
                        element.append(fragment);
                        
                        save.html('Mentés');
                        cancel.html('Mégsem');
                        
                        element.append($('<br></br>'));
                        element.append(save).append(cancel);
                    }
                }
                
                if (element.hasClass('timepicker')) {
                    
                    var clockSelect = $('<select></select>', {'class': 'select-editable'}),
                        minutesSelect = $('<select></select>', {'class': 'select-editable'}),
                        fragment = document.createDocumentFragment();
                    
                    element.html('');    
                    
                    for (var i = 0; i < 24; i++) {
                        
                        var option = $('<option></option>', {value: i, 'class': 'option-editable'}).html(i);
                        
                        //clockSelect.append(option);
                        fragment.appendChild(option[0]);
                    }
                    clockSelect.append(fragment);
                    
                    fragment = document.createDocumentFragment();
                    for (var i = 0; i < 61; i+=5) {
                        var option = $('<option></option>', {value: i, 'class': 'option-editable'}).html(i);
                        fragment.appendChild(option[0]);
                    }
                    minutesSelect.append(fragment);
                    
                    element.append(clockSelect);
                    
                    element.find('select').after(' óra ');

                    element.append(minutesSelect);
                    
                    element.find('select:nth-child(2)').after(' perc ');
                    
                    save.html('Mentés');
                    cancel.html('Mégsem');
                    
                    //element.append($('<br></br>'));
                    element.append(save).append(cancel);
                    
                    element.addClass('timepicker');              
                }
                
                return false; 
            });
        });
    };
    
    $.editable = {

        options: {},
        
        hover: function(element) {
            
            var message = $('<span></span>', {'class': this.options.message.cssClass});
            
            element.hover(
                function() {
                    
                    //$(this).addClass('editable-hover');
                    
                    $(this).after(message.text($.editable.options.message.text));
                },
                function() {
                    
                    //$(this).removeClass('editable-hover');
                    
                    $('.'+$.editable.options.message.cssClass).remove();
                }
            );
        },
        
        save: function(element) {
            
            var text = '', value = '';
            
            if (element.hasClass('text')) {
                    
                text = element.find('input').val();
                value = element.find('input').val();
            }
            
            if (element.hasClass('timepicker')) {
                
                var clock = element.find('select:first').val();
                var minutes = element.find('select:nth-child(2)').val();
                
                value = clock + ' óra ' + minutes + ' perc';
                text = parseInt(clock, 10) * 60 + parseInt(minutes, 10);
            }
            
            if (element.hasClass('select')) {
                
                value = element.find('select option:selected').text();
                text = element.find('select').val();
            }
            
            
            
            if (element.hasClass('checkboxes')) {
                text = [];
                
                var vals = '';
                var checked = element.find('input:checked');
                var size = checked.length;
                
                checked.each(function(i, val) {
                    
                    //console.log($(this).val());
                    
                    //text += $(this).val() + '|';
                    //text += ''$(this).val() + '|';
                    text.push($(this).val());

                    vals += $(this).next().html();
                    
                    if (i !== size-1) {
                        vals += ', ';
                    }
                });
            }
            
            if (typeof text === 'string') {
                
                text = jQuery.trim(text);
            }
            
            if (text) {
                
                $.ajax({
                    url: $.editable.options.saveTo,
                    type: "POST",
                    dataType: "json",
                    contentType: "application/x-www-form-urlencoded;charset=ISO-8859-2",
                    data: {
                        key: element.attr('column'),
                        value: text,
                        id: element.attr('itemid') || ''
                    },
                    success: function(response) {
                        
                        if (response.response) {
                        	
                        	if (value.length) {
    
                        		element.html(value);
                        	} else {
                        		if (typeof vals !== undefined) {
                        		    text = vals;
                        		}
	                        	element.html(text);
                        	}

                        	element.css('color', 'green');
                        } else {
                        	
                        	element.html(element.attr('alt'));
                        	element.css('color', 'red');
                        }
                        
                        element.addClass('edit-icon');     
                        
                        $.editable.hover(element);                   
                    }
                });
            }                
            
            return false;
        },
        
        cancel: function(element) {
            
            $.editable.hover(element);
            
            element.html(element.attr('alt'));
            element.addClass('edit-icon');
            return false;
        },
        
        reset: function() {
                    
            var input = $(this.options.container).find('input'),
                select = $(this.options.container).find('select');
           
            if (input.length !== 0) {
                
                var value = jQuery.trim(input.val());
                 
                if (value !== '') {
    
                    var element = input.parents(this.options.element);
                    
                    $.editable.hover(element);

                    element.html(element.attr('alt'));
                    element.addClass('edit-icon');
                    return true;
                } else {
                    
                    return false;
                }
            }
            
            if (select.length !== 0) {
                 
                var value = jQuery.trim(select.val());
    
                if (value !== '') {
    
                    var element = select.parents(this.options.element);

                    element.html(element.attr('alt'));
                    element.addClass('edit-icon');
                    return true;
                } else {
                    
                    return false;
                }
            }            
            return true;
        }
    };
    
    $.fn.editable.defaults = {
        container: '.editable-container',
        element: '.editable',
        saveTo: '',
        size: 40,
        message: {
            cssClass: 'info',
            text:'szerkesztés'
        }
    };
    
    
})(jQuery);