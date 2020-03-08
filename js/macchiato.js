$( document ).ready(function() {
    var personae = ['fb', 'li', 'tw', 'ig', 'lf', 'st', 'yt', 'ms', 'gh']
    $('#la-mia-persona a').each(function() {
        if (personae.includes($(this).attr('id'))) {
            $(this).hover(
                function() {
                    $('#la-mia-persona img').css('background-color', $(this).css('color'))
                },
                function() {
                    $('#la-mia-persona img').css('background-color', '')
                })
        }
    })
})

function openVideo(thisdiv, videoId) {
    // window.open('https://www.youtube.com/watch?v='+videoId, '_blank')
    $(thisdiv).removeClass('videothumbnail')
    $(thisdiv).addClass('videowrapper')
    $(thisdiv).html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+videoId+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>')
}
