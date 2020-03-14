# Matteo Silvestro's webpage

I'm Matteo Silvestro, a scatterbrained wanderer always looking for new routes. This is the code my personal page.


## Components of the engine

The engine that powers the whole website is **Pagemaker** and is a PHP library written by myself that takes as input a customized Markdown page, extract its parts and converts them to plain HTML.

All pages are valid Markdown files, but have special delimiters that identify its diffent parts.

Each page has a title and a description, then it is divided into different cards. Each card has its own title, optional subtitle, right column and left column.

The anatomy of a page is the following:

```markdown
## Page title

Optional description

### Title of first card

@ Optional subtitle (the @ character at the beginning is mandatory)

Here is usual **Markdown** text, following *John Gruber* guidelines at https://daringfireball.net/projects/markdown/syntax.

This part between the title and the delimiter `---` below will be interpreted as part of the right column.

---

This part between the delimiter `---` and the next card's title below will be interpreted as part of the left column.

Furthermore, if you write `<!-- video=youtube_url -->` (e.g. `<!-- video=vd6Nx3trzUs -->`) this tag will be replaced by a thumbnail of the corresponding YouTube video. If you then click on it, it will show the embedded video.


### Title of the second card

@ Optional subtitle

Right column text.

---

Left column text.
```
