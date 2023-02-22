<script>
  import CubeNav from '$lib/CubeNav.svelte';
  import { page } from '$app/stores';

  const currentYear = new Date().getFullYear();
</script>

<div class="sidebar">
  <nav>
    <ul>
      <li>
        <a href="/" class:selected={$page.route.id === '/'}>
          <div class="profile-picture">
            <img src="/persona_matt.png" alt="A stylized portrait of me" width="142" height="142" />
          </div>
        </a>
      </li>
      <CubeNav size={80} margin={10} fontSize="1.2em" />
    </ul>
  </nav>
</div>
<div class="content">
  <section><slot /></section>
  <footer>
    ©{currentYear} Matteo Silvestro — version <abbr title="iota">&iota;</abbr>
  </footer>
</div>
