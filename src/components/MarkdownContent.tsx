import React, { FC, useState, useEffect } from "react"

import ReactMarkdown from "react-markdown"
import { Link } from "raviger"

const components = {
  // @ts-ignore
  a: ({ node, href, children, ...props }) =>
    href[0] === "/" ? (
      <Link href={href}>{children}</Link>
    ) : (
      <a href={href} {...props}>
        {children}
      </a>
    ),
}

type Props = {
  file: string
}

const MarkdownContent: FC<Props> = ({ file }: Props) => {
  const [content, setContent] = useState<string | undefined>(undefined)

  useEffect(() => {
    fetch(file)
      .then((response) => response.text())
      .then((text) => setContent(text))
  }, [file])

  if (!content) {
    return null
  }

  // @ts-ignore
  return <ReactMarkdown components={components}>{content}</ReactMarkdown>
}

export default MarkdownContent
