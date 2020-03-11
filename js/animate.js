$( document ).ready(function() {
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
    $('#la-mia-persona .column.right a').each(function() {
        console.log($(this).html())
        if (Object.keys(identities).includes($(this).html())) {
            $(this).hover(
                function() {
                    $('#la-mia-persona img').css('background-color', identities[$(this).html()])
                },
                function() {
                    $('#la-mia-persona img').css('background-color', '')
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
