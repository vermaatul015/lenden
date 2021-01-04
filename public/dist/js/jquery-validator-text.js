var mapObj = {
    ":first":"{0}",
    ":second":"{1}"
 };
jQuery.extend(jQuery.validator.messages, {
    required: window.translations.setup.required,
    remote: window.translations.setup.remote,
    email: window.translations.setup.email,
    url: window.translations.setup.url,
    date: window.translations.setup.date,
    dateISO: window.translations.setup.dateISO,
    number: window.translations.setup.number,
    digits: window.translations.setup.digits,
    creditcard: window.translations.setup.creditcard,
    equalTo: window.translations.setup.equalTo,
    accept: window.translations.setup.accept,
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    // minlength: jQuery.validator.format("Please enter at least {0} characters."),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    // range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    maxlength: jQuery.validator.format(window.translations.setup.maxlength.replace(/:first|:second/gi, function(matched){
        return mapObj[matched];
      })),
    minlength: jQuery.validator.format(window.translations.setup.minlength.replace(/:first|:second/gi, function(matched){
        return mapObj[matched];
      })),
    rangelength: jQuery.validator.format(window.translations.setup.rangelength.replace(/:first|:second/gi, function(matched){
        return mapObj[matched];
      })),
    range: jQuery.validator.format(window.translations.setup.range.replace(/:first|:second/gi, function(matched){
        return mapObj[matched];
      })),
    max: jQuery.validator.format(window.translations.setup.max.replace(/:first|:second/gi, function(matched){
        return mapObj[matched];
      })),
    min: jQuery.validator.format(window.translations.setup.min.replace(/:first|:second/gi, function(matched){
        return mapObj[matched];
      }))
});