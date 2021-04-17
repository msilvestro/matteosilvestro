import indexFile from "./index.md"
import funFile from "./fun.md"
import educationFile from "./education.md"
import workFile from "./work.md"

export const getPage = (pageName: "index" | "fun" | "education" | "work") => {
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
