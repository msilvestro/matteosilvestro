import React from "react"
import "./App.css"

import indexPage from "./pages/index.md"
import persona_matt from "./assets/persona_matt.png"

import CubeNav from "./components/CubeNav"
import MarkdownContent from "./components/MarkdownContent"

const App = () => {
  return (
    <div className="website">
      <div className="title">
        <header>
          <h1>Matteo Silvestro</h1>
        </header>
      </div>
      <div className="main">
        <div className="sidebar">
          <div className="profile-picture selected">
            <img src={persona_matt} alt="Profile" />
          </div>
          <nav>
            <CubeNav
              size={80}
              fontSize="1.2em"
              faceNames={{
                top: "Fun",
                bottomLeft: "Work",
                bottomRight: "Edu",
              }}
              margin={10}
            />
          </nav>
        </div>
        <section className="content">
          <MarkdownContent file={indexPage} />
        </section>
      </div>
    </div>
  )
}

export default App
