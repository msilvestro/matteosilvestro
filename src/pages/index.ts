import indexFile from "./index.md"
import funFile from "./fun.md"
import educationFile from "./education.md"
import workFile from "./work.md"

export type PageNames = "index" | "fun" | "education" | "work"

export const getPage = (pageName: PageNames) => {
  switch (pageName) {
    case "index":
      return indexFile
    case "fun":
      return funFile
    case "education":
      return educationFile
    case "work":
      return workFile
  }
}
