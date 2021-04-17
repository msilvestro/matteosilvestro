import React, { useState } from "react"
import "./App.css"
import persona_matt from "./assets/persona_matt.png"

import CubeNav from "./components/CubeNav"
import MarkdownContent from "./components/MarkdownContent"

import { getPage, PageNames } from "./pages"

const App = () => {
  const [page, setPage] = useState<PageNames>("index")

  return (
    <div className="website">
      <div className="title">
        <header>
          <h1>Matteo Silvestro</h1>
        </header>
      </div>
      <div className="main">
        <div className="sidebar">
          <div
            className="profile-picture selected"
            onClick={() => setPage("index")}
          >
            <img src={persona_matt} alt="Profile" />
          </div>
          <nav>
            <CubeNav
              size={80}
              fontSize="1.2em"
              faceNames={{
                top: {
                  name: "Fun",
                  onClick: () => setPage("fun"),
                  selected: true,
                },
                bottomLeft: { name: "Work", onClick: () => setPage("work") },
                bottomRight: {
                  name: "Edu",
                  onClick: () => setPage("education"),
                },
              }}
              margin={10}
            />
          </nav>
        </div>
        <section className="content">
          <MarkdownContent file={getPage(page)} />
        </section>
      </div>
    </div>
  )
}

export default App
