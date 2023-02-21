<script>
  import SocialLinksList from '$lib/SocialLinksList.svelte';
</script>

<p>
  <SocialLinksList
    socialLinks={[
      {
        name: 'LinkedIn',
        href: 'https://www.linkedin.com/in/matteosilvestro/',
        color: '#0077b5',
        description: 'My professional side.'
      },
      {
        name: 'Twitter',
        href: 'https://twitter.com/msilvestro',
        color: '#00acee',
        description: 'Short telegrams and quotes.'
      },
      {
        name: 'Instagram',
        href: 'https://www.instagram.com/msilvestro93',
        color: '#d01e86',
        description: 'Moments that caught my attention.'
      },
      {
        name: 'Last.fm',
        href: 'http://www.lastfm.it/user/msilvestro',
        color: '#d51007',
        description: 'My volatile musical obsessions.'
      },
      {
        name: 'Steam',
        href: 'http://steamcommunity.com/id/msilvestro/',
        color: '#808080',
        description: 'Most of my gaming experiences.'
      },
      {
        name: 'YouTube',
        href: 'https://www.youtube.com/c/MatteoSilvestro',
        color: '#af100a',
        description: 'My musical covers.'
      },
      {
        name: 'MuseScore',
        href: 'https://musescore.com/matteosilvestro',
        color: '#1f74bd',
        description: 'My piano arrangements.'
      },
      {
        name: 'GitHub',
        href: 'https://github.com/msilvestro',
        color: '#24292e',
        description: 'Code projects I made.'
      },
      {
        name: 'itch.io',
        href: 'https://msilvestro.itch.io',
        color: '#dd4a4a',
        description: 'My videogames.'
      }
    ]}
  />
</p>
