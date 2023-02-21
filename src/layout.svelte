<script>
  export let title;
  const currentYear = new Date().getFullYear();
</script>

<svelte:head>
  <title>Matteo Silvestro{title ? ` | ${title}` : ''}</title>
</svelte:head>

<section><slot /></section>
<footer>
  ©{currentYear} Matteo Silvestro — version <abbr title="iota">&iota;</abbr>
</footer>
