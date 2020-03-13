$( document ).ready(function() {
    if ($('#la-mia-identita').length) {
        var myPersona = '#la-mia-identita' // Italian introduction page
    } else if ($('#my-persona').length) {
        var myPersona = '#my-persona' // English introduction page
    } else {
        return // other pages, skip it all
    }

    var identities = {
        'Facebook': '#3b5998',
        'LinkedIn': '#0077b5',
        'Twitter': '#00acee',
        'Instagram': '#d01e86',
        'Last.fm': '#d51007',
        'Steam': '#808080',
        'YouTube': '#af100a',
        'MuseScore': '#1f74bd',
        'GitHub': '#24292e'
    }
    $(myPersona+' .column.right a').each(function() {
        if (Object.keys(identities).includes($(this).html())) {
            $(this).hover(
                function() {
                    $(myPersona+' img').css('background-color', identities[$(this).html()])
                },
                function() {
                    $(myPersona+' img').css('background-color', '')
                })
        }
    })
})


function openVideo(thisdiv, videoId) {
    // window.open('https://www.youtube.com/watch?v='+videoId, '_blank')
    $(thisdiv).removeClass('video-thumbnail')
    $(thisdiv).addClass('video-wrapper')
    $(thisdiv).html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+videoId+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>')
}
