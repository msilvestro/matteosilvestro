<script>
  import CubeNav from './lib/CubeNav.svelte';
  import { page } from '$app/stores';

  export let title;
  const currentYear = new Date().getFullYear();
</script>

<svelte:head>
  <title>Matteo Silvestro{title ? ` | ${title}` : ''}</title>
</svelte:head>

<div class="sidebar">
  <nav>
    <ul>
      <li>
        <a href="/" class:selected={$page.route.id === '/'}
          ><div class="profile-picture">
            <img src="/persona_matt.png" alt="My avatar" width="142" height="142" />
          </div></a
        >
      </li>
      <CubeNav size="80" fontSize="1.2em" />
    </ul>
  </nav>
</div>
<div class="content">
  <section><slot /></section>
  <footer>
    ©{currentYear} Matteo Silvestro — version <abbr title="iota">&iota;</abbr>
  </footer>
</div>
