import re
from textwrap import indent

import markdown
from slugify import slugify

CARD_TITLE = 'title'
CARD_TEXT = 'text'
CARD_MEDIA = 'media'

md = markdown.Markdown(extensions=['attr_list'])

def render_media_column(media_md):
    media_html = md.convert(media_md)
    media_html = re.sub(r'<!-- video=(.*) -->', r'''
<div class="videothumbnail" onclick="openVideo(this, '\1')">
    <img src="https://img.youtube.com/vi/\1/hqdefault.jpg">
    <div>⯈</div>
</div>''', media_html)
    return indent(media_html, ' '*8)

menu = [
    "Introduzione",
    "Musica"
]

menu_html = f'''
<div id="menu">
    <h2 class="hidden">Menu</h2>
    <ul>
''' + \
    '\n'.join([f'        <li><a href="#{slugify(page)}">{page}</a></li>' for page in menu]) + \
'''
    </ul>
</div>
'''

pages_html = ''

for page in menu:
    page_title = None
    cards = []
    card_part = None
    with open(f'pages/{slugify(page)}.md', 'r', encoding='utf8') as f:
        for line in f:
            if line.startswith('## '):
                page_title = line[3:].strip()
            elif line.startswith('### '):
                card_part = CARD_TEXT
                cards.append({
                    CARD_TITLE: line[4:].strip(),
                    CARD_TEXT: line,
                    CARD_MEDIA: ''
                })
            elif cards:
                if card_part == CARD_TEXT and line.startswith('---'):
                    card_part = CARD_MEDIA
                else:
                    cards[-1][card_part] += line

    pages_html += f'''
<div class="header" id="{slugify(page)}">
    <h2>{page_title}</h2>
</div>

<div class="page">
'''

    for card in cards:
        pages_html += f'''<div class="card" id="{slugify(card[CARD_TITLE])}">

    <div class="column">

{indent(md.convert(card[CARD_TEXT]), ' '*8)}

    </div>

    <div class="column">

{render_media_column(card[CARD_MEDIA])}

    </div>

</div>

<hr />
'''

with open('tindex.html', 'r', encoding='utf8') as f:
    template_html = f.read()

with open('index.html', 'w', encoding='utf8') as f:
    f.write(
        template_html.replace(
            '<!-- menu here -->', indent(menu_html, ' '*4*3)
        ).replace(
            '<!-- pages here -->', indent(pages_html, ' '*4*3)
        )
    )
