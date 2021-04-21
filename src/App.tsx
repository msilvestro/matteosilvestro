import React, { useState } from "react"
import { useRoutes, Link, useQueryParams } from "raviger"

import "./App.css"
import persona_matt from "./assets/persona_matt.png"

import CubeNav from "./components/CubeNav"
import MarkdownContent from "./components/MarkdownContent"

import { toggleClass } from "./utils/css"

import { getPage, PageName } from "./pages"

const routes = {
  "/:pageName": ({ pageName }: { [k: string]: PageName }) => (
    <MarkdownContent file={getPage(pageName)} />
  ),
  "/": () => <MarkdownContent file={getPage("index")} />,
}

const App = () => {
  const route = useRoutes(routes)

  const [page, setPage] = useState<PageName>("index")

  return (
    <div className="website">
      <div className="title">
        <header>
          <h1>Matteo Silvestro</h1>
        </header>
      </div>
      <div className="main">
        <div className="sidebar">
          <nav>
            <div
              className={
                "profile-picture" + toggleClass("selected", page === "index")
              }
              onClick={() => setPage("index")}
            >
              <img src={persona_matt} alt="Profile" />
            </div>
            <CubeNav
              size={80}
              fontSize="1.2em"
              faceNames={{
                top: {
                  name: "Fun",
                  onClick: () => setPage("fun"),
                  selected: page === "fun",
                },
                bottomLeft: {
                  name: "Work",
                  onClick: () => setPage("work"),
                  selected: page === "work",
                },
                bottomRight: {
                  name: "Edu",
                  onClick: () => setPage("edu"),
                  selected: page === "edu",
                },
              }}
              margin={10}
            />
            <Link href="/">Home</Link>
            <Link href="/fun">Fun</Link>
            <Link href="/work">Work</Link>
            <Link href="/edu">Education</Link>
          </nav>
        </div>
        <section className="content">{route}</section>
      </div>
    </div>
  )
}

export default App
