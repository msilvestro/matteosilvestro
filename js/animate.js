$(function() {
    $('.header').each(function(index) {
        $(this).click(function() {
            var page = $(this).next()
            if ($(this).hasClass('expanded')) {
                page.css('height', 0)
                $(this).removeClass('expanded')
            } else {
                page.css('height', page.prop('scrollHeight')+1)
                $(this).addClass('expanded')
                // Important, when the transition ends set the height back to
                // change automatically.
                // Otherwise, when resizing a part of the div might be hidden.
                /*page.on('transitionend', function() {
                    $(this).css('height', 'auto')
                })*/
                // but this doesn't work because the CSS can't transition
                // between 0 and auto... gah!
            }
        })

        // Hide every page of a non expanded header.
        var page = $(this).next()
        if ($(this).hasClass('expanded')) {
            page.css('height', page.prop('scrollHeight')+1)
        } else {
            page.css('height', 0)
        }
    })
})
