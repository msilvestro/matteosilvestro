import homeFile from "./home.md"
import funFile from "./fun.md"
import educationFile from "./education.md"
import workFile from "./work.md"

export type PageName = "home" | "fun" | "education" | "work"

const pages = {
  home: { file: homeFile },
  fun: { file: funFile },
  education: { file: educationFile },
  work: { file: workFile },
}

export const getPage = (pageName: PageName) => {
  return pages[pageName].file
}
