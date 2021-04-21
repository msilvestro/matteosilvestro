import homeFile from "./home.md"
import funFile from "./fun.md"
import educationFile from "./education.md"
import workFile from "./work.md"
import notFoundFile from "./404.md"

export type PageName = "home" | "fun" | "education" | "work"

export const getPage = (pageName: string) => {
  switch (pageName) {
    case "home":
      return homeFile
    case "fun":
      return funFile
    case "education":
      return educationFile
    case "work":
      return workFile
    default:
      return notFoundFile
  }
}
