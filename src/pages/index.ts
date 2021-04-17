import indexFile from "./index.md"
import funFile from "./fun.md"
import eduFile from "./edu.md"
import workFile from "./work.md"

export type PageName = "index" | "fun" | "edu" | "work"

const pages = {
  index: { file: indexFile },
  fun: { file: funFile },
  edu: { file: eduFile },
  work: { file: workFile },
}

export const getPage = (pageName: PageName) => {
  return pages[pageName].file
}
