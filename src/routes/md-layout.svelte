<script>
  export let title;
</script>

<svelte:head>
  <title>Matteo Silvestro{title ? ` | ${title}` : ''}</title>
</svelte:head>

<slot />
