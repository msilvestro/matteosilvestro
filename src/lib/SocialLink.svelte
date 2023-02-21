<script>
  export let name;
  export let color;
  export let href;
</script>

<a style="--color: {color}" {href} on:focus on:mouseover on:mouseleave>
  <span>{name}</span>
</a>

<style>
  a {
    border: none;
  }

  a::before {
    content: '{';
    margin-right: 0.5em;
  }

  a::after {
    content: '}';
    margin-left: 0.5em;
  }

  a:hover {
    background-color: var(--color);
    border-color: var(--color);
    border-bottom: 1px solid var(--color);
  }

  a > span {
    border-bottom: 1px solid black;
  }

  a:hover > span {
    border: none;
  }
</style>
