import React, { FC, useState, useEffect } from "react"

import ReactMarkdown from "react-markdown"

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

  return <ReactMarkdown>{content}</ReactMarkdown>
}

export default MarkdownContent
