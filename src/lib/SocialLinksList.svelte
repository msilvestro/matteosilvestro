<script>
  import SocialLink from '$lib/SocialLink.svelte';

  /**
   * @typedef SocialLink
   * @type {object}
   * @property {string} name - the display name.
   * @property {string} color - the color to show on hover.
   * @property {string} href - the link to the relevant page.
   * @property {string} description - a short description.
   */

  /** @type SocialLink[] */
  export let socialLinks;

  const defaultDescription = 'Hover on the links above to know more.';
  let description = defaultDescription;

  function setDescription(newDescription) {
    description = newDescription || defaultDescription;
  }

  function resetDescription() {
    description = defaultDescription;
  }
</script>

<div>
  <ul>
    {#each socialLinks as socialLink (socialLink.name)}
      <li>
        <SocialLink
          name={socialLink.name}
          color={socialLink.color}
          href={socialLink.href}
          on:focus={() => setDescription(socialLink.description)}
          on:mouseover={() => setDescription(socialLink.description)}
          on:mouseleave={resetDescription}
        />
      </li>
    {/each}
  </ul>
  <span>{description}</span>
</div>

<style>
  ul {
    margin: 0;
    margin-top: 0.5em;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    margin: 0 -0.5em;
  }

  ul > li {
    margin: 0 0.5em;
    margin-bottom: 0.5em;
  }
</style>
