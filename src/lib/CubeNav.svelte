<script>
  import { page } from '$app/stores';

  export let size;
  export let margin = 10;
  export let fontSize = '1em';

  const cos30 = Math.cos(Math.PI / 6);
  const sin30 = Math.sin(Math.PI / 6);
</script>

<div
  class="cube"
  style:font-size={fontSize}
  style:width="{size * cos30 * 2 + margin}px"
  style:height="{size * (sin30 * 2 + 1) + margin}px"
>
  <li style:left="{size * (cos30 - 0.5) + margin * 0.5}px">
    <a href="/fun" class:selected={$page.route.id === '/fun'}
      ><div
        class="face"
        style:height="{size}px"
        style:width="{size}px"
        style:transform="rotate(-30deg) skewX(30deg) scaleY({cos30})"
      >
        Fun
      </div></a
    >
  </li>
  <li style:top="{size * sin30 * 1.5 + margin}px" style:left="{-size * (1 - cos30) * 0.5}px">
    <a href="/work" class:selected={$page.route.id === '/work'}
      ><div
        class="face"
        style:height="{size}px"
        style:width="{size}px"
        style:transform="skewY(30deg) scaleX({cos30})"
      >
        Work
      </div></a
    >
  </li>
  <li
    style:top="{size * sin30 * 1.5 + margin}px"
    style:left="{size * (cos30 * 1.5 - 0.5) + margin}px"
  >
    <a href="/education" class:selected={$page.route.id === '/education'}
      ><div
        class="face"
        style:height="{size}px"
        style:width="{size}px"
        style:transform="skewY(-30deg) scaleX({cos30})"
      >
        Edu
      </div></a
    >
  </li>
</div>

<style>
  .cube {
    position: relative;
  }

  li {
    position: absolute;
  }

  .face {
    border: 5px solid white;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: uppercase;
    font-weight: bold;
    cursor: pointer;
  }

  .face:hover,
  .selected > div {
    background-color: white;
    color: #262626;
  }

  .selected > .face {
    cursor: default;
  }
</style>
