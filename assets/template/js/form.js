var fadeSpeed = 400;
var animation;
var validateSettings = {
    emtyMessages: {
        email: 'Укажите e-mail',
        phone: 'Укажите телефон',
        contacts: 'Укажите e-mail или телефон',
        name: 'Укажите Ваше имя',
        unknown: 'Это поле обязательно'
    },
    invalidMessages: {
        email: 'Не корректный e-mail',
        phone: 'Не корректный номер',
        contacts: 'Не корректный e-mail или телефон'
    },
    pregs: {
        email: /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/,
        phone: /^[0-9\-\(\)\+\s]{6,30}$/i,
        contacts: /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/
    },
    pregs_contacts: {
        contacts: /^[0-9\-\(\)\+\s]{6,30}$/i
    }    
};

$(function() {
	$('form input[type=text], form textarea').each(function(){
		$(this).attr('title',$(this).attr('placeholder'));
	});
	/*$('form textarea').each(function(){
		$(this).attr('title',$(this).val());
	});*/
	
	$('form input[type=text], form textarea').bind('click keydown',function(){
		$(this).attr('placeholder','');
	});
	$('form input[type=text], form textarea').bind('blur',function(){
		$(this).attr('placeholder',$(this).attr('title'));
	});
	
	// antispam
	$('.sendLead').each(function(idx, form){
        $(form).append('<input type="hidden" name="nobot" value="1" />');
	})

    $('.sendLead').submit(function(e) {
        e.preventDefault();
        var send = true;
        var form = $(this);
        form.find('input.required, textarea.required').each(function(ind, el) {
            if ($(el).val() == '') {
                setError($(el), 'empty');
                send = false;
            }
            else if ($(el).data('type') && $(el).val() == validateSettings.emtyMessages[$(el).data('type')]) {
                setError($(el), 'empty');
                send = false;
            }
            else if (!checkRegexp($(el), $(el).data('type'))) {
                setError($(el), 'invalid');
                send = false;
            }
        });
        if (send) {
            if(form.find('input[type=file]').length > 0 && form.find('input[type=file]').val() != ''){
                $(this).unbind('submit').submit();
                return;
            }
            formSubmit(form);
        }
    });
});

function setError(input, errorType) {
    if (errorType == 'empty') {
        var error = validateSettings.emtyMessages[(input.data('type') != '') ? input.data('type') : 'unknown'];
        input.val(error).addClass('error').on('focus', function() {
            $(this).val('').removeClass('error').off('focus');
        });
        input.text(error);
    }
    else {
        input.val(validateSettings.invalidMessages[input.data('type')]).addClass('error').bind('focus', function() {
            $(this).val('').removeClass('error').off('focus');
        });
    }
}

function checkRegexp(o, type) {
    if (type == undefined) {
        return "Некорректно введены данные!";
    }
    var regexp = validateSettings.pregs[type];

    if (!(regexp.test(o.val()))) {
        if(type=='contacts'){
            var regexp = validateSettings.pregs_contacts[type];
            if(!(regexp.test(o.val()))){
                return false;
            }else{
                return true;
            }
        }
        return false;
    } 
    else{
        return true;
    }
}

function formSubmit(form) {
    var yalabel = form.data('id');
    var action = form.attr('action');
    var sendData = form.serialize();
    //console.log(sendData);
    startLoadingAnimation();
    setTimeout(function() {
        $.post(action, sendData, function(data, textStatus) {
            if (textStatus != 'success') {
                alert(textStatus);
            }
            else {
                // Отправка цели на метрику. 
console.log(yalabel); 
yaCounter32824167.reachGoal(yalabel); 
                form[0].reset();
                stopLoadingAnimation();
                $.fancybox.close();
                //data = $.parseJSON(data);
                //if(!data.success) alert(data.message);
                //else{
                    $.fancybox($('#success'), {
                        scrolling: 'no',
                        openSpeed: fadeSpeed,
                        minHeight: '5',
                        afterLoad: function() {
                            setTimeout(function() {
                                $.fancybox.close();
                            }, 5000);
                        },
                        padding: 3,
                        helpers: {
                            overlay: {
                                locked: false
                            }
                        }
                    });
                //}
                return true;
            }
        });
    }, fadeSpeed * 2);
}


function startLoadingAnimation() {
    $.fancybox.close();
    $.fancybox($('#loading'), {
        scrolling: 'no',
        openSpeed: fadeSpeed,
        minHeight: '5',
        afterLoad: function() {
            $('#loading').find('#load').animate({width: '100%'}, 1000, function() {
                $('#loading').find('#load').animate({width: '0%'}, 1000)
            });
            animation = setInterval(function() {
                $('#loading').find('#load').animate({width: '100%'}, 1000, function() {
                    $('#loading').find('#load').animate({width: '0%'}, 1000)
                });
            }, 2000);
        },
        padding: 0,
        modal: true,
        helpers: {
            overlay: {
                locked: false
            }
        }
    });
}
function stopLoadingAnimation() {
    clearInterval(animation);
} 